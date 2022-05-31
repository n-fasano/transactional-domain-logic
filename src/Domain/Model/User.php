<?php

namespace App\Domain\Model;

use App\Domain\Mutation\EmailChange;
use App\Domain\Rule\EmailChangeRule;
use DomainException;
use LogicException;

class User implements Model
{
    public function __construct(private string $email)
    {}

    public function requestEmailChange(string $email): EmailChangeRule
    {
        return new EmailChangeRule($this, $email);
    }

    public function changeEmail(EmailChange $mutation): void
    {
        if (!$mutation->isFor($this)) {
            throw new LogicException('Given email change request is not for this user!');
        }

        if (!$mutation->isAllowed()) {
            throw new DomainException("Email change request has not been allowed: {$mutation->getReason()}.");
        }

        $this->email = $mutation->getEmail();
    }
}