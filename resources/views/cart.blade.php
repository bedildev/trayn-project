@include('layouts.navbar')
@extends('layout')

@section('content')
<div class="container mt-5">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Produk</th>
                <th style="width:10%">Harga</th>
                <th style="width:8%">Banyak</th>
                <th style="width:22%" class="text-center">Total</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if(session('cart') && count(session('cart')) > 0)
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="d-flex align-items-center">
                                <div class="col-sm-3 hidden-xs">
                                    <img src="{{ asset('img') }}/{{ $details['photo'] }}" alt="Product Image" width="100" height="100" class="img-responsive"/>
                                </div>
                                <div class="col-sm-9">
                                    <h5 class="mb-1">{{ $details['product_name'] }}</h5>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">Rp. {{ $details['price'] }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">Rp. {{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Hapus</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">
                        <h4>Keranjang Anda Kosong</h4>
                        <a href="{{ url('/produk') }}" class="btn btn-primary">Lanjutkan Belanja</a>
                    </td>
                </tr>
            @endif
        </tbody>
        <tfoot>
            @if(session('cart') && count(session('cart')) > 0)
                <tr>
                    <td colspan="5" class="text-right"><h3><strong>Total Rp. {{ $total }}</strong></h3></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">
                        <form action="{{ route('checkout.index') }}" method="GET">
                            @csrf
                            <a href="{{ url('/produk') }}" class="btn btn-secondary mr-3"> <i class="fa fa-arrow-left"></i> Lanjutkan Belanja</a>
                            <button class="btn btn-primary" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Bayar</button>
                        </form>
                    </td>
                </tr>
            @else
                <tr>
                    <td colspan="5" class="text-right">
                        <button class="btn btn-primary" disabled><i class="fa fa-money"></i> Bayar</button>
                    </td>
                </tr>
            @endif
        </tfoot>
    </table>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        // Update cart quantity
        $(".cart_update").change(function (e) {
            e.preventDefault();
            let ele = $(this);

            $.ajax({
                url: '{{ route('produk.update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id"), 
                    quantity: ele.val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        // Remove cart item
        $(".cart_remove").click(function (e) {
            e.preventDefault();
            let ele = $(this);

            if(confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('produk.remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection
