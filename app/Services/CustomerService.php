<?php

namespace App\Services;

use App\Exceptions\Auth\LoginException;
use App\Models\Customer as CustomerModel;
use Illuminate\Support\Facades\Hash;

/**
 * Class CustomerService
 */
class CustomerService
{
    /**
     * @var CustomerModel
     */
    private $customerModel;

    /**
     * UserService constructor.
     * @param CustomerModel $customerModel
     */
    public function __construct(CustomerModel $customerModel)
    {
        $this->customerModel = $customerModel;
    }

    /**
     * @param string $email
     * @param string $password
     * @param bool $stayLoggedIn
     * @return array|\Illuminate\Database\Eloquent\Model
     * @throws LoginException
     */
    public function login(string $email, string $password, bool $stayLoggedIn)
    {
        $user = $this->customerModel->getByEmail($email);
        if (!Hash::check($password, $user->password)) {
            throw new LoginException(__('exceptions.login_not_valid'));
        }

        $token = auth()->setTTL(7200)->attempt(['email' => $email, 'password' => $password]);
        $user = [
            'token' => $token,
        ];

        return $user;
    }
}
