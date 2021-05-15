<?php

namespace App\Domain\User;

use App\Domain\User\Filters\UserFilters;
use App\Domain\User\Repository\UserRepositoryInterface;

class UserLibrary
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getUsers(UserFilters $filters)
    {
        return $this->userRepo->getUsers($filters);
    }
}
