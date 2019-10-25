<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slot;
use Illuminate\Support\Facades\DB;
use App\Service;
use App\Employeeservice;
use App\User;
use Illuminate\Support\Facades\Validator;
class SlotsController extends Controller
{
    
	/*
	@List all the slots
	*/ 
	public function listslots(){
		$slots=Slot::with(['employeeservices.users', 'employeeservices.services'])->get();
		if(count($slots)>0){
			return $this->sendResponse($slots,'All Slots lists',200);
		}
		else{
			return $this->sendError($slots, 'No Slots found',400);
		}
	}
    /*
	@Add new slots
    */
    public function addslot(Request $request){
    	$services=Service::get();
        $employees=User::where('type',2)->get();
        $employeeservices = Employeeservice::all();
        $days = ['Monday','Tuesday','Wednesday','Thrusday','Friday','Saturday','Sunday'];

		$fieldsneeded = $request->only('service', 'employee_service_id', 'days','start_time','end_time');

		$rules = [
		'service' => 'required',
		'employee_service_id' => 'required',
		'days' => 'required',
		'start_time' => 'required',
		'end_time' => 'required'
		];

		$validator = Validator::make($fieldsneeded, $rules);

		if($validator->fails()) {
		return response()->json(['status'=> false, 'error'=> $validator->messages()]);
		}
		// dd($request->starttime);
		// foreach($request->days as $day) {
		          // Slot::create([
		          //     'employee_service_id' => $request->employee_service_id,
		          //     'days' => $request->days,
		          //     'start_time' => $request->starttime,
		          //     'end_time' => $request->endtime
		          // ]);
		 // }
		Slot::create($request->all());
		return response()->json(['status'=>true, 'message'=>'Slots added sucessfuly']);
    }
    /*
	@Edit Slot
    */ 
    public function editslots(Request $request, $id){
    	$slots = Slot::findOrFail($id);
		$fieldsneeded = $request->only('days', 'start_time', 'end_time');

		$rules = [
			'days' => 'required',
			'start_time' => 'required',
			'end_time' => 'required'
		];

		$validator = Validator::make($fieldsneeded, $rules);

		if($validator->fails()) {
		return response()->json(['status'=> false, 'error'=> $validator->messages()]);
		}
		$slots->update($request->all());
		return response()->json(['status'=>true, 'message'=>'Slots updated sucessfuly']);
    }

    /*
	@Delete Slots
	*/
	public function deleteslots($id){
		Slot::findOrFail($id)->delete();
		return response()->json(['status'=>true]);
	}
}
