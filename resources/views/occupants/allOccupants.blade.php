@extends('layouts.master')
@section('content')
    <title>Semua Penghuni</title>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Daftar Penghuni</h4>
                            <a href="{{ route('form/addOccupant/page') }}" class="btn btn-primary float-right veiwbutton">Add
                                Occupant</a>
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
                                            <th>Occupant ID</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Address</th>
                                            <th>Email ID</th>
                                            <th>Ph.Number</th>
                                            <th>Room</th>
                                            <th>Status</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allOccupants as $occupant)
                                            <tr>
                                                <td>{{ $occupant->occ_id }}</td>
                                                <td>{{ $occupant->name }}</td>
                                                <td>{{ $occupant->date }}</td>
                                                <td>{{ $occupant->address }}</td>
                                                <td>{{ $occupant->email }}</td>
                                                <td>{{ $occupant->ph_number }}</td>
                                                <td>{{ $occupant->room }}</td>
                                                <td>
                                                    <div class="actions">
                                                        <a href="#"
                                                            class="btn btn-sm bg-success-light mr-2">Active</a>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"
                                                                href="{{ route('occupant.edit', ['occ_id' => $occupant->id]) }}">
                                                                <i class="fas fa-pencil-alt m-r-5"></i> Edit
                                                            </a>
                                                            <a class="dropdown-item occupantDelete" href="#"
                                                                data-toggle="modal" data-target="#delete_asset"
                                                                data-id="{{ $occupant->id }}">
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
                        <form action="{{ route('form/deleteOccupant/delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="occupant_id">
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
        $(document).on('click', '.occupantDelete', function() {
            var occupantId = $(this).data('id');
            $('#occupant_id').val(occupantId);
        });
    </script>
@endsection
@endsection
