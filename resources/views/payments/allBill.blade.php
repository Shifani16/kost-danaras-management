@extends('layouts.master')
@section('content')
    <title>All Bill</title>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="mt-5">
                            <h4 class="card-title float-left mt-2">Data Tagihan</h4>
                            <a href="{{ route('form/addBill/page') }}" class="btn btn-primary float-right veiwbutton">Create
                                Bill</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="searchForm" method="GET" action="{{ route('form/allBill/page') }}">
                        <div class="row formtype">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>From</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name="from_date" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>To</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name="to_date" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <div class="form-group w-50">
                                    <button type="submit"
                                        class="btn btn-success btn-block mt-0 search_button">Search</button>
                                </div>
                                <div class="form-group w-50" style="margin-left: 10px;">
                                    <a href="{{ route('form/print') }}" target="_blank"
                                        class="btn btn-primary w-100">Print</a>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                            <th>Payment Number</th>
                                            <th>Occupant ID</th>
                                            <th>Name</th>
                                            <th>Created Date</th>
                                            <th>Due Date</th>
                                            <th>Amount</th>
                                            <th class="text-right">Status</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="billTableBody">
                                        @foreach ($allPayment as $bill)
                                            <tr>
                                                <td>{{ $bill->bill_id }}</td>
                                                <td>{{ $bill->occ_id }}</td>
                                                <td>{{ $bill->name }}</td>
                                                <td>{{ $bill->from_date }}</td>
                                                <td>{{ $bill->due_date }}</td>
                                                <td>{{ $bill->jml_tagihan }}</td>
                                                <td class="text-right">
                                                    <span
                                                        class="{{ $bill->status == 'Belum Bayar' ? 'badge bg-warning-light' : 'badge bg-success-light' }}">
                                                        {{ $bill->status }}
                                                    </span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"
                                                                href="{{ route('bill.edit', ['bill_id' => $bill->id]) }}">
                                                                <i class="fas fa-pencil-alt m-r-5"></i> Edit
                                                            </a>
                                                            <a class="dropdown-item billDelete" href="#"
                                                                data-toggle="modal" data-target="#delete_asset"
                                                                data-id="{{ $bill->id }}">
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
                        <form id="deleteForm" action="{{ route('form/deleteBill/delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="bill_id">
                            <h3 class="delete_class">Are you sure want to delete this Bill?</h3>
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
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            

            $('#deleteForm').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#delete_asset').modal('hide');
                        $('tr[data-id="' + $('#bill_id').val() + '"]').remove();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $(document).on('click', '.billDelete', function() {
                var billId = $(this).data('id');
                $('#bill_id').val(billId);
            });
        });
    </script>
@endsection
