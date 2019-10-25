<?php

namespace App;

use App\Employeeservice;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slot extends Model
{
    use SoftDeletes;

    protected $fillable = ['employee_service_id', 'days', 'start_time', 'end_time', ];
    protected $dates = ['deleted_at'];

    public function employeeservices()
    {
        return $this->belongsTo(Employeeservice::class, 'employee_service_id');
    }

    public static function getSlotDetails($id)
    {
        $slots = DB::table('slots')
            ->select('slots.*')
            ->join('employeeservices', 'employeeservices.id','slots.employee_service_id')
            ->join('appointments', 'appointments.slot_id', 'slots.id')
            ->where('slots.id', '=', $id)
            ->get();


        return $slots;
    }

    /**
     * Slots edit path for testing
     */
    public function editPath()
    {
        return "slots/emplist/{$this->id}";
    }

    /**
     * Slots update path for testing
     */
    public function updatePath()
    {
        return "slots/{$this->id}";
    }
}
