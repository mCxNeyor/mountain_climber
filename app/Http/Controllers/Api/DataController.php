<?php

namespace App\Http\Controllers\Api;

use App\Events\Gps;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Device;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(Request $request)
    {
//        $dev_id=Device::where('dev_id',$request->input('dev_id'))->first();
        $check=Customer::where('dev_id',$request->input('dev_id'))->where('status',1)->first();
        if($check==true){
         Device::create([
                'dev_id'=>$request->input('dev_id'),
                'lat'=>$request->input('lat'),
                'long'=>$request->input('long'),
                'att'=>$request->input('att'),
                'speed'=>$request->input('speed'),
                'bpm'=>$request->input('bpm'),
                'cust_id'=>$check->id,
                'hum'=>$request->input('hum'),
                'temp'=>$request->input('temp'),
            ]);

            event(new Gps($request->input('lat'),$request->input('long'),));
            return response()->json([
                "data received"
            ]);
        }
        else
        {
            return response()->json(['check error']);
        }


    }

    public function feed(){
        $gps = Device::latest()->take(1)->get()->sortBy('id');
        $lat = (double)filter_var($gps->pluck('lat'), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $long= (double)filter_var($gps->pluck('long'), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        return response()->json(compact('lat', 'long','gps'));
}
    public function data(){
        $gps =  Device::orderBy('id','desc')->first();;
        return response()->json(compact('gps'));
    }

}
