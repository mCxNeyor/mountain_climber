<?php /****@see App\Http\Livewire\Dashbord ***/?>

<div>
    @section('head',"Dashbord")
    <div class="table-responsive" wire:poll.750ms>
        <p>Current time: {{ now() }}</p>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Climber</th>
                <th>Bpm</th>
                <th>Alarm</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Attitude</th>
                <th>Speed</th>
                <th>Surrounding temperature</th>
                <th>Humidity</th>
                <th>Status</th>
                <th>Reported time</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                @if($data==true)
                    <td style="text-transform:capitalize"><a href="{{route('details',['id'=>$climber->id])}}">{{$climber->first_name}} {{$climber->last_name}}</a></td>
                <td>{{$gps->bpm}}</td>
                <td class="@if($gps->body==1)bg-primary @else bg-warning @endif text-black-50 text-center">
                    <strong>
                      @if($gps->body==1)
                          Active @else
                          Inactive
                      @endif
                    </strong>
                  </td>
                <td>{{$gps->lat}}</td>
                <td>{{$gps->long}}</td>
                <td>{{$gps->att}}</td>
                <td>{{$gps->speed}}</td>
                <td>{{$gps->temp}}</td>
                <td>{{$gps->hum}}</td>
                <td class="@if($climber->status==1)bg-primary @else bg-warning @endif text-black-50 text-center">
                  <strong>
                    @if($climber->status==1)
                        Active @else
                        Inactive
                    @endif
                  </strong>
                </td>
                <td> {{ Carbon\Carbon::parse($gps->created_at)->format('d-M-Y G:ia') }}</td>
@else <tr><h4>no Data</h4></tr>@endif
            </tr>
            </tbody>
        </table>
    </div>

{{--    <div id="example"></div>--}}

</div>

 <div class="card">
    <div class="card-header">
        <h2>Location on Map</h2>
    </div>
    <div id="map" class="card-body" style="height:50rem">
    </div>
</div>





