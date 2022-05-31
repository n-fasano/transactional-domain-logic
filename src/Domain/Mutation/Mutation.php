<?php

namespace App\Domain\Mutation;

use App\Domain\Model\Model;
use App\Domain\Rule\MutationRule;

abstract class Mutation
{
    public function __construct(
        protected MutationRule $rule,
        private bool $allowed,
        private string $reason = '',
    ) {}

    public function isFor(Model $object): bool
    {
        return $this->rule->getObject() === $object;
    }

    public function isAllowed(): bool
    {
        return $this->allowed;
    }

    public function getReason(): string
    {
        return $this->reason;
    }
    
    abstract public function mutate(): void;
}