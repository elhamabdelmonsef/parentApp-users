<?php

namespace App\Domain\User\Filters;

use App\Domain\Common\Filters\BaseFilters;
use App\Domain\User\Repository\UserRepositoryInterface;
use Illuminate\Support\Arr;

class UserFilters extends BaseFilters
{

    public function balanceMin(array $users, $balance)
    {
        return array_filter($users, function ($value) use ($balance) {
            if (Arr::has($value, 'balance')) {
                return ($value['balance'] >= $balance);
            }
        });

    }

    public function balanceMax(array $users, $balance)
    {
        return array_filter($users, function ($value) use ($balance) {
            if (Arr::has($value, 'balance')) {
                return ($value['balance'] <= $balance);
            }
        });

    }

    public function statusCode(array $users, $code)
    {
        return array_filter($users, function ($value) use ($code) {
            if (Arr::has($value, 'statusCode') || Arr::has($value, 'status')) {
                $status = UserRepositoryInterface::STATUS_CODE[$code];
                return (((Arr::has($value, 'statusCode') && in_array($value['statusCode'], $status))) || (Arr::has($value, 'status') && in_array($value['status'], $status)));
            }
        });
    }

    public function currency(array $users, $currency)
    {
        return array_filter($users, function ($value) use ($currency) {
            if (Arr::has($value, 'currency')) {
                return ($value['currency'] == $currency);
            }
        });
    }
}
