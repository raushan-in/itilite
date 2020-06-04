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

    public function getSources()
    {
        $source = [];
        $hotels_data = $this->getHotels();

        foreach ($hotels_data as $hotel) {
            array_push($source,$hotel['info'][0]['source']);
          }

        return array_unique($source);
    }

    public function hotelList(Request $request)
    {
        $hotels = $this->getHotels();
        $source = $request->source;
        $filtered_hotels = [];

        foreach ($hotels as $hotel) {
            if ($hotel['info'][0]['source'] == $source){
                array_push($filtered_hotels,$hotel);
            } 
          }
        return($filtered_hotels);
    }

    public function hotelPage(Request $request)
    {
        return view('hotel')->with(['sources' => $this->getSources()]);
    }

}
