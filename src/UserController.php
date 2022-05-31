<?php

namespace App;

use App\Domain\Model\User;
use App\Domain\UserRepository;

class UserController
{
    public function changeEmail(
        User $user, 
        string $email, 
        UserRepository $userRepository
    ) {
        $user
            ->requestEmailChange($email)
            ->validate($userRepository)
            ->mutate();

        // etc.
    }
}
