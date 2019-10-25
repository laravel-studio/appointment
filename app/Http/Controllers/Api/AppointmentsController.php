<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appointment;
use Carbon\Carbon;
use App\Slot;
use Illuminate\Support\Facades\Validator;
class AppointmentsController extends Controller
{
    //
	public function createappointment(Request $request){

	$request->validate([
	'customer_id'       => 'required',
	'slot_id'           => 'required',
	'booking_date'      =>'required',
	'start_time'        => 'required',
	'end_time'          =>'required',
	'status'            =>'required',
	'booked_by'         =>'required'
	]);
	$appointments = Appointment::create($request->all());
	// return response([
	// 'message' => 'Great success!',
	// 'appointment' => $appointments
	// ]);
	return $this->sendResponse($appointments,'Great success!',200);
	}

}
