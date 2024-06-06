@extends('layouts.master');
@section('content')
    <title>Add Bill</title>
    <div class="page-wrapper">
        <div class="content mt-5">
            <div class="row mt-5">
                <div class="col-sm-12">
                    <h4 class="page-title">Create Bill</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{ route('form/saveBill/save') }}" method="POST">
                        @csrf
                        <div class="row mt-5">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Name</label>
                                    <select class="form-control" id="occupant-select" name="name">
                                        <option value="">Select Occupant</option>
                                        @foreach ($occupants as $occupant)
                                            <option value="{{ $occupant->name }}" data-name="{{ $occupant->occ_id }}">
                                                {{ $occupant->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Occupant ID</label>
                                    <input class="form-control" type="text" id="occupant-name" name="occ_id" readonly />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <select class="form-control" id="sel3" name="jml_tagihan">\
                                        <option>Select Amount</option>
                                        <option>Rp. 2.000.000</option>
                                        <option>Rp. 2.100.000</option>
                                        <option>Rp. 2.200.000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>From date <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text" name="from_date"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Due Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text" name="due_date"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="sel3" name="status">\
                                        <option>Status</option>
                                        <option>Belum Bayar</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Other Information</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary buttonedit">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script>
        document.getElementById('occupant-select').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const name = selectedOption.getAttribute('data-name');
            document.getElementById('occupant-name').value = name;
        });
    </script>
@endsection
@endsection