<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Filters\UserFilters;

interface UserRepositoryInterface
{
    const STATUS_CODE = ['authorised' => [1, 100], 'decline' => [2, 200], 'refunded' => [3, 300]];

    public function getUsers(?UserFilters $filters = null): array;
}
