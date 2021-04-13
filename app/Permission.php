<?php

namespace App;

use Laratrust\Models\LaratrustPermission;
use Symfony\Component\HttpFoundation\Request;

class Permission extends LaratrustPermission
{
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }
}
