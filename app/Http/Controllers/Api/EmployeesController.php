<?php

namespace App\Http\Controllers\Api;
use App\Mail\RegistrationMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
Use Auth;
use Illuminate\Support\Facades\Validator;
use DB, Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;

class EmployeesController extends Controller
{
    //
    public function addemployeebyadmin(Request $request)
    {
		$super_admin = Auth::user()->type;
		$credentials = $request->only('name', 'email', 'password');
		$rules = [
		'name' => ['required', 'min:3'],
		'email'=> ['required','email', 'unique:users,email'],
		'password' => ['required', 'min:8']
		
		];

		$validator = Validator::make($credentials, $rules);

		if($validator->fails()) {
		return response()->json(['status'=> false, 'error'=> $validator->messages()]);
		}

		$name = $request->name;
		$email = $request->email;
		$password = $request->password; 
		if($super_admin == config('global.user_type.superadmin')){       
			$user = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password),'type' => 2,'status'=>1]);
			// Mail::to($email)->send(new RegistrationMail($name));
			Mail::to($request->email)->send(new RegistrationMail($name));
			return response()->json(['status'=> true, 'message'=> 'User has been created']);
		}
		else{
				return response()->json(['status'=> false, 'message'=> 'Unauthorized access']);	
		}
    }
     /*
	@Edit User
    */ 
    public function editusers(Request $request, $id)
    {
    	$user = User::findOrFail($id);
		$fieldsneeded = $request->only('name');

		$rules = [
			'name' => ['required','min:3']
		];

		$validator = Validator::make($fieldsneeded, $rules);

		if($validator->fails()) {
		return response()->json(['status'=> false, 'error'=> $validator->messages()]);
		}
		$user->update($request->all());
		return response()->json(['status'=>true, 'message'=>'User  updated sucessfuly']);
    }
    /*
	@Delete User
	*/
	public function deleteusers($id)
	{
		$super_admin = Auth::user()->type;
		if($super_admin == config('global.user_type.superadmin')){ 
			User::findOrFail($id)->delete();
			return response()->json(['status'=>true]);
		}
		else{
			return response()->json(['status'=> false, 'message'=> 'Unauthorized access']);	
		}
	}
}
