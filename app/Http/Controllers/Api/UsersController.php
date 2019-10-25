<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slot;
use Illuminate\Support\Facades\DB;
use App\Service;
use App\Employeeservice;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    //

    /**
     * Display a listing of the users by type.
     *
     * @return \Illuminate\Http\Response
     */
    public function listuserbytype(Request $request)
    {
		$super_admin = Auth::user()->type;		
        $users = User::where('type',$request->type)->get();       
		if($super_admin == config('global.user_type.superadmin')) {
			if(count($users)>0){
				
				return $this->sendResponse($users,'All user lists',200);
			}
			else{
				
				return $this->sendError('No user found',400);
			}
		} 
		else {
			return $this->sendError('You are not admin',401);
		}
    }
}
