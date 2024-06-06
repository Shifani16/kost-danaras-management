@extends('layouts.master')

@section('content')
<title>Aturan Kost</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ URL::to('assets/css/aturan.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<body>
    <div class="container">
        <h1>Aturan kost</h1>
        <ul>
            <li><span>1</span>Setiap penghuni wajib menjaga kebersihan dan ketertiban lingkungan kost.</li>
            <li><span>2</span>Dilarang membawa tamu menginap tanpa izin dari pemilik kost.</li>
            <li><span>3</span>Dilarang keras menggunakan narkoba atau minuman keras di lingkungan kost.</li>
            <li><span>4</span>Jam malam berlaku mulai pukul 22.00 WIB. Penghuni diharapkan tidak membuat keributan setelah jam tersebut.</li>
            <li><span>5</span>Penghuni bertanggung jawab atas keamanan barang-barang pribadi masing-masing.</li>
            <li><span>6</span>Pembayaran sewa kost dilakukan paling lambat tanggal 10 setiap bulannya.</li>
            <li><span>7</span>Penghuni yang melanggar peraturan akan dikenakan sanksi sesuai kebijakan pemilik kost.</li>
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@endsection
