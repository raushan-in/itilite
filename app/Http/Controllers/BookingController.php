<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    
    public function show(Request $request)
    {
        $city = $request->city; 
        $data = [$city];
        return view('booking')->with(['data' => $data]);
    }
}
