<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class PriceController extends Controller
{
    public function get_price(Request $request){
        $response = Curl::to('https://api.coindesk.com/v1/bpi/historical/close.json')           /* Using Curl to hit Coin Desk Api */
        ->withData( array( 'start' => $request->date_from,
            'end' => $request->date_to,
        ))->get();

        return $response;
    }
}
