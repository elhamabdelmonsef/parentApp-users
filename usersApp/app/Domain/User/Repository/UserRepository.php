<?php

namespace App\Domain\User\Repository;

use App\Domain\User\Filters\UserFilters;

class UserRepository implements UserRepositoryInterface
{

    public $providers;

    public function __construct()
    {
        $this->providers = ['DataProviderX', 'DataProviderY'];
    }

    public function getUsers(?UserFilters $filters = null): array
    {
        return $this->getFilteredUsers($filters);
    }

    private function getFilteredUsers(?UserFilters $filters)
    {
        $users = [];

        $providerFilterExist = $filters->checkFilterExists('provider');

        if ($providerFilterExist) {
            $fileName = $filters->get('provider');

            $path = storage_path() . "/app/public/users/$fileName.json";

            $users = json_decode(file_get_contents($path), true);
        } else {
            foreach ($this->providers as $provider) {
                $path = storage_path() . "/app/public/users/$provider.json";

                $data = json_decode(file_get_contents($path), true);

                $users = array_merge($users, $data);
            }
        }

        if ($filters) $users = $filters->apply($users);

        return $users;
    }
}

