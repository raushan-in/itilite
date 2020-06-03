<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FlightController extends Controller
{
    public function getFlights()
    {
        $json = Storage::disk('local')->get('final.json');
        $json = json_decode($json, true); 
        return $json['data']['data']['travel']['data']['result']['flight_data']['flights']['fullDay']['from'];
    }

    public function flightList()
    {
        $data = $this->getFlights();
        return view('booking')->with(['data' => $data]);
    }
}
