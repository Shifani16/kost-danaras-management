@extends('layouts.master')

@section('content')
    <title>All Room</title>

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">All Rooms</h4>
                            <a href="{{ route('form/addRoom/page') }}" class="btn btn-primary float-right veiwbutton">Add
                                Room</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Room ID</th>
                                            <th>Room Number</th>
                                            <th>Room Type</th>
                                            <th>Floor</th>
                                            <th>AC/NON-AC</th>
                                            <th>Shelf</th>
                                            <th>Bed Count</th>
                                            <th>Indoor Bathroom</th>
                                            <th>Capacity</th>
                                            <th>Rent Charge</th>
                                            <th>Occupant</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allRoom as $room)
                                            <tr>
                                                <td>{{ $room->room_id }}</td>
                                                <td>{{ $room->room_number }}</td>
                                                <td>{{ $room->room_type }}</td>
                                                <td>{{ $room->floor }}</td>
                                                <td>{{ $room->ac }}</td>
                                                <td>{{ $room->shelf }}</td>
                                                <td>{{ $room->bed }}</td>
                                                <td>{{ $room->bathroom }}</td>
                                                <td>{{ $room->capacity }}</td>
                                                <td>{{ $room->rent_charge }}</td>
                                                <td>{{ $room->occupant }}</td>
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"
                                                                href="{{ route('room.edit', ['room_id' => $room->id]) }}">
                                                                <i class="fas fa-pencil-alt m-r-5"></i> Edit
                                                            </a>
                                                            <a class="dropdown-item roomDelete"
                                                                href="{{ route('form/deleteRoom/delete') }}"
                                                                data-toggle="modal" data-target="#delete_asset"
                                                                data-id="{{ $room->id }}">
                                                                <i class="fas fa-trash-alt m-r-5"></i> Delete
                                                            </a>

                                                        </div>
                                                    </div>
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
        </div>
        <div id="delete_asset" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <form action="{{ route('form/deleteRoom/delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="room_id">
                            <h3 class="delete_class">Are you sure want to delete this Occupant?</h3>
                            <div class="m-t-20">
                                <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
 
    <script>
        $(document).on('click', '.roomDelete', function() {
            var roomId = $(this).data('id');
            $('#room_id').val(roomId);
        });
    </script>
@endsection
@endsection
