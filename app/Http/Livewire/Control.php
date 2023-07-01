<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Device;
use App\Models\Imei;
use Livewire\Component;

class Control extends Component
{
    public $first_name,$email,$last_name,$age,
        $gender,$phone_no,$dev_id,$devices,$dc;

    protected $listeners=[
        'refreshComponent'=>'$refresh'
    ];

    public function resetField(){
        $this->first_name='';
        $this->last_name='';
        $this->age='';
        $this->gender='';
        $this->phone_no='';
        $this->dev_id='';
        $this->email='';
    }
    public function render()
    {
        return view('livewire.control')->layout('layouts.dash');
    }


    public function mount()
    {
//        $this->climbers=Customer::with('customer')->get();
        $this->climbers=Customer::all();
        $this->devices=Imei::where('status',0)->get();
    }

    public function store()
    {
        $this->validate([
        "first_name"=>'required',
       "last_name"=>'required',
       "age"=>['required','numeric'],
       "gender"=>'required',
       "email"=>['required','unique:customers','email'],
       "phone_no"=>['required','numeric','unique:customers'],
        "dev_id"=>'required',
            ]);
       Customer::create([
          'first_name'=> $this->first_name,
           'last_name'=>$this->last_name,
           'age'=>$this->age,
           'email'=>$this->email,
           'gender'=>$this->gender,
          'phone_no' =>$this->phone_no,
           'dev_id'=>$this->dev_id,
           'status'=>1,
       ]);
        $check=Imei::where('name',$this->dev_id)->first();
        $check->update(['status'=>1]);
        session()->flash('message','New climber added Successfully');
        $this->resetField();
        $this->emit('refreshComponent');
        return redirect()->route('device');
    }


    public function activate($id)
    {
        $cust=Customer::where('id',$id)->first();
        $dv=Imei::where('name',$cust->dev_id)->first();
        if ($cust ==true AND $dv ==true) {
            $dv->update(['status' => 0]);
            $cust->update(['status' => 0]);
        }
        session()->flash('message','Device Successfully Deactivated');
        $this->emit('refreshComponent');
        return redirect()->route('device');
    }
    public function deActivate($id)
    {
        $cust=Customer::where('id',$id)->first();
        $dv=Imei::where('name',$cust->dev_id)->first();
        if ($cust ==true AND $dv ==true)
        {
            $cust->update(['status'=>1]);
            $dv->update(['status'=>1]);
        }
        session()->flash('message','Device Successfully Activated');
        $this->emit('refreshComponent');

    }

    public function delete($id){
        $cust=Customer::where('id',$id)->first();
        $dev=Device::where('cust_id',$cust->id)->first();
       if($dev==true || $cust==true){
           $cust->delete();
           if($dev!=null){
               $dev->delete();
           }

       }
        session()->flash('message','Climber Successfully Deleted');
        $this->emit('refreshComponent');
    }

}
