<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $properties = [
            [
                'name' => 'The Victoria',
                'bedrooms' => 4,
                'bathrooms' => 2,
                'storeys' => 2,
                'garages' => 2,
                'price' => 374662,
            ],
            [
                'name' => 'The Xavier',
                'bedrooms' => 4,
                'bathrooms' => 2,
                'storeys' => 1,
                'garages' => 2,
                'price' => 513268,
            ],
            [
                'name' => 'The Como',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'storeys' => 2,
                'garages' => 1,
                'price' => 454990,
            ],
            [
                'name' => 'The Aspen',
                'bedrooms' => 4,
                'bathrooms' => 2,
                'storeys' => 2,
                'garages' => 2,
                'price' => 384356,
            ],
            [
                'name' => 'The Lucretia',
                'bedrooms' => 4,
                'bathrooms' => 2,
                'storeys' => 2,
                'garages' => 2,
                'price' => 572002,
            ],
            [
                'name' => 'The Toorak',
                'bedrooms' => 5,
                'bathrooms' => 2,
                'storeys' => 1,
                'garages' => 2,
                'price' => 521951,
            ],
            [
                'name' => 'The Skyscape',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'storeys' => 2,
                'garages' => 2,
                'price' => 263604,
            ],
            [
                'name' => 'The Clifton',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'storeys' => 1,
                'garages' => 1,
                'price' => 386103,
            ],
            [
                'name' => 'The Geneva',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'storeys' => 2,
                'garages' => 2,
                'price' => 390600,
            ],
        ];

        Property::insert($properties);
    }
}
