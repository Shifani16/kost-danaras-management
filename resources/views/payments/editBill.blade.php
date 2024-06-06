@extends('layouts.master')
@section('content')
    <title>Edit Bill</title>

    <div class="page-wrapper">
        <div class="content mt-5">
            <div class="row mt-5">
                <div class="col-sm-12">
                    <h4 class="page-title">Edit Bill</h4>
                </div>
                <br>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('form/bill/update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row formtype">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bill ID</label>
                                    <input class="form-control" type="text" value="{{ $billEdit->bill_id }}" name="bill_id" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Occupant ID</label>
                                    <input class="form-control" type="text" value="{{ $billEdit->occ_id }}" name="occ_id" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" value="{{ $billEdit->name }}" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <select class="form-control" id="sel3" name="jml_tagihan">
                                        <option value="Rp. 2.000.000" {{ $billEdit->jml_tagihan == 'Rp. 2.000.000' ? 'selected' : '' }}>Rp. 2.000.000</option>
                                        <option value="Rp. 2.100.000" {{ $billEdit->jml_tagihan == 'Rp. 2.100.000' ? 'selected' : '' }}>Rp. 2.100.000</option>
                                        <option value="Rp. 2.200.000" {{ $billEdit->jml_tagihan == 'Rp. 2.200.000' ? 'selected' : '' }}>Rp. 2.200.000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>From Date</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" value="{{ $billEdit->from_date }}" name="from_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Due Date</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" value="{{ $billEdit->due_date }}" name="due_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="sel3" name="status">
                                        <option value="Belum Bayar" {{ $billEdit->status == 'Belum Bayar' ? 'selected' : '' }}>Belum Bayar</option>
                                        <option value="Lunas" {{ $billEdit->status == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Other Information</label>
                                    <textarea class="form-control" name="info" rows="3">{{ $billEdit->info }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 mt-3 text-right">
                                <button type="submit" class="btn btn-primary buttonedit1">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
