<?php

namespace App\Http\Controllers;

use App\Exceptions\Auth\LoginException;
use App\Http\Requests\LoginRequest;
use App\Http\Response\ApiResponseBuilder;
use App\Services\UserService;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws LoginException
     */
    public function login(LoginRequest $request)
    {
        $request = $request->validated();
        $loginResponse = $this->userService->login(
            $request['email'],
            $request['password'],
            $request['stay_logged_in'] ?? false
        );

        return ApiResponseBuilder::successWithData($loginResponse);
    }

}
