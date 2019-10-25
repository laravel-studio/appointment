<?php

namespace App\Http\Controllers;

use App\User;
use App\Service;
use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Charts;

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
