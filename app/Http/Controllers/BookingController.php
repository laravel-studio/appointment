<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BookingController extends Controller
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

    public function calendar()
    {

    	 return view('booking.calender');
    }
}
