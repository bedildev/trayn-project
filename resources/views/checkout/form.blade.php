@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Form Pembayaran</h2>
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="city">Kota</label>
            <input type="text" name="city" id="city" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="zipcode">Kode Pos</label>
            <input type="text" name="zipcode" id="zipcode" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Pembayaran</button>
    </form>
</div>
@endsection
