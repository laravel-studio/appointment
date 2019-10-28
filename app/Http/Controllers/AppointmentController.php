<?php

namespace App\Http\Controllers;

use App\Slot;
use App\User;
use DateTime;
use App\Service;
use App\Setting;
use App\Appointment;
use App\Employeeservice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::with('slots.employeeservices.services', 'users', 'slots.employeeservices.users')->get();
        return view('appointment.lists', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slots = Slot::with(['employeeservices.users', 'employeeservices.services'])->get();

        $services = Service::all();
        return view('appointment.create', compact('slots', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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


    public function history()
    {
        $customers = Appointment::select('customer_id')->with(['users'])->groupBy('customer_id')->get();
        $appointments = Appointment::all();
        return view('appointment.bookinghistory', compact('appointments', 'customers'));
    }

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

    public function updateStatus($id)
    {
        $appointmentStatus = Appointment::findOrFail($id);
        if($appointmentStatus->status == 0)
        {
            $appointmentStatus->update(['status' => 1]);
        }
        else if($appointmentStatus->status == 1)
        {
            $appointmentStatus->update(['status' => 0]);
        }
        else
        {
            return redirect('/appointments')->with('error','Invalid Operation');
        }
        return redirect('/appointments');
    } // end of function
}
