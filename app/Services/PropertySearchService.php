<?php

namespace App\Services;

use App\Repositories\Contracts\PropertyRepositoryInterface;

class PropertySearchService
{
    public function __construct(
        private readonly PropertyRepositoryInterface $repository
    ) {}

    public function search(array $filters)
    {
        return $this->repository->search($filters);
    }
}
