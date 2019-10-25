<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    // Declaring fillable property for permissions table
    protected $fillable = [ 'name', 'display_name', 'description' ];
}
