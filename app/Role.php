<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends EntrustRole
{
    use SoftDeletes;


    // declaring fillable fields for roles table

    protected $fillable = [ 'name', 'display_name', 'description' ];
    protected $dates = ['deleted_at'];

    /**
     * Role edit path return for testing
     */
    public function updatePath()
    {
        return "roles/update/{$this->id}";
    }
}
