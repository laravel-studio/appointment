# Appointments
---
 - [Database](/{{route}}/{{version}}/appointments/#database)
 - [Route](/{{route}}/{{version}}/appointments/#route)
 - [Controller](/{{route}}/{{version}}/appointments/#controller)
 - [Model](/{{route}}/{{version}}/appointments/#model)

<a name="database"></a>
## Database

The table structure of `appointments` table is as follows,

| # | Fields | Type | Default |
| : | :- | :- | :- |
| 1 | Id | Big Integer | None |
| 2 | Customer Id | Big Integer | Null |
| 3 | Slot Id | Big Integer | Null |
| 4 | Booking Date | Date | None |
| 5 | Start Time | Time | None |
| 6 | End Time | Time | None |
| 7 | Status | Integer | None |
| 8 | Booked By | Big Integer | Null |
| 9 | Created At | Timestamp | Null |
| 10 | Updatd At | Timestamp | Null |
| 11 | Deleted At | Timestamp | Null |

<a name="route"></a>
## Route

### Appointment Route List
`web.php`
```php
// Appointment List
Route::get('/appointments', 'AppointmentController@index');
// Appointment Create
Route::get('/appointments/book', 'AppointmentController@create');
// Appointment Store
Route::post('/appointments/book', 'AppointmentController@store');
// Appointment App List
Route::get('/appointments/applist/{slot}', 'AppointmentController@applist');
// Appointment Emp List 
Route::get('/service/emplist/{id}','AppointmentController@emplist');
// Appointment History
Route::get('/appointments/booking-history', 'AppointmentController@history');
// Customer's Booking History
Route::get('/appointments/history/{customer}', 'AppointmentController@customerBookingHistory');
// Appointment Report
Route::get('/appointments/booking-reports', 'AppointmentController@reports');
// Appointment Reports in Time Range
Route::get('/appointments/booking-reports/view-reports/{param}', 'AppointmentController@reportDetails');
```

<a name="controller"></a>
## Controller

`AppointmentController.php`
```php

namespace App\Http\Controllers;

use App\Slot;
use App\User;
use DateTime;
use App\Service;
use App\Appointment;
use App\Employeeservice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // Appointment List
    public function index()
    {
        $appointments = Appointment::with('slots.employeeservices.services', 'users', 'slots.employeeservices.users')->get();
        return view('appointment.lists', compact('appointments'));
    }

    // Appointment Create
    public function create()
    {
        $slots = Slot::with(['employeeservices.users', 'employeeservices.services'])->get();

        $services = Service::all();
        return view('appointment.create', compact('slots', 'services'));
    }

    // Appointment Store
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'slot_id' => 'required',
            'user_id' => 'required',
            'init_time' => 'required',
            'ending_time' => 'required',
            'appointment_date' => 'required',
            'status' => 'required',
        ]);

        $updated_date = date('Y-m-d', strtotime($attributes['appointment_date']));

        Appointment::create([
            'customer_id' => $attributes['user_id'],
            'slot_id' => $attributes['slot_id'],
            'booking_date' => $updated_date,
            'start_time' => $attributes['init_time'],
            'end_time' => $attributes['ending_time'],
            'status' => $attributes['status'],
            'booked_by' => Auth::user()->id
        ]);
        return redirect('/appointments')->with('success', 'Appointment booked successfully');
    }

    /**
     * Select slot from service name to get remaining data
     *
     * remaining data will be called from ajax
     */
    public static function applist(Request $request, $id)
    {
        if ($request->ajax()) {
            $slots = Slot::where('id',$id)->with(['employeeservices.users', 'employeeservices.services'])->first();
            $slots_id = $slots->id;
            $employee = $slots->employeeservices->users;
            $price = $slots->employeeservices->price;
            $start_time = $slots->start_time;
            $end_time = $slots->end_time;
            $dayyss = $slots->days;
            $prices = $slots->employeeservices->price;
            /**
             * Duration Calculation in between start time and end time
             */
            $start = Carbon::parse($start_time);
            $end = Carbon::parse($end_time);
            $mins = $end->diffInMinutes($start);
            $estim = $mins.' hour(s)';
            /** Duration Calculation Ends Here */
            $str = '';
            $str = array($employee, $price, $start_time, $end_time, $dayyss, $prices, $estim, $slots_id);
            return ($str);
            die();
        }
        return response(['status' => false, 'code' => 403,], 403);
    }

    // Get specific user's booking details
    public function emplist($id, Request $request)
    {
        if ($request->ajax()) {
            $users = User::getUserSlotDetails($id);
            $customers = User::where('type', 3)->get();
            $returnHTML = view('appointment.emplist')->with('users', $users)->with('customers', $customers)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
            die();
        }
        return response(['status' => false, 'code' => 403,], 403);
    }  //end of function

    // Get Appointment History
    public function history()
    {
        $customers = Appointment::select('customer_id')->with(['users'])->groupBy('customer_id')->get();
        $appointments = Appointment::all();
        return view('appointment.bookinghistory', compact('appointments', 'customers'));
    }

    // Get Customer Booking History
    public function customerBookingHistory(Request $request, $id)
    {
        if ($request->ajax()) {
            $users = User::getUserSlotDetails($id);
            $customers = User::where('type', 3)->get();
            $booked_customers = Appointment::where('customer_id', $id)->with(['slots.employeeservices.services', 'slots.employeeservices.users', 'users', 'booker'])->get();
            $now = new DateTime();
            $returnHTML = view('appointment.customerbookings')->with('users', $users)->with('customers', $customers)->with('booked_customers', $booked_customers)->with('now', $now)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
            die();
        }
        return response(['status' => false, 'code' => 403,], 403);
    } // end of function

    // Get Booking Reports by Time Period Range
    public function reports()
    {
        $attributes = array(
            "Date Wise" => "date",
            "Customer Wise" => "customer",
            "Employee Wise" => "employee",
            "Quaterly" => "quaterly",
            "Monthly" => "monthly",
            "Weekly" => "weekly"
        );
        return view('appointment.reports.reportindex', compact('attributes'));
    } // end of function

    // Appointment Report Details
    public function reportDetails(Request $request, $param)
    {
        if ($request->ajax())
        {
            $range = json_decode($param, true);
            $starting_date = $range['start'];
            $ending_date = $range['end'];

            $customers = User::where('type', 3)->get();
            $appointments = Appointment::whereBetween('booking_date', [$starting_date, $ending_date])
                            ->with(['slots.employeeservices.services', 'slots.employeeservices.users', 'users', 'booker'])
                            ->get();

            $returnHTML = view('appointment.reports.reportdetails')->with('customers', $customers)->with('appointments', $appointments)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
            die();
        }
        return response(['status' => false, 'code' => 403,], 403);
    } // end of function
}

```

<a name="model"></a>
## Model

`Appointment.php`
```php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Slot;
use App\User;

class Appointment extends Model
{
    use softDeletes;

    protected $fillable = ['customer_id','slot_id','start_time','end_time','status','booking_date','booked_by'];

    public function slots()
    {
        return $this->belongsTo(Slot::class,'slot_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function booker()
    {
        return $this->belongsTo(User::class, 'booked_by');
    }
}

```
