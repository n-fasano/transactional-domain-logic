<?php

namespace App\Domain\Rule;

use App\Domain\Model\User;
use App\Domain\Mutation\EmailChange;
use App\Domain\UserRepository;

final class EmailChangeRule implements MutationRule
{
    public function __construct(
        private User $user,
        private string $email
    ) {}

    public function validate(UserRepository $userRepository): EmailChange
    {
        $foundUser = $userRepository->findOneBy(['email' => $this->email]);

        if ($foundUser !== null) {
            return new EmailChange(
                $this,
                false,
                'A user already has this email',
            );
        }

        return new EmailChange($this, true);
    }

    public function getObject(): User
    {
        return $this->user;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}