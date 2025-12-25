<?php

namespace App\Repositories;

use App\Models\Property;
use App\Repositories\Contracts\PropertyRepositoryInterface;
use Illuminate\Support\Collection;

class PropertyRepository implements PropertyRepositoryInterface
{
    public function search(array $filters): Collection
    {
        $query = Property::query();

        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        foreach (['bedrooms', 'bathrooms', 'storeys', 'garages'] as $field) {
            if (isset($filters[$field])) {
                $query->where($field, $filters[$field]);
            }
        }

        if (isset($filters['price_min'], $filters['price_max'])) {
            $query->whereBetween('price', [
                $filters['price_min'],
                $filters['price_max'],
            ]);
        }

        return $query->get();
    }
}
