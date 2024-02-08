<?php

namespace App\Repositories;

use App\Models\Organization;
use App\Interfaces\OrganizationRepositoryInterface;

class OrganizationRepository implements OrganizationRepositoryInterface
{

    /**
     * @var organization
     */

     protected $model;

     public function __construct(Organization $organization)
     {
         $this->model = $organization;
     }

    /**
      * Get Organization
      *
      * @return Object Organization
      */
    public function all()
    {
        return $this->model::all();
    }

    public function create($request)
    {
        return $this->model::create($request);
    }

}
