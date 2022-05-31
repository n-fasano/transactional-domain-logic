<?php

namespace App\Domain;

interface UserRepository
{
    /**
     * @return User[]
     */
    public function findOneBy(array $criterias): array;
}