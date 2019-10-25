<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;
class RolesController extends Controller
{
    //
    public function index()
    {
		// $role = Role::get();
		$role = Role::all();
		if(count($role)>0){
			return $this->sendResponse($role,'All role lists',200);
		}
		else{
			return $this->sendError($role, 'No role found',400);
		}
		
    }
    /*
    	@Add Roles
    */
    public function addrole(Request $request)
    {
		$request['name']=str_replace(' ','-',strtolower($request->name));
		$role = Role::create($request->except('permission_id', '_token'));
		// foreach($request->permission as $key=>$value)
		// {
		// 	$role->attachPermission($value);
		// }
		return response()->json(['status'=> true, 'message'=> 'Role added sucessfuly']);
    }

	/*
	@Edit Role
	*/
	public function editrole(Request $request, $id){
	$role = Role::findOrFail($id);
	$credentials = $request->only('name', 'display_name', 'description');

	$rules = [
	'name'         =>  'required|unique:roles,name',
	'display_name'      =>  'required',
	'description'   =>  'required'
	];

	$validator = Validator::make($credentials, $rules);

	if($validator->fails()) {
		return response()->json(['status'=> false, 'error'=> $validator->messages()]);
	}

	$role->update($request->all());
	return response()->json(['success'=>true, 'message'=>'Role updated sucessfuly']);

	}
	/*
	@Delete Role
	*/
	public function deleterole($id){
		Role::findOrFail($id)->delete();
		return response()->json(['success'=>true]);
	}
}
