<?php

use App\Events\Gps;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashbord;
use App\Http\Livewire\Control;
use App\Http\Livewire\Modal\Create;
use App\Http\Livewire\Details;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('history',control::class)->name('history');
Route::get('/monitors', function () {
    event(new Gps(-1.036,134.344));
//    event(new \App\Events\TestEvent('Sent from my Laravel appxlication'));
    return 'moved';
});


Auth::routes();
Route::group(['prefix'=>'admin', 'middleware'=>['auth']],function(){
    Route::get('dashboard',Dashbord::class)->name('dashboard');
    Route::get('climbers',Control::class)->name('device');
    Route::get('device',Create::class)->name('new');
    Route::get('details/{id}',Details::class)->name('details');
    Route::get('settings',[\App\Http\Controllers\HomeController::class,'homePage'])->name('settng');
//    Route::get('profile',CustomerProfile::class)->name('customer.profile');
//    Route::get('post',CustomerPostProduct::class)->name('customer.post');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
