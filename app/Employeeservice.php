<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Service;
use App\User;
class Employeeservice extends Model
{
    use softDeletes;

    protected $fillable = ['service_id','employee_id','price'];
    protected $dates = ['deleted_at'];

    public function services()
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'employee_id');
    }
}
