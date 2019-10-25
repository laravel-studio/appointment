<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function calendar()
    {

    	 return view('booking.calender');
    }
}
