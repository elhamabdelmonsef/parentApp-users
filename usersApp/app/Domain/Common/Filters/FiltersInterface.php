<?php

namespace App\Domain\Common\Filters;

interface FiltersInterface
{
    public function apply(array $builder): array;

    public function checkFilterExists($key): bool;
}
