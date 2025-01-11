@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Informasi Pembayaran</h2>
    <p><strong>Nama Lengkap:</strong> {{ session('billing.name') }}</p>
    <p><strong>Alamat:</strong> {{ session('billing.address') }}</p>
    <p><strong>Kota:</strong> {{ session('billing.city') }}</p>
    <p><strong>Kode Pos:</strong> {{ session('billing.zipcode') }}</p>
    <p><strong>Email:</strong> {{ session('billing.email') }}</p>

    <h3>Barang Belanja:</h3>
    <table class="table">
        @foreach(session('cart') as $item)
            <tr>
                <td>{{ $item['product_name'] }}</td>
                <td>Rp. {{ $item['price'] }}</td>
                <td>Banyak: {{ $item['quantity'] }}</td>
            </tr>
        @endforeach
    </table>

    <form action="{{ route('checkout.payment.process') }}" method="POST">
        @csrf
        
    </form>
</div>
@endsection
