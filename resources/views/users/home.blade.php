@extends('users.layouts.userMaster')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12 mt-5">
                    <h3 class="page-title mt-3">Dashboard</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-sm-6 col-12">
                <div class="card board1 fill">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <div>
                                <h4 class="card_widget_header">{{ $billsPaid }}</h4>
                                <h6 class="text-muted">Pembayaran Lunas</h6><i data-feather="check-circle" class="text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 col-12">
                <div class="card board1 fill">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <div>
                                <h4 class="card_widget_header">{{ $billsUnpaid }}</h4>
                                <h6 class="text-muted">Pembayaran Belum Lunas</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12 mt-5">
                    <h3 class="page-title mt-3">User Information</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-sm-6 col-12">
                <div class="card board1 fill">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <div>
                                <h4 class="card_widget_header">{{ $name }}</h4>
                                <h6 class="text-muted">Name</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 col-12">
                <div class="card board1 fill">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <div>
                                <h4 class="card_widget_header">{{ $email }}</h4>
                                <h6 class="text-muted">Email</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 col-12">
                <div class="card board1 fill">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <div>
                                <h4 class="card_widget_header">{{ $created_at }}</h4>
                                <h6 class="text-muted">Joined On</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 col-12">
                <div class="card board1 fill">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <div>
                                <h4 class="card_widget_header">{{ $status }}</h4>
                                <h6 class="text-muted">Payment Status</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection