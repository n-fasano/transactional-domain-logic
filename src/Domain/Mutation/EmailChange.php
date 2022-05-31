<?php

namespace App\Domain\Mutation;

use App\Domain\Rule\EmailChangeRule;

final class EmailChange extends Mutation
{
    protected EmailChangeRule $rule;

    public function mutate(): void
    {
        $this->rule->getObject()->changeEmail($this);
    }

    public function getEmail(): string
    {
        return $this->rule->getEmail();
    }
}