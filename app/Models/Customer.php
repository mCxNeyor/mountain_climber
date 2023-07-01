<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=[
      "first_name" ,
      "last_name",
      "gender",
      "phone_no",
      "status",
        'age',
        'dev_id',
        'email'
    ];

    public function device(){
        return $this->hasMany(Device::class);
    }
}
