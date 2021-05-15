<?php

namespace App\Http\Controllers;

use App\Domain\User\Filters\UserFilters;
use App\Domain\User\UserLibrary;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userLibrary;

    public function __construct(UserLibrary $userLibrary)
    {
        return $this->userLibrary = $userLibrary;
    }

    public function index(Request $request)
    {
        return $this->userLibrary->getUsers(new UserFilters($request->all()));
    }
}
