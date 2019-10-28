<?php

namespace App\Http\Controllers;

use App\User;
use App\Setting;
use Illuminate\Http\Request;
use App\Exports\EmployeesExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use \Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $employee = User::findOrFail($id);
        return view('employee.edit', compact('employee'));
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
        $employee = User::findOrFail($id);
        $attributes=request()->validate([
            'name' => ['required','min:3'],
        ]);

        $employee->update($attributes);

        return redirect('employees')->with('info', 'Employee details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('employees')->with('error', 'Employee trashed successfully');
    }

    /**
     * Export as excel for employees
     */
    public function exportExcel()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }
}
