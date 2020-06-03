<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function getHotels()
    {
        $json = Storage::disk('local')->get('final.json');
        $json = json_decode($json, true); 
        return $json['data']['data']['hotel']['data']['searchResponse']['hotelList']['api']['allHotels'];
    }

    public function hotelList(Request $request)
    {
        $data = $this->getHotels();
        $city = $request->city;
        return([$city]);
        // return view('booking')->with(['data' => $data]);
    }

}
