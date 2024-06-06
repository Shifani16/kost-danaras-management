@extends('layouts.master')
@section('content')
    <title>Pembayaran Lunas</title>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-5">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Riwayat Pembayaran Lunas</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ route('payment/print') }}" target="_blank" class="btn btn-primary float-right veiwbutton">Print</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped">
                                    <thead>
                                        <tr>
                                            <th>Payment Number</th>
                                            <th>Occupant ID</th>
                                            <th>Name</th>
                                            <th>Created Date</th>
                                            <th>Due Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
    </div>
@endsection
