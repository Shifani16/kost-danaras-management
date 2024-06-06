@extends('layouts.master')
@section('content')
    <title>Tambah Penghuni</title>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add Occupant</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('form/saveOccupant/save') }}" method="POST">
                        @csrf
                        <div class="row formtype">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="sel1" name="name">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name="date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" id="usr" name="address">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="usr" name="email">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" id="usr1" name="phone_number">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label>Room</label>
                                <select class="form-control" id="room-select" name="room">
                                    <option value="">Select Room</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->room_number }}" data-name="{{ $room->room_number }}">
                                            {{ $room->room_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-10 mt-3 text-right">
                                <button type="submit" class="btn btn-primary buttonedit1">Create Occupant</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script>
        document.getElementById('room-select').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const name = selectedOption.getAttribute('data-name');
            document.getElementById('occupant-name').value = name;
        });
    </script>
@endsection
@endsection
