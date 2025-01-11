@extends('layout')

@section('content')
<div class="container mt-5">
    <h3>Your cart is empty</h3>
    <p>It looks like your cart is empty. Please add some items to your cart before proceeding to checkout.</p>
    <a href="{{ url('/produk') }}" class="btn btn-primary">Continue Shopping</a>
</div>
@endsection
