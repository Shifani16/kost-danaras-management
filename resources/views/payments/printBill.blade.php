<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Print</title>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }

        .table-container {
            margin-top: 50px;
        }

        h4 {
            padding-top: 5%
        }

        /* Adjust table size for A4 portrait */
        @page {
            size: A4 portrait;
        }

        /* Set table width to 100% of page */
        table {
            width: 100%;
        }

        /* Reduce font size to fit table content */
        td, th {
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-center"><strong>Laporan Tagihan Belum Lunas</strong></h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row print-date no-print">
            <div class="col">
                Printed at: <span id="printDate"></span>
            </div>
        </div>

        <div class="row table-container">
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

    <script>
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
