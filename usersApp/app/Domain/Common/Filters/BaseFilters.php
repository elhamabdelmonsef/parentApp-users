<?php

namespace App\Domain\Common\Filters;

use Illuminate\Support\Str;

abstract class BaseFilters implements FiltersInterface
{
    protected $filters = [];

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function get($name)
    {
        return $this->filters[$name] ?? null;
    }

    public function apply(array $builder): array
    {

        foreach ($this->filters as $filterName => $filterValue) {
            $newArray = $builder;
            if ($methodName = $this->getFilterMethod($filterName)) {
                $builder = $this->{$methodName}($newArray, $filterValue);
            }
        }

        return $builder;
    }

    public function checkFilterExists($key): bool
    {
        return array_key_exists($key, $this->filters);
    }

    protected function getFilterMethod($filterName)
    {
        $methodName = Str::studly($filterName);

        return method_exists($this, $methodName) ? $methodName : null;
    }
}
