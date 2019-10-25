<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Service;
use App\Employeeservice;
Use Auth;
use Illuminate\Support\Facades\Validator;
class EmployeeservicesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listemployeewithservices()
    {
        $super_admin = Auth::user()->type;

        $services = Service::all();
        $employee = User::where('type',2);
        $employeeservices = Employeeservice::with(['services','users'])->get();

        if($super_admin == config('global.user_type.superadmin')) {            
            return $this->sendResponse($employeeservices,'All list of emp with services',200);
        } else {
            return $this->sendError($employeeservices, 'No emp with services found',400);
        }
    }

    /**
     * Assign Employee services
     *
     * @return \Illuminate\Http\Response
     */
    public function assignemployeewithservices(Request $request){

		$super_admin = User::where('type', 1);
		$services = Service::all();
		$employees = User::where('type', 2)->get();

		$fieldsneeded = $request->only('service_id', 'employee_id', 'price');

		$rules = [
		'service_id' => 'required',
		'employee_id' => 'required',
		'price' => 'required'
		];

		$validator = Validator::make($fieldsneeded, $rules);

		if($validator->fails()) {
		return response()->json(['success'=> false, 'error'=> $validator->messages()]);
		}
		Employeeservice::create($request->all());
		return response()->json(['success'=>true, 'message'=>'Slots added sucessfuly']);

    }
}
