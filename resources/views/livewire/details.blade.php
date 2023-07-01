<?php /**** @see App\Http\Livewire\details **/?>
<div>
    @section('head',"$customer->first_name $customer->last_name's Climbing Records")

    <div class="container" >
        @if(session()->has('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body col-md-4">
                        <table width="30" class="table table-striped " >
                            <thead>
                            <tr>
                                <th>First Name:</th>
                                <td style="text-transform:capitalize">{{ $customer->first_name}}</td>
                            </tr>
                            <tr>
                                <th>Last Name:</th>
                                <td style="text-transform:capitalize">{{ $customer->last_name}}</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td>{{ $customer->gender}}</td>
                            </tr>
                            <tr>
                                <th>Age:</th>
                                <td>{{ $customer->age}}</td>
                            </tr>
                            <th> CONTACTS</th>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $customer->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone contacts:</th>
                                <td>{{ $customer->phone_no}}</td>
                            </tr>



                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>All records</h4>
        </div>
        <div class="card-body">
            <table id="dtBasicExample" class="table table-striped table-advance table-hover table-sm" >
                <thead>
                <tr>
                    <th>#</th>
                    <th>Device IMEI</th>
                    <th>Body temperature (<sup>0</sup>C)</th>
                    <th>Surrounding temperature (<sup>0</sup>C)</th>
                    <th>Humidity</th>
                    <th>Bpm</th>
                    <th>Attitude (Meters)</th>
                    <th>Velocity (m/s)</th>
                    <th>Time</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($devices as $device )
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><strong>{{$device->dev_id}}</strong></td>
                        <td>{{$device->body}}</td>
                        <td>{{$device->temp}}</td>
                        <td>{{$device->hum}}</td>
                        <td>{{$device->bpm}}</td>
                        <td>{{$device->att}}</td>
                        <td>{{$device->speed}}</td>
                        <td>{{\Carbon\Carbon::parse($device->created_at)->format('g:i A')}}</td>
                        <td>{{\Carbon\Carbon::parse($device->created_at)->format('d-m-y')}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
