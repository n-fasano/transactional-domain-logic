<?php

namespace App\Domain\Rule;

use App\Domain\Model\Model;

interface MutationRule
{
    public function getObject(): Model;
}