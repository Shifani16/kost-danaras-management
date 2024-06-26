@extends('users.layouts.userMaster')
@section('content')
    <title>Data Tagihan</title>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header mt-5">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Data tagihan</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button id="printButton" class="btn btn-primary float-right">Print</button>
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
                                        @foreach ($payments as $payment)
                                            <tr>
                                                <td>{{ $payment->bill_id }}</td>
                                                <td>{{ $payment->occ_id }}</td>
                                                <td>{{ $payment->name }}</td>
                                                <td>{{ $payment->created_at->format('Y-m-d') }}</td>
                                                <td>{{ $payment->due_date }}</td>
                                                <td>{{ $payment->jml_tagihan }}</td>
                                                <td class="text-right">
                                                    <span
                                                        class="{{ $payment->status == 'Belum Bayar' ? 'badge bg-warning-light' : 'badge bg-success-light' }}">
                                                        {{ $payment->status }}
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
    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            window.open('{{ route('payment-print') }}', '_blank');
        });
    </script>
@endsection
