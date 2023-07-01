<?php /**** @see App\Http\Livewire\Modal\Create ***/ ?>

<div>
    @section('head','Add new Tracker device')
    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h7>All Devices
                            <button type="button" class="bt btn-primary" data-toggle="modal" data-target="#newDevice">Add new device</button>
                        </h7>
                    </div>
                    <div class="card-body">
                        <table id="dtBasicExample" class="table table-striped table-advance table-hover table-sm" >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>IMEI</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($names as $name )
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td style="text-transform:capitalize">{{$name->name}}</td>
                                    <td>
                                        @if($name->status==1)
                                            Active @else Inactive
                                        @endif
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($name->created_at)->format('g:i A')}},
                                    {{\Carbon\Carbon::parse($name->created_at)->format('d-m-y')}}</td>
                                    <td><button wire:click.prevent="delete({{$name->id}})" class="btn btn-danger">Delete</button>
                                   @if(session()->has('respond')) <span class="alert alert-warning">Deactivate to remove device</span>@endif</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div wire:ignore.self class="modal fade" id="newDevice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new device</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form >
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="imei">Device unique ID(IMEI)</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" id="name" placeholder="@example_53704173648">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                            </div>

                            @enderror
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
