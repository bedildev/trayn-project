<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping - TRAYN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* General Body Styling */
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Navbar and Cart Dropdown */
        .dropdown {
            float: right;
        }

        .btn-primary {
            background: linear-gradient(to right, #007bff, #0056b3);
            border: none;
            font-size: 14px;
            padding: 10px 20px;
            border-radius: 30px;
            color: #fff;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #0056b3, #003f8c);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .dropdown-menu {
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            width: 450px;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .dropdown-menu.show {
            transform: translateY(0);
            opacity: 1;
        }

        .total-header-section {
            border-bottom: 2px solid #e0e0e0;
            margin-bottom: 20px;
            padding-bottom: 15px;
        }

        .cart-detail {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px 0;
        }

        .cart-detail-img {
            padding-right: 15px; /* Space between image and text */
        }

        .cart-detail-img img {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .cart-detail-product {
            flex-grow: 1; /* Allows text to use available space */
        }

        .cart-detail-product p {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .price {
            font-size: 16px;
            color: #28a745;
            font-weight: bold;
        }

        .count {
            font-size: 14px;
            color: #666;
        }

        .checkout .btn-primary {
            border-radius: 20px;
            padding: 12px 20px;
            font-size: 16px;
            width: auto;
            margin-top: 15px;
        }

        .badge {
            font-size: 14px;
            font-weight: bold;
            background: linear-gradient(to right, #ff6a00, #ff4500);
            box-shadow: 0 4px 8px rgba(255, 102, 0, 0.3);
        }

        /* Alert Success Styling */
        .alert-success {
            font-size: 14px;
            border-radius: 5px;
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            margin-bottom: 20px;
        }

        /* Customizations for Mobile Responsiveness */
        @media (max-width: 768px) {
            .dropdown-menu {
                width: 100%;
            }

            .cart-detail-img img {
                width: 60px;
                height: 60px;
            }

            .btn-primary {
                padding: 8px 16px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Cart Dropdown -->
        <div class="row">
            <div class="col-12">
                <div class="dropdown">
                    <button id="dLabel" type="button" class="btn btn-primary" data-bs-toggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Keranjang <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dLabel">
                        <div class="row total-header-section">
                            @php $total = 0 @endphp
                            @foreach((array) session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                            @endforeach
                            <div class="col-12 text-right">
                                <p>Total: <span class="text-success">Rp. {{ $total }}</span></p>
                            </div>
                        </div>

                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <div class="row cart-detail">
                                    <div class="col-4 cart-detail-img">
                                        <img src="{{ asset('img') }}/{{ $details['photo'] }}" alt="Product Image">
                                    </div>
                                    <div class="col-8 cart-detail-product">
                                        <p>{{ $details['product_name'] }}</p>
                                        <span class="price">Rp. {{ $details['price'] }}</span> 
                                        <span class="count">Banyak : {{ $details['quantity'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="row">
                            <div class="col-12 text-center checkout">
                                <a href="{{ route('produk.cart') }}" class="btn btn-primary">Lihat semua</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Dynamic Content -->
        <div class="container">
            @yield('content')
        </div>
    </div>

    @yield('scripts')
</body>
</html>
