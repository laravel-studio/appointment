<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
class ServiceController extends Controller
{
    //
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
                        ->with('success','service updated successfully');
    }

    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
        // $user->delete();
        return redirect()->route('services.index')
                        ->with('success','Product deleted successfully');
    }
    
}
