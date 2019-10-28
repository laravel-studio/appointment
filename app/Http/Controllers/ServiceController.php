<?php

namespace App\Http\Controllers;

use App\Service;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ServiceController extends Controller
{
    //
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
    public function index(){
    	$services = Service::all();
        return view('services.index', compact('services'));
    }
    public function create(){

    	return view('services.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'         =>  'required',
            'duration'      =>  'required|numeric',
            'description'   =>  'required',
            'terms'         =>  'required'
        ]);
        Service::create($request->all());

        return redirect()->route('services.index')
                        ->with('success','Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('services.edit',compact('service'));
    }
    public function update(Request $request, Service $service)
    {
     // return $request->all();
        $request->validate([
            'title'         =>  'required',
            'duration'      =>  'required|numeric',
            'description'   =>  'required',
            'terms'         =>  'required'
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')
                        ->with('info','Service updated successfully');
    }

    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
        // $user->delete();
        return redirect()->route('services.index')
                        ->with('error','Service deleted successfully');
    }

    public function show(Service $service)
    {

        return view('services.index', compact('service'));
    }


}
