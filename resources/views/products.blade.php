@include('layouts.navbar')
@extends('layout')


@section('content')
<div class="row product-container">
    @foreach($products as $product)
        <div class="col-xs-12 col-sm-6 col-md-4 product-card">
            <div class="product-item">
                <img src="{{ asset('img') }}/{{ $product->photo }}" class="product-image img-fluid" alt="{{ $product->product_name }}">
                <div class="product-info">
                    <h4 class="product-name">{{ $product->product_name }}</h4>
                    <p class="product-description">{{ $product->product_description }}</p>
                    <p class="product-price"><strong>Harga </strong> Rp.{{ $product->price }}</p>
                    <a href="{{ route('produk.add_to_cart', $product->id) }}" class="btn btn-primary add-to-cart-btn">Tambahkan ke Keranjang</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<br>
<br>
<br>
@endsection

@section('styles')
<style>
/* General Styling for Body */
body {
    background-color: #f3f4f6; /* Lighter background for a more refined look */
    font-family: 'Arial', sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
}


.product-container {
    display: flex;
    flex-wrap: wrap;
    gap: 30px; 
    justify-content: space-between;
    margin-top: 50px;
    padding: 0 20px; 
}

/* Individual Product Card */
.product-card {
    max-width: 30%;
    margin-bottom: 40px; 
    margin-right: 20px; 
    margin-left: 20px;  
    border-radius: 15px;
    background-color: #ffffff; 
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1); /* More pronounced shadow */
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease, background-color 0.3s ease;
    padding: 25px;
    overflow: hidden; /* To ensure the hover effects stay within bounds */
    position: relative;
}

/* Hover effect on card */
.product-card:hover {
    transform: translateY(-20px);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
    background-color: #ecf0f1; /* Subtle background change on hover */
}

/* Product Image Styling */
.product-image {
    width: 100%;
    height: 200px; /* Adjusted image height for better visibility */
    object-fit: cover;
    border-radius: 10px; /* Slightly reduced border radius */
    transition: transform 0.4s ease-in-out, opacity 0.3s ease;
}

/* Hover effect on image */
.product-card:hover .product-image {
    transform: scale(1.1);
    opacity: 0.9; /* Fading effect for the image on hover */
}

/* Product Info Styling */
.product-info {
    padding-top: 15px; /* Padding on top of the text */
    padding-bottom: 15px; /* Padding for bottom */
    background-color: #fff;
    border-radius: 10px;
    box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.05);
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding-left: 10px;
    padding-right: 10px;
}

.product-name {
    font-size: 20px;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 12px;
    text-transform: capitalize; /* Title case for product names */
    transition: color 0.3s ease;
}

.product-name:hover {
    color: #3498db; /* Blue hover effect */
}

.product-description {
    font-size: 15px;
    color: #7f8c8d;
    margin-bottom: 15px;
    line-height: 1.6;
    height: 60px;
    overflow: hidden;
}

.product-price {
    font-size: 18px;
    font-weight: bold;
    color: #27ae60; /* Fresh green color for price */
    margin-bottom: 20px;
}

/* Button Styling */
.add-to-cart-btn {
    font-size: 14px;
    padding: 14px 22px;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-radius: 25px;
    background-color: #3498db;
    border: none;
    width: 100%;
    transition: background-color 0.3s ease, transform 0.3s ease;
    font-weight: bold;
    color: white;
}

.add-to-cart-btn:hover {
    background-color: #2980b9; /* Darker blue */
    transform: scale(1.05); /* Slightly enlarged button on hover */
}

/* Responsiveness for Smaller Screens */
@media (max-width: 768px) {
    .product-card {
        max-width: 48%;
        margin-bottom: 30px;
    }

    .product-image {
        height: 220px;
    }

    .product-name {
        font-size: 18px;
    }

    .product-description {
        font-size: 14px;
    }

    .product-price {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .product-card {
        max-width: 100%;
        margin-bottom: 20px;
    }

    .product-image {
        height: 200px;
    }

    .product-name {
        font-size: 18px;
    }

    .product-description {
        font-size: 13px;
    }

    .product-price {
        font-size: 15px;
    }
}
</style>
@endsection
