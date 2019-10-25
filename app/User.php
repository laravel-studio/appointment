<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject


{
    use SoftDeletes;
    use Notifiable;
    // use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type', 'status', 'profileimage'];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function getUserDetails($id)
    {
        $users=DB::table('users')
        ->select('users.id','users.name', 'users.profileimage','employeeservices.id as service_id', 'employeeservices.price')
        ->join('employeeservices','users.id','=', 'employeeservices.employee_id')
        ->where('employeeservices.service_id','=',$id)
        ->whereNull('employeeservices.deleted_at')
        ->get();
        return $users;
    } //end of funciton
    public static function getUserSlotDetails($id)
    {
        $users = DB::table('users')
            ->select('users.id', 'users.name', 'users.profileimage', 'employeeservices.id as service_id', 'employeeservices.price', 'slots.days as slot_day', 'slots.start_time as slot_start_time', 'slots.id as slot_id', 'services.duration', 'slots.end_time as slots_end_time')
            ->join('employeeservices', 'users.id', '=', 'employeeservices.employee_id')
            ->join('slots', 'slots.employee_service_id', '=', 'employeeservices.id')
            ->join('services', 'services.id', '=', 'employeeservices.service_id')
            ->where('employeeservices.service_id', '=', $id)
            ->whereNull('employeeservices.deleted_at')
            ->get();
        return $users;
    }//end of funciton

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Path function for testing edit functionality
     */
    public function editPath()
    {
        return "/employees/edit/{$this->id}";
    }

    /**
     * Path for testing update functionality
     */
    public function updatePath()
    {
        return "employees/update/{$this->id}";
    }

    /**
     * Path for delete employees functionality
     */
    public function deleteEmployees()
    {
        return "employees/delete/{$this->id}";
    }
}
