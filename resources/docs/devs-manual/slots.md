# Slots
---
 - [Database](/{{route}}/{{version}}/slots/#database)
 - [Routes](/{{route}}/{{version}}/slots/#routes)
 - [Controller](/{{route}}/{{version}}/slots/#controller)
 - [Model](/{{route}}/{{version}}/slots/#model)

<a name="database"></a>
## Database

The structure of `slots` table is as follows,

| # | Fields | Type | Default |
| : | :- | :- | :- |
| 1 | Id | Big Integer | None |
| 2 | Employee_Service_Id | Big Integer | Null |
| 3 | Days | Text | None |
| 4 | Start Time | Time | None |
| 5 | End Time | Time | None |
| 6 | Created At | Timestamp | Null |
| 7 | Updated At | Timestamp | Null |
| 8 | Deleted At | Timestamp | Null |

<a name="routes"></a>
## Routes

### Slots Route List
```php
// Slots List
Route::get('/slots','SlotController@index');
// Slots Create
Route::get('/slots/create','SlotController@create');
// Slots Employee List
Route::get('/slots/emplist/{id}','SlotController@emplist');
// Slots Store
Route::post('/slots/create','SlotController@store');
// Slots Update
Route::patch('/slots/{slot}/update', 'SlotController@update');
// Slots Resource Route
Route::resource('slots','SlotController');
```

<a name="controller"></a>
## Controller

`SlotController.php`
```php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slot;
use Illuminate\Support\Facades\DB;
use App\Service;
use App\Employeeservice;
use App\User;
class SlotController extends Controller
{
    // Slots List
    public function index()
    {
        $slots=Slot::with(['employeeservices.users', 'employeeservices.services'])->get();
        return view('slot.lists', compact('slots'));
    }

    // Slots Create
    public function create()
    {
        $services=Service::get();
        $employees=User::where('type',2)->get();
        $employeeservices = Employeeservice::all();
        $days = ['Monday','Tuesday','Wednesday','Thrusday','Friday','Saturday','Sunday'];

        return view('slot.create', compact('services','employeeservices','employees','days'));
    }

    // Slots Store
    public function store(Request $request)
    {
        $request->validate([
            'service' => 'required',
            'employee_service_id' => 'required',
            'days' => 'required',
            'starttime' => 'required',
            'endtime' => 'required',
        ]);
        foreach($request->days as $day) {
            Slot::create([
                'employee_service_id' => $request->employee_service_id,
                'days' => $day,
                'start_time' => $request->starttime,
                'end_time' => $request->endtime
            ]);
        }

        return redirect('/slots')->with('success', 'Slot created successfully');
    }

    // Slots Edit
    public function edit($id)
    {
        $employees = User::where('type',2)->get();
        $services = Service::get();
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thrusday', 'Friday', 'Saturday', 'Sunday'];

        $slot = Slot::with(['employeeservices.users', 'employeeservices.services'])->findOrFail($id);
        return view('slot.edit', compact('slot', 'employees', 'services', 'days'));
    }

    // Slots Update
    public function update(Request $request, $id)
    {
        $slots = Slot::findOrFail($id);

        $request->validate([
            'days' => 'required',
            'starttime' => 'required',
            'endtime' => 'required'
        ]);

        $slots->days = $request->days;
        $slots->start_time = $request->starttime;
        $slots->end_time = $request->endtime;

        $slots->save();
        return redirect('slots')->with('info','Slot updated successfully');
    }

    // Delete Slots
    public function destroy($id)
    {
        Slot::findOrFail($id)->delete();
        return redirect('slots')->with('error', 'Slot trashed successfully');
    }

    // Employee List Available for the slot
    public function emplist($id,Request $request)
    {
        if ($request->ajax())
        {
            $users= User::getUserDetails($id);

            $returnHTML = view('slot.slotemplist')->with('users', $users)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
            die();
        }
        return response(['status' => false, 'code' => 403,], 403);
    }//end of function
}

```

<a name="model"></a>
## Model

`Slot.php`
```php

namespace App;

use App\Employeeservice;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slot extends Model
{
    use SoftDeletes;

    protected $fillable = ['employee_service_id', 'days', 'start_time', 'end_time', ];
    protected $dates = ['deleted_at'];

    public function employeeservices()
    {
        return $this->belongsTo(Employeeservice::class, 'employee_service_id');
    }

    public static function getSlotDetails($id)
    {
        $slots = DB::table('slots')
            ->select('slots.*')
            ->join('employeeservices', 'employeeservices.id','slots.employee_service_id')
            ->join('appointments', 'appointments.slot_id', 'slots.id')
            ->where('slots.id', '=', $id)
            ->get();


        return $slots;
    }

    /**
     * Slots edit path for testing
     */
    public function editPath()
    {
        return "slots/emplist/{$this->id}";
    }

    /**
     * Slots update path for testing
     */
    public function updatePath()
    {
        return "slots/{$this->id}";
    }
}

```
