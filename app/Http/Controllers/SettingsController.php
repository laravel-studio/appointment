<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\DB;
class SettingsController extends Controller
{
    //
    public function index()
    {
        // old admin email value
        $settings_email = Setting::select('option_value')->where('option_key', 'admin_email')->get();
        $settings_email_val = $settings_email[0]['option_value'];

        // old site language value
        $settings_language = Setting::select('option_value')->where('option_key', 'language')->get();
        $settings_language_val = $settings_language[0]['option_value'];

        // old site timezone value
        $settings_timezone = Setting::select('option_value')->where('option_key', 'timezone')->get();
        $settings_timezone_val = $settings_timezone[0]['option_value'];

        // old currency value
        $settings_currency = Setting::select('option_value')->where('option_key', 'currency')->get();
        $settings_currency_val = $settings_currency[0]['option_value'];


    	return view('settings.index', compact('settings_email_val', 'settings_language_val', 'settings_timezone_val', 'settings_currency_val'));
    }
    public function create()
    {
        return view('settings.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'language' => 'required',
            'timezone'=>'required',
            'currency'=>'required'
        ]);

        Setting::create($request->all());

        return redirect()->route('settings.index')
                        ->with('success','Settings created successfully.');
    }
    public function update()
    {

    }
    public function updateval(Request $request)
    {
        if ($request->ajax())
        {
            $inputs=($request->input());
            unset($inputs['_token']);
            unset($inputs['_method']);
            $data=array();
            $i=0;
            foreach ($inputs as $key => $value) {

                $data[$i]['option_key']=$key;
                $data[$i]['option_value']=$value;
                $i++;
                 // Setting::updateOrCreate(['option_key'=>$key],['option_value'=>$value]);
                $settings = Setting::firstOrNew(array('option_key' =>$key));
                $settings->option_key = $key;
                $settings->option_value = $value;
                $settings->save();
            }
            return response(['status' => true, 'code' => 200,'message'=>"settings updated"], 200);
        }
        return response(['status' => false, 'code' => 403,], 403);
        die();

    }
}
