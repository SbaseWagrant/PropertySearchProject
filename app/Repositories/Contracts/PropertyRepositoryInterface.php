<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface PropertyRepositoryInterface
{
    public function search(array $filters): Collection;
}
