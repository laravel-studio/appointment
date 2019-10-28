<?php

namespace App\Http\Controllers;

use App\User;
use App\Service;
use App\Setting;
use App\Employeeservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
Use Auth;
class EmployeeserviceController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $current_user = $this->auth()->user;
        $super_admin = User::where('type', 1);
        $services = Service::all();
        $employees = User::where('type', 2)->get();
        if ($super_admin) {
            return view('employeeservice.create',compact('services', 'employees'));
        } else {
            return redirect('employees')->with('error', 'Access denied! You are not Super Admin');
        }
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employeeservice::findOrFail($id)->delete();
        return redirect('employees/services')->with('error','Product deleted successfully');
    }
    public function getAll()
    {
        $services = Service::select('id','title')->get();
        return response(['status' => true, 'code' => 201, 'data'=> $services], 201);
    }//end of function
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
