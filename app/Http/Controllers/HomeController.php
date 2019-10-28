<?php

namespace App\Http\Controllers;

use Charts;
use App\User;
use App\Service;
use App\Setting;
use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $appointments = Appointment::with('slots.employeeservices.services', 'users', 'slots.employeeservices.users')->get();
        $services = Service::orderBy('id', 'desc')->take(4)->get();
        $employees = User::orderBy('created_at','desc')->where('type', 2)->limit(8)->get();

        $servicesall = DB::table('services')->where('deleted_at', null)->get();
        $employeesall = DB::table('users')->where('type',2)->where('deleted_at', null)->get();
        $employeeservicesall = DB::table('employeeservices')->where('deleted_at', null)->get();
        $appointmentsall = DB::table('appointments')->where('deleted_at', null)->get();

        $servicescount = count($servicesall);
        $employeescount = count($employeesall);
        $employeeservicescount = count($employeeservicesall);
        $appointmentscount = count($appointmentsall);


        $appointmentBookings = Appointment::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))
                ->get();
        $chart = Charts::database($appointmentBookings, 'bar', 'highcharts')
            ->title("Yearly Bookings Stats")
            ->elementLabel("Total Bookings")
            ->responsive(false)
            ->groupByMonth(date('Y'), true);

        return view('users.dashboard', compact('appointments', 'services', 'servicescount', 'employees' ,'employeescount', 'employeeservicescount', 'appointmentscount', 'chart'));
    }

}
