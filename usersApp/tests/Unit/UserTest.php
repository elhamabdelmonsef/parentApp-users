<?php

namespace Tests\Unit;

use App\Domain\User\Filters\UserFilters;
use App\Domain\User\Repository\UserRepository;
use Tests\TestCase;

class UserTest extends TestCase
{
    protected $userRepo;

    public function setUp(): void
    {
        parent::setUp();

        $this->userRepo = new UserRepository();

        $this->userRepo->providers = ['DataProviderXTest', 'DataProviderYTest'];

    }

    public function testGetUsersFromAllProviders()
    {
        $response = $this->userRepo->getUsers(new UserFilters());

        $this->assertCount(6, $response);
    }

    public function testGetUsersFromProviderX()
    {
        $response = $this->userRepo->getUsers(new UserFilters(['provider' => 'DataProviderXTest']));

        $this->assertCount(3, $response);
    }

    public function testGetUsersFromProviderY()
    {
        $response = $this->userRepo->getUsers(new UserFilters(['provider' => 'DataProviderYTest']));

        $this->assertCount(3, $response);
    }

    public function testGetUsersFilterByAuthorizedStatusCode()
    {
        $response = $this->userRepo->getUsers(new UserFilters(['statusCode' => 'authorised']));

        $this->assertCount(2, $response);
    }

    public function testGetUsersFilterByDeclineStatusCode()
    {
        $response = $this->userRepo->getUsers(new UserFilters(['statusCode' => 'decline']));

        $this->assertCount(2, $response);
    }

    public function testGetUsersFilterByRefundedStatusCode()
    {
        $response = $this->userRepo->getUsers(new UserFilters(['statusCode' => 'refunded']));

        $this->assertCount(1, $response);
    }


    public function testGetUsersFilteredByBalanceRange()
    {
        $response = $this->userRepo->getUsers(new UserFilters(['balanceMin' => 250, 'balanceMax' => 300]));

        $this->assertCount(1, $response);
    }

    public function testGetUsersFilterByCurrency()
    {
        $response = $this->userRepo->getUsers(new UserFilters(['currency' => 'USD']));

        $this->assertCount(2, $response);
    }

//
    public function testGetUsersByFilterByMultiFilters()
    {
        $filters = new UserFilters([
            'currency' => 'AED',
            'statusCode' => 'authorised',
            'balanceMin' => 200,
            'balanceMax' => 250
        ]);

        $response = $this->userRepo->getUsers($filters);

        $this->assertCount(1, $response);
    }
}
