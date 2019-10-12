<?php

namespace App\Services;

use App\Exceptions\Auth\LoginException;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 */
class UserService
{
    /**
     * @var UserModel
     */
    private $userModel;

    /**
     * UserService constructor.
     * @param UserModel $userModel
     */
    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
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

        $user = $this->userModel->getByEmail($email);
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
