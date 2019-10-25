<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ServicesController extends Controller
{
    /*
	@List of all services
    */
	public function serviceslist(){
	$services = Service::all();
	if(count($services)>0){
		return $this->sendResponse($services,'All service lists',200);
	}
	else{
		return $this->sendError($services, 'No service found',400);
	}

	}

	/*
	@Add Service
	*/ 
	public function addservice(StoreBlogPost $request){
		$fieldsneeded = $request->only('title', 'duration', 'description','terms');

		$rules = [
		'title'         =>  'required',
		'duration'      =>  'required|numeric',
		'description'   =>  'required',
		'terms'         =>  'required'
		];

		$validator = Validator::make($fieldsneeded, $rules);

		if($validator->fails()) {
		return response()->json(['success'=> false, 'error'=> $validator->messages()]);
		}
		Service::create($request->all());
		return response()->json(['success'=>true, 'message'=>'service added sucessfuly']);
	}
	/*
	@Edit Services
	*/ 
		public function editservice(Request $request, $id){
		$service = Service::findOrFail($id);
		$fieldsneeded = $request->only('title', 'duration', 'description','terms');

		$rules = [
		'title'         =>  'required',
		'duration'      =>  'required|numeric',
		'description'   =>  'required',
		'terms'         =>  'required'
		];

		$validator = Validator::make($fieldsneeded, $rules);

		if($validator->fails()) {
		return response()->json(['success'=> false, 'error'=> $validator->messages()]);
		}
		$service->update($request->all());
		return response()->json(['success'=>true, 'message'=>'service updated sucessfuly']);
	}
	/*
	@Delete Service
	*/
	public function deleteservice($id){
		Service::findOrFail($id)->delete();
		return response()->json(['success'=>true]);
	}
}
