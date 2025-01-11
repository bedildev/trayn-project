<!-- resources/views/checkout.blade.php -->
@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Checkout</h2>
    <form action="{{ route('pembayaran.session') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <h4>Shipping Information</h4>
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Shipping Address</label>
                    <textarea name="address" id="address" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <h4>Order Summary</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                                <tr>
                                    <td>{{ $details['product_name'] }}</td>
                                    <td>${{ $details['price'] }}</td>
                                    <td>{{ $details['quantity'] }}</td>
                                    <td>${{ $details['price'] * $details['quantity'] }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <h3><strong>Total: ${{ $total }}</strong></h3>
            </div>
        </div>

        <button class="btn btn-primary" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Proceed to Payment</button>
    </form>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        // You can add more client-side validation here if necessary
    });
</script>
@endsection
