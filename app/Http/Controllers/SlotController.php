<?php

namespace App\Http\Controllers;

use App\Slot;
use App\User;
use App\Service;
use App\Setting;
use App\Employeeservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class SlotController extends Controller
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
        $slots=Slot::with(['employeeservices.users', 'employeeservices.services'])->get();
        return view('slot.lists', compact('slots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=Service::get();
        $employees=User::where('type',2)->get();
        $employeeservices = Employeeservice::all();
        $days = ['Monday','Tuesday','Wednesday','Thrusday','Friday','Saturday','Sunday'];

        return view('slot.create', compact('services','employeeservices','employees','days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $employees = User::where('type',2)->get();
        $services = Service::get();
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thrusday', 'Friday', 'Saturday', 'Sunday'];

        $slot = Slot::with(['employeeservices.users', 'employeeservices.services'])->findOrFail($id);
        return view('slot.edit', compact('slot', 'employees', 'services', 'days'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slot::findOrFail($id)->delete();
        return redirect('slots')->with('error', 'Slot trashed successfully');
    }

    public function download()
    {
        // $table = Slots::get();
        //     $filename = "slots.csv";
        //     $handle = fopen($filename, 'w+');
        //     fputcsv($handle, array('tweet text', 'screen name', 'name', 'created at'));

        //     foreach($table as $row) {
        //         fputcsv($handle, array($row['slot_name'], $row['service'], $row['days'], $row['start_at']));
        //     }

        //     fclose($handle);

        //     $headers = array(
        //         'Content-Type' => 'text/csv',
        //     );

        //     return Response::download($filename, 'slots.csv', $headers);
        return redirect('slots')->with('info', 'Slots downloaded successfully.');
    }
    public function emplist($id,Request $request)
    {
        /**
         * if no booking is there for the selected slot only then slots can be deleted
         */
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
