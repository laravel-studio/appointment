# Employees
---
- [Database Table Structure](/{{route}}/{{version}}/employees/#database-table-structure)
- [Routes](/{{route}}/{{version}}/employees/#routes)
- [Controller](/{{route}}/{{version}}/employees/#controller)
- [Model](/{{route}}/{{version}}/employees/#model)


<a name="database-table-structure"></a>
## Database Table Structure

Below `table` decribes the table-structure of `employees`.

| # | Name | Type | Default |
| : | :- | :- | :- |
| 1 | Id | Integer | None |
| 2 | Name | Varchar | None |
| 3 | Email | Varchar | None |
| 4 | Email Verified At | Timestamp | Null |
| 5 | Password | Varchar | None |
| 6 | Type | Integer | Null |
| 7 | Status | Integer | Null |
| 8 | Remember Token | Varchar | Null |
| 9 | Created At | Timestamp | Null |
| 10 | Updated At | Timestamp | Null |
| 11 | Deleted At | Timestamp | Null |
| 12 | Profile Image | Longtext | Null |

<a name="routes"></a>
## Route

### Employee Routes

```php
// Role List
Route::get('/employees', 'EmployeeController@index')->name('employees');
// Role Create
Route::get('/employees/create', 'EmployeeController@create');
// Role Store
Route::patch('/employees/create', 'EmployeeController@create');
// Role Edit
Route::get('/employees/edit/{employee}', 'EmployeeController@edit');
// Role Update
Route::patch('/employees/update/{employee}', 'EmployeeController@update');
// Role Delete
Route::delete('/employees/{employee}', 'EmployeeController@destroy');
```
<a name="controller"></a>
### Controller

Below `code` describes `controller` of `Employee` module,

```php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeesExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    // Employee List
    public function index()
    {
            $loggedin_user= Auth::user();

            $employees=User::where('type',2);

            if($loggedin_user->type!=1)
            {
                $employees->where('status',1);
                $employees->whereNull('deleted_at');
            }
            $employees=$employees->where('id','!=',Auth::id())->get();

        return view('employee.lists', compact('employees'));
    }

    // Employee Create or Store
    public function create(Request $request)
    {
        //
        if($request->isMethod('PATCH'))
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
                'type' => 2,
                'status' => 1
            ]);
            return redirect('employees')->with('success', 'Employee created successfully');
        }
        else {
            return view('employee.add');
        }

    }

    // Employee Edit
    public function edit($id)
    {
        $employee = User::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    // Employee Update
    public function update(Request $request, $id)
    {
        $employee = User::findOrFail($id);
        $attributes=request()->validate([
            'name' => ['required','min:3'],
        ]);

        $employee->update($attributes);

        return redirect('employees')->with('info', 'Employee details updated successfully');
    }

    // Employee Delete
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('employees')->with('error', 'Employee trashed successfully');
    }

    // Export as Excel
    public function exportExcel()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }
}

```

<a name="model"></a>
### Model

`Employees` are part of `User` model. So, there is no separate model for `Employee`.


##### User Model

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
