<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('users.list', compact('users'));
    }
    public function create()
    {
    	return view('users.add'); 
    }
    public function store()
    {
		$attributes = request()->validate([
            'name' => ['required', 'min:3'],
            'email'=> ['required','email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

		User::create([
		'name' => $attributes['name'],
		'email' => $attributes['email'],
		'password' => Hash::make($attributes['password']),
		'type' => 3,
		'status'=>1
		]);       

		return redirect('users');
    }
    public function edit(User $user)
    {   
        // $user = Auth::user();
        return view('users.edit', compact('user'));
        
    }
     public function update(User $user ){ 
     	$attributes = request()->validate([
            'name' => ['required', 'min:3'],
        ]);

		$user->update([
			'name' => $attributes['name'],
		]);

		if($user->password!='')
		{
			$attributes = request()->validate([
	            'password' => ['required', 'confirmed', 'min:8'],
	        ]);
			$user->update([
				'password' => Hash::make($attributes['password'])
			]);

		}
        return redirect('users');

        
    }
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        // $user->delete();
        return redirect('users');
    }
    public function profile($id)
    {   
        if(Auth::check())
        {
            if(Auth::id()==$id)
            {
                $user = Auth::user();
                return view('users.profileedit', compact('user'));
            }
            else
            {
                return redirect()->route('login');
            }
        }
        else
        {
            return redirect()->route('login');
        }        
        
    }

    public function profileupdate(Request $request, Int $userId){ 

        $user = Auth::user();
         // dd($user);
        $attributes = request()->validate([
            'name' => ['required', 'min:3']
        ]);
        $request->validate([
            'profileimage'         =>  'required|image|max:9048'
        ]);
        $image = $request->file('profileimage');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name); 
        $user->update([
            'name' => $attributes['name'],
            'profileimage'=> $new_name
        ]);
        if($user->password!='')
        {
            $attributes = request()->validate([
                'password' => ['required', 'confirmed', 'min:8'],
            ]);
            $user->update([
                'password' => Hash::make($attributes['password'])
            ]);

        }
        return back();

        
    }

}
