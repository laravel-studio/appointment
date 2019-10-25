# Customers
---
- [Database](/{{route}}/{{version}}/customers/#database)
- [Routes](/{{route}}/{{version}}/customers/#routes)
- [Controller](/{{route}}/{{version}}/customers/#controller)
- [Model](/{{route}}/{{version}}/customers/#model)

<a name="database"></a>
## Database

There is separate table for `customers` in the database. `Customer` belongs to `type` 3 in the `users` table. So, the table structure is same as `users` table.


<a name="routes"></a>
## Routes


### User Route List
```php
// Users list
Route::get('/users', 'UserController@index')->name('users');
// Users Create
Route::get('/users/create', 'UserController@create');
// Users Store
Route::post('users/save', 'UserController@store')->name('save');
// Users Edit
Route::get('/users/edit/{user}', 'UserController@edit');
// Users Update
Route::patch('users/update/{user}', 'UserController@update')->name('users.update');
// Users Delete
Route::delete('users/{user}', 'UserController@destroy');
// User Profile Image Edit
Route::get('/users/profile/edit/{id}', 'UserController@profile');
// User Profile Image Update
Route::patch('users/profileupdate/{id}', 'UserController@profileupdate')->name('users.profileupdate');
```

<a name="controller"></a>
## Controller

Below `code` describes the `UserController`.

```php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
class UserController extends Controller
{
    // User List
    public function index()
    {
        $users = User::all();
        return view('users.list', compact('users'));
    }

    // User Create
    public function create()
    {
    	return view('users.add');
    }

    // User Store
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

		return redirect('users')->with('success', 'User created successfully.');
    }

    // User Edit
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));

    }

    // User Update
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

    // User Delete
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('users')->with('error', 'User deleted successfully');
    }

    // User Profile
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

    // User Profile Update
    public function profileupdate(Request $request, Int $userId){

        $user = Auth::user();
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

    // User List Excel Export
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}

```

<a name="model"></a>
## Model

`Customer` module do not has separate `model`. `User` model is considered the `customer's` model here.

```php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject


{
    use SoftDeletes;
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type', 'status', 'profileimage'];
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function getUserDetails($id)
    {
        $users=DB::table('users')
        ->select('users.id','users.name', 'users.profileimage','employeeservices.id as service_id', 'employeeservices.price')
        ->join('employeeservices','users.id','=', 'employeeservices.employee_id')
        ->where('employeeservices.service_id','=',$id)
        ->whereNull('employeeservices.deleted_at')
        ->get();
        return $users;
    } //end of funciton
    public static function getUserSlotDetails($id)
    {
        $users = DB::table('users')
            ->select('users.id', 'users.name', 'users.profileimage', 'employeeservices.id as service_id', 'employeeservices.price', 'slots.days as slot_day', 'slots.start_time as slot_start_time', 'slots.id as slot_id', 'services.duration', 'slots.end_time as slots_end_time')
            ->join('employeeservices', 'users.id', '=', 'employeeservices.employee_id')
            ->join('slots', 'slots.employee_service_id', '=', 'employeeservices.id')
            ->join('services', 'services.id', '=', 'employeeservices.service_id')
            ->where('employeeservices.service_id', '=', $id)
            ->whereNull('employeeservices.deleted_at')
            ->get();
        return $users;
    }//end of funciton

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Path function for testing edit functionality
     */
    public function editPath()
    {
        return "/employees/edit/{$this->id}";
    }

    /**
     * Path for testing update functionality
     */
    public function updatePath()
    {
        return "employees/update/{$this->id}";
    }

    /**
     * Path for delete employees functionality
     */
    public function deleteEmployees()
    {
        return "employees/delete/{$this->id}";
    }
}

```
