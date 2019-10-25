<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Slot;
use App\User;

class Appointment extends Model
{
    use softDeletes;

    protected $fillable = ['customer_id','slot_id','start_time','end_time','status','booking_date','booked_by'];

    public function slots()
    {
        return $this->belongsTo(Slot::class,'slot_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function booker()
    {
        return $this->belongsTo(User::class, 'booked_by');
    }
}
