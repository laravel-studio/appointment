# Employee Services
---
 - [Database](/{{route}}/{{version}}/employeeservices/#database)
 - [Routes](/{{route}}/{{version}}/employeeservices/#routes)
 - [Controller](/{{route}}/{{version}}/employeeservices/#controller)
 - [Model](/{{route}}/{{version}}/employeeservices/#model)

<a name="database"></a>
## Database

| # | Fields | Type |
| : | :- | :- |
| 1 | Id | Integer |
| 2 | Service Id | Integer |
| 3 | Employee Id | Integer |
| 4 | Price | Double |
| 5 | Created At | Timestamp |
| 6 | Updated At | Timestamp |
| 7 | Deleted At | Timestamp |

<a name="routes"></a>
## Routes

### Employee Services Route List

`web.php`
```php
// Employee Service List
Route::get('/employees/services','EmployeeserviceController@index');
// Employee Service Create
Route::get('/employees/services/assign','EmployeeserviceController@create');
// Employee Service Store
Route::post('/employees/services/store','EmployeeserviceController@store');
// Employee Service Edit
Route::get('/employees/services/edit/{employeeservice}','EmployeeserviceController@edit');
// Employee Service Update
Route::patch('/employees/services/update/{employeeservice}','EmployeeserviceController@update');
// Employee Services Request
Route::resource('employeeservices', 'EmployeeserviceController');
```

<a name="controller"></a>
## Controller

`EmployeeserviceController.php`

```php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Employeeservice;
Use Auth;
class EmployeeserviceController extends Controller
{
    // Employee Service List
    public function index()
    {
        $super_admin = User::where('type',1);

        $services = Service::all();
        $employee = User::where('type',2);
        $employeeservices = Employeeservice::with(['services','users'])->get();

        if($super_admin) {
            return view('employeeservice.lists', compact('services', 'employee', 'employeeservices'));
        } else {
            return redirect('employees')->with('error','Access denied! You are not Super Admin');
        }
    }

    // Employee Service Create
    public function create()
    {
        $super_admin = User::where('type', 1);
        $services = Service::all();
        $employees = User::where('type', 2)->get();
        if ($super_admin) {
            return view('employeeservice.create',compact('services', 'employees'));
        } else {
            return redirect('employees')->with('error', 'Access denied! You are not Super Admin');
        }
    }

    // Employee Service Store
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'service_id' => 'required|unique_with:employeeservices,employee_id',
            'employee_id' => 'required',
            'price' => 'required',
        ]);

        Employeeservice::create([
                'service_id' => $attributes['service_id'],
                'employee_id' => $attributes['employee_id'],
                'price' => $attributes['price']
            ]);

        return redirect('employees/services')->with('success', 'Service assigned successfully');
    }

    // Employee Service Edit
    public function edit($id)
    {
        $super_admin = User::where('type', 1);
        $services = Service::all();
        $employees = User::where('type', 2)->get();
        $employeeservices = Employeeservice::with(['users', 'services'])->find($id);
        if ($super_admin) {
            return view('employeeservice.edit',compact('services', 'employees', 'employeeservices'));
        } else {
            return redirect('employees')->with('error', 'Access denied! You are not Super Admin');
        }

    }

    // Employee Service Update
    public function update(Request $request, $id)
    {
        $employeeservice = Employeeservice::findOrFail($id);

        $attributes = request()->validate([
            'service_id' => 'required|unique_with:employeeservices,employee_id,ignore:'.$employeeservice->id,
            'employee_id' => 'required',
            'price' => 'required'
        ]);

        $employeeservice->service_id = $attributes['service_id'];
        $employeeservice->employee_id = $attributes['employee_id'];
        $employeeservice->price = $attributes['price'];

        $employeeservice->save();

        return redirect('employees/services')->with('info','Employeeservices updated successfully');

    }

    // Employee Service Delete
    public function destroy($id)
    {
        Employeeservice::findOrFail($id)->delete();
        return redirect('employees/services')->with('error','Product deleted successfully');
    }

    // Employee Service Get All Title as JSON Response
    public function getAll()
    {
        $services = Service::select('id','title')->get();
        return response(['status' => true, 'code' => 201, 'data'=> $services], 201);
    }//end of function

    // Get Employees by Service
    public function getEmployeesByService(Request $request)
    {
        $employee_services=Employeeservice::with(['users','services'])->where('service_id',$request->id)->get();
        $response=array();
        $i=0;
        foreach($employee_services as $emp)
        {
            $response[$i]['employee_service_id']=$emp->id;
            $response[$i]['employee_name']=$emp->users->name;
            $response[$i]['service_price']=$emp->price;
            $response[$i]['service_duration']=$emp->services->duration;
            $i++;
        }

        return response(['status' => true, 'code' => 201, 'data'=> $response], 201);
    }//end of function
}

```

<a name="model"></a>
## Model

`Employeeservice.php`
```php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Service;
use App\User;
class Employeeservice extends Model
{
    use softDeletes;

    protected $fillable = ['service_id','employee_id','price'];
    protected $dates = ['deleted_at'];

    public function services()
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'employee_id');
    }
}

```
