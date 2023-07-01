<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Device extends Model
{
    use HasFactory;
    protected $fillable=[
        'dev_id','lat','long','att','temp','hum','bpm','cust_id','speed','body'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class,'cust_id');
    }
}
