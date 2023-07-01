<?php

namespace App\Http\Livewire\Modal;

use App\Models\Imei;
use Livewire\Component;

class Create extends Component
{
    public $names,$name,$imei;
    protected $listeners=['refreshComponent'=>'$refresh'];

    public function resetField(){
        $this->name="";
    }
    public function render()
    {
        return view('livewire.modal.create')->layout('layouts.dash');
    }

    public function mount(){
        $this->names=Imei::all();
    }

    public function store(){
        $this->validate([
            "name"=>['required','string','unique:imeis','max:8']]);

        Imei::create(["name"=>$this->name]);
        $this->resetField();
        $this->emit('newDevice');
        session()->flash('message','Successfully add a new device');


    }



    public function delete($id){
        $check=Imei::where('id',$id)->first();
        if ($check->status==1)
        {
            session()->flash('respond','Deactivate device to remove');
        }
        else{
            $check->delete();
            $this->emit('refreshComponent');
            session()->flash('message','Device removed successfully');
        }


    }
}
