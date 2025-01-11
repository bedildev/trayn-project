@extends('layout')

@section('content')
<div class="container mt-5">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @foreach(session('cart', []) as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="d-flex align-items-center">
                            <div class="col-sm-3 hidden-xs">
                                <img src="{{ asset('img/'.$details['photo']) }}" alt="Product Image" width="100" height="100" class="img-responsive"/>
                            </div>
                            <div class="col-sm-9">
                                <h5 class="mb-1">{{ $details['product_name'] }}</h5>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">{{ $details['quantity'] }}</td>
                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <form action="{{ route('checkout.index') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit">Proceed to Checkout</button>
                    </form>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
