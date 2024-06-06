@extends('layouts.master')
@section('content')
<title>Edit Penghuni</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title mt-5">Edit Occupant</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('form/occupant/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row formtype">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Occupant ID</label>
                                <input class="form-control" type="text" value="{{ $occupantEdit->occ_id }}" name="occupant_id" readonly>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" value="{{ $occupantEdit->name }}" name="name">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Date</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" value="{{ $occupantEdit->date }}" name="date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" value="{{ $occupantEdit->address }}" name="address">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Email ID</label>
                                <input type="text" class="form-control" value="{{ $occupantEdit->email }}" name="email">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" value="{{ $occupantEdit->ph_number }}" name="phone_number">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Room</label>
                                <select class="form-control" name="room">
                                    <option value="">Select Room</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->room_number }}" {{ $room->room_number == $occupantEdit->room ? 'selected' : '' }}>
                                            {{ $room->room_number }}</option>
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
