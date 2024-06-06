@extends('layouts.master')
@section('content')
<title>Edit Penghuni</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title mt-4">Edit Room</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('form/room/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row formtype">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Room ID</label>
                                <input class="form-control" type="text" value="{{ $roomEdit->room_id }}" name="room_id" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Room Number</label>
                                <input type="text" class="form-control" value="{{ $roomEdit->room_number }}" name="room_number" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Room Type</label>
                                <select class="form-control" name="room_type">
                                    <option value="A" {{ $roomEdit->room_type == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ $roomEdit->room_type == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="C" {{ $roomEdit->room_type == 'C' ? 'selected' : '' }}>C</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Floor</label>
                                <select class="form-control" name="floor">
                                    <option value="1" {{ $roomEdit->floor == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $roomEdit->floor == '2' ? 'selected' : '' }}>2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>AC/NON-AC</label>
                                <select class="form-control" name="ac">
                                    <option value="AC" {{ $roomEdit->ac == 'AC' ? 'selected' : '' }}>AC</option>
                                    <option value="NON-AC" {{ $roomEdit->ac == 'NON-AC' ? 'selected' : '' }}>NON-AC</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Shelf</label>
                                <select class="form-control" name="shelf">
                                    <option value="Available" {{ $roomEdit->shelf == 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Non-Available" {{ $roomEdit->shelf == 'Non-Available' ? 'selected' : '' }}>Non-Available</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Bed Count</label>
                                <select class="form-control" name="bed">
                                    <option value="1" {{ $roomEdit->bed == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $roomEdit->bed == '2' ? 'selected' : '' }}>2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Indoor Bathroom</label>
                                <select class="form-control" name="bathroom">
                                    <option value="Yes" {{ $roomEdit->bathroom == 'Yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="No" {{ $roomEdit->bathroom == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Capacity</label>
                                <input type="text" class="form-control" value="{{ $roomEdit->capacity }}" name="capacity">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Rent/Month</label>
                                <input type="text" class="form-control" value="{{ $roomEdit->rent_charge }}" name="rent_charge">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Occupant</label>
                                <select class="form-control" name="occupant">
                                    <option value="">Select Occupant</option>
                                    <option>None</option>
                                    @foreach ($occupants as $occupant)
                                        <option value="{{ $occupant->name}}" {{ $occupant->name == $roomEdit->name ? 'selected' : '' }}>
                                            {{ $occupant->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-10 mt-3 text-right">
                            <button type="submit" class="btn btn-primary buttonedit1">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
