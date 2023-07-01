<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Device;
use Livewire\Component;

class Details extends Component
{
    public $customer,$cust_id,$devices;

    public function mount($id){

        $this->customer=Customer::find($id);
        $this->devices=Device::where('cust_id',$id)->get();

    }

    public function render()
    {
        return view('livewire.details')->layout('layouts.dash');
    }
}
