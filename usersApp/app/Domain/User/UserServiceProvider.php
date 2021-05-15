<?php

namespace App\Domain\User;

use App\Domain\User\Repository\UserRepository;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Domain\User\Repository\PermissionRepository;
use App\Domain\User\Repository\PermissionRepositoryInterface;
use App\Domain\User\Repository\RoleRepository;
use App\Domain\User\Repository\RoleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
