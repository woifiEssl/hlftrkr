<?php

namespace App\Http\Controllers;

use App\Exceptions\Auth\LoginException;
use App\Http\Requests\LoginRequest;
use App\Http\Response\ApiResponseBuilder;
use App\Services\CustomerService;
use App\Services\UserService;

/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    /**
     * @var CustomerService
     */
    private $customerService;

    /**
     * CustomerController constructor.
     * @param CustomerService $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws LoginException
     */
    public function login(LoginRequest $request)
    {
        $request = $request->validated();
        $loginResponse = $this->customerService->login(
            $request['email'],
            $request['password'],
            $request['stay_logged_in'] ?? false
        );

        return ApiResponseBuilder::successWithData($loginResponse);
    }

}
