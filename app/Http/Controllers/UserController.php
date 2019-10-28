<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Setting;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Mail\RegistrationMail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    //
    /**
     * Constructor Function
     */
    public function __construct()
    {
        // locale setup starts
        $lang_locale = 'en';
        $lang = Setting::select('option_value')->where('option_key', 'language')->get();
        $lang_val = $lang->toArray();
        if (count($lang_val) > 0) {
            $lang_locale = $lang_val[0]['option_value'];
        }
        App::setLocale($lang_locale);
        // locale setup ends
    }
    public function index()
    {
        $users = User::all();
        return view('users.list', compact('users'));
    }
    public function create()
    {
    	return view('users.add');
    }
    public function store(Request $request)
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
         Mail::to($request->email)->send(new RegistrationMail($request->name));
		return redirect('users')->with('success', 'User created successfully.');
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
        return redirect('users')->with('info', 'User details updted successfully.');


    }
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        // $user->delete();
        return redirect('users')->with('error', 'User deleted successfully');
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

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function verifyuser($id){
      // echo $id;
      User::whereId(base64_decode($id))->update(['status'=>1]);
     return view('layouts.beforelogin.emailverification');
    }
}
