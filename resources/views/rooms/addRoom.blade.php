@extends('layouts.master')

@section('content')
    <title>Add Room</title>

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add Room</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('form/saveRoom/save') }}" method="POST">
                        @csrf
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room ID</label>
                                    <input class="form-control" type="text" name="room_id" value="ROOM-0001"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Number</label>
                                    <input class="form-control" name="room_number"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Room Type</label>
                                    <select class="form-control" name="room_type">
                                        <option>Select</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Floor</label>
                                    <select class="form-control" name="floor">
                                        <option>Select</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AC/NON-AC</label>
                                    <select class="form-control" name="ac">
                                        <option>Select</option>
                                        <option value="AC">AC</option>
                                        <option value="NON-AC">NON-AC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Shelf</label>
                                    <select class="form-control" name="shelf">
                                        <option>Select</option>
                                        <option value="Available">Available</option>
                                        <option value="Non-Available">Non-Available</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Bed Count</label>
                                    <select class="form-control" name="bed">
                                        <option>Select</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Indoor Bathroom</label>
                                    <select class="form-control" name="bathroom">
                                        <option>Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Capacity</label>
                                    <input type="number" class="form-control" name="capacity"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Rent/Month</label>
                                    <input class="form-control" type="text" name="rent_charge"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Occupant</label>
                                    <select class="form-control" name="occupant">
                                        <option value="">Select Occupant</option>
                                        <option>None</option>
                                        @foreach ($occupants as $occupant)
                                        <option value="{{ $occupant->name }}" data-name="{{ $occupant->occ_id }}">
                                            {{ $occupant->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary buttonedit1">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
