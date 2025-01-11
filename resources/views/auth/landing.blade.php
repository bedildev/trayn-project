<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAYN - Selamat Datang</title>

    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            color: #333;
            line-height: 1.6;
            background: #f0f4f8;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Navbar */
        .navbar {
            background: #007bff;
            color: #fff;
            padding: 15px 20px;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .navbar .logo {
            font-size: 1.8rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            list-style: none;
            flex-wrap: wrap;
        }

        .nav-links li {
            margin: 0 15px;
        }

        .nav-links a {
            text-decoration: none;
            color: #fff;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #ffcc00;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(to right, #007bff, #00bfff);
            color: #fff;
            text-align: center;
            padding: 60px 20px;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .hero h1 span {
            color: #ffcc00;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .hero .btn {
            background: #ffcc00;
            color: #333;
            padding: 12px 25px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .hero .btn:hover {
            background: #ff9900;
        }

        /* Contact Button */
        .contact-btn {
            background: linear-gradient(to right, #ff6600, #ffcc00);
            color: #333;
            padding: 12px 25px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1rem;
            margin-top: 20px;
            transition: background 0.3s ease;
        }

        .contact-btn:hover {
            background: linear-gradient(to right, #ffcc00, #ff6600);
        }

        /* Products Section */
        .products {
            padding: 60px 20px;
            text-align: center;
        }

        .products h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #007bff;
        }

        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .product-card {
            background: #f4f4f4;
            border-radius: 10px;
            padding: 20px;
            width: 90%;
            max-width: 300px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .product-card h3 {
            margin-bottom: 10px;
        }

        .product-card p {
            font-size: 1.1rem;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
        }

        .product-card .btn {
            background: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .product-card .btn:hover {
            background: #0056b3;
        }

        /* Footer */
        .footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .product-grid {
                flex-direction: column;
                align-items: center;
            }

            .contact form input,
            .contact form textarea {
                width: 90%;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 1.8rem;
            }

            .hero p {
                font-size: 0.9rem;
            }

            .product-card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.navbar1')

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <h1>Toko Terbaik <span>TRAYN</span></h1>
            <p>Toko Online Terbaik Sepanjang Masa.</p>
            <a href="{{ url('login') }}"><button class="btn">Belanja Sekarang</button></a>
            <!-- Button to go to Contact CRUD -->
            <a href="{{ url('contact') }}"><button class="contact-btn">Hubungi Kami</button></a>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products">
        <div class="container">
            <h2>Produk Trending</h2>
            <div class="product-grid">
                <div class="product-card">
                    <img src="{{asset('img/foto11.png')}}" alt="Product 1">
                    <h3>TRAYN KAOS</h3>
                    <p>20.000.00</p>
                    <a href="{{ url('login') }}" style="color: #333"><button class="btn">Tambahkan Ke Keranjang</button></a>
                </div>
                <div class="product-card">
                    <img src="{{asset('img/foto12.png')}}" alt="Product 2">
                    <h3>Sepatu Nike Merah</h3>
                    <p>120.000.00</p>
                    <a href="{{ url('login') }}" style="color: #333"><button class="btn">Tambahkan Ke Keranjang</button></a>
                </div>
                <div class="product-card">
                    <img src="{{asset('img/foto4.png')}}" alt="Product 3">
                    <h3>Hoodie Putih</h3>
                    <p>50.000.00</p>
                    <a href="{{ url('login') }}" style="color: #333"><button class="btn">Tambahkan Ke Keranjang</button></a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <h2>About Us</h2>
            <p>Selamat datang di TRAYN Shop, destinasi fashion terbaik Anda! Kami hadir untuk memberikan Anda pengalaman belanja yang luar biasa dengan koleksi produk fashion berkualitas tinggi, desain modern, dan harga yang terjangkau.</p>
        </div>
    </section>
    <br>
    <br>
    <!-- Footer -->
    @include('layouts.footer1')

    <script>
        // Scroll to a specific section
        function scrollToSection(id) {
            const section = document.getElementById(id);
            if (section) {
                section.scrollIntoView({ behavior: 'smooth' });
            }
        }

        // Contact form submission
        document.getElementById('contact-form').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Thank you for reaching out! We will get back to you soon.');
            this.reset();
        });
    </script>
</body>
</html>
