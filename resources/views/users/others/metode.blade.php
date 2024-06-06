@extends('users.layouts.userMaster')
@section('content')

<title>Metode Pembayaran</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ URL::to('assets/css/metode.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="card-title bold-text">TUNAI</h2>
            </div>
        </div>
        <div class="bayar-tunai">
            <div class="chat">
                <i class="fab fa-whatsapp whatsapp-icon"></i>
                <p1>Bu Lorem Ipsum</p1>
                <p>0812-3456-789</p>
            </div>
            <div class="chat">
                <i class="fab fa-whatsapp whatsapp-icon"></i>
                <p1>Pak Dolor sit Amet</p1>
                <p>0896-2435-050</p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h2 class="card-title bold-text">TRANSFER</h2>
            </div>
        </div>
        <div class="accordion">
            <input type="radio" name="accordion" id="item-1">
            <label for="item-1" class="accordion-item item-1">
                <div class="accordion-head">
                    <i class="fa fa-credit-card accordion-icon" aria-hidden="true"></i>
                    <h3 class="accordion-title">Bank Mandiri</h3>
                </div>
                <div class="accordion-body">
                    <p class="accordion-text">60320099124</p>
                </div>
            </label>
        </div>

        <div class="accordion">
            <input type="radio" name="accordion" id="item-2">
            <label for="item-2" class="accordion-item item-2">
                <div class="accordion-head">
                    <i class="fa fa-credit-card accordion-icon" aria-hidden="true"></i>
                    <h3 class="accordion-title">Bank BCA</h3>
                </div>
                <div class="accordion-body">
                    <p class="accordion-text">9876543210</p>
                </div>
            </label>
        </div>

        <div class="accordion">
            <input type="radio" name="accordion" id="item-3">
            <label for="item-3" class="accordion-item item-3">
                <div class="accordion-head">
                    <i class="fa fa-credit-card accordion-icon" aria-hidden="true"></i>
                    <h3 class="accordion-title">Bank BNI</h3>
                </div>
                <div class="accordion-body">
                    <p class="accordion-text">1234509876</p>
                </div>
            </label>
        </div>

        <div class="row">
            <div class="col">
                <br><h2 class="card-title bold-text">E-WALLET</h2>
            </div>
        </div>
        <div class="accordion">
            <input type="radio" name="accordion" id="item-4">
            <label for="item-4" class="accordion-item item-4">
                <div class="accordion-head">
                    <i class="fa-regular fa-money-bill-1 accordion-icon" aria-hidden="true"></i>
                    <h3 class="accordion-title">OVO</h3>
                </div>
                <div class="accordion-body">
                    <p class="accordion-text">0812-3456-7890</p>
                </div>
            </label>
        </div>

        <div class="accordion">
            <input type="radio" name="accordion" id="item-5">
            <label for="item-5" class="accordion-item item-5">
                <div class="accordion-head">
                    <i class="fa-regular fa-money-bill-1 accordion-icon" aria-hidden="true"></i>
                    <h3 class="accordion-title">GOPAY</h3>
                </div>
                <div class="accordion-body">
                    <p class="accordion-text">0812-7890-3456</p>
                </div>
            </label>
        </div>
    </div>
</body>
@endsection
