<?php

namespace App\Http\Livewire;

use App\Events\TestEvent;
use App\Models\Customer;
use App\Models\Device;
use Livewire\Component;
use App\Events\Gps;

class Dashbord extends Component
{
    public $climber,$data,$valu=null,$dev,$gps,$dev_id=null,$temp,$hum,$status,$heart,$created_at;
    public float $lat,$long;
////public $data=null,
//    ;
    public $listeners =[
        "refreshComponent",
        "displayData"=>'displayData'
    ];

    public function render()
    {
//        $this->displayData($this->valu);
//        dd($this->data);
        return view('livewire.dashbord')->layout('layouts.dash');
    }


    public function mount(){
        $this->gps = Device::orderBy('id','desc')->first();
        if($this->gps!==null){
            $this->data=true;
            $this->climber=Customer::where('id',$this->gps->cust_id)->first();
            $this->emit('updateGPS', $this->gps->lat, $this->gps->long);
        }
        else
        {
            $this->data=false;
        }

//        DD($this->gps->id);
    }
    public function refreshComponent(){
        $this->mount();
//        DD("sure");
    }


}
