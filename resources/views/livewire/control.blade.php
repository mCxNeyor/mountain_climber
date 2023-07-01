<?php /****@see App\Http\Livewire\Control ***/ ?>
@section('head','Climber records')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h7>All Climbers
                            <button type="button" class="bt btn-primary" data-toggle="modal" data-target="#newClimber">Add new Climber</button>
                        </h7>
                    </div>
                    <div class="card-body">
                        <table class="table striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Phone number</th>
                                <th>Device</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($climbers as $climber)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td style="text-transform:capitalize"><a href="{{route("details",['id'=>$climber->id])}}"> {{$climber->first_name}} {{$climber->last_name}}</a></td>
                                    <td>{{$climber->email}}</td>
                                    <td>{{$climber->gender}}</td>
                                    <td>{{$climber->age}}</td>
                                    <td>{{$climber->phone_no}}</td>
                                    <td>{{$climber->dev_id}}</td>
                                    <td>
                                        @if($climber->status==1)
                                            Active @else Inactive
                                        @endif
                                    </td>
                                    <td>
                                        @if($climber->status==1)
                                            <button type="button" wire:click.prevent="activate({{$climber->id}})" class="btn btn-danger">Deactivate</button>
                                        @else
                                            <button type="button" wire:click.prevent="deActivate({{$climber->id}})" class="btn btn-primary">Activate</button>
                                            <button type="button" wire:click.prevent="delete({{$climber->id}})" class="btn btn-danger">Delete</button>

                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="newClimber" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new climber</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form >
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name*</label>
                                <input type="text" wire:model="first_name" class="form-control  @error('first_name') is-invalid @enderror" id="first_name" placeholder="john">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name*</label>
                                <input type="text" wire:model="last_name" class="form-control  @error('last_name') is-invalid @enderror" id="last_name" placeholder="doe">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email*</label>
                                <input type="email" wire:model="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="john_doe@something.com">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone_no">Phone Number*</label>
                                <input type="tel" wire:model="phone_no"class="form-control  @error('phone_no') is-invalid @enderror" id="phone_no" placeholder="07xx xxx xxx">
                                @error('phone_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="gender">Gender*</label>
                                <select id="gender" wire:model="gender" class="form-control  @error('gender') is-invalid @enderror">
                                    <option selected>Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dev_id">Device*</label>
                                <select id="dev_id" wire:model="dev_id" class="form-control  @error('dev_id') is-invalid @enderror">
                                    <option selected>Choose...</option>
                                    @if(count($devices)>0)
                                    @foreach($devices as $device)<option value="{{$device->name}}">{{$device->name}}</option>@endforeach
                                    @endif
                                </select>
                                @error('dev_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="age">Age</label>
                                <input type="text" wire:model="age" class="form-control  @error('age') is-invalid @enderror" id="age">
                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click.prevent="store()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
