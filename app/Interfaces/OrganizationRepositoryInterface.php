<?php

namespace App\Interfaces;

/**
 * Interface OrganizationRepositoryInterface
 *
 * @package App\Interfaces
 */

interface OrganizationRepositoryInterface
{
    public function all();
    public function create($request);
}

