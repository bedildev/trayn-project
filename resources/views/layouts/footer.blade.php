<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer TRAYN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        /* Footer Styling */
        .footer {
            background: linear-gradient(135deg, #1e88e5, #1565c0);
            color: white;
            padding: 50px 20px;
            font-family: 'Arial', sans-serif;
        }

        .footer-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
            position: relative;
        }

        .footer-title::after {
            content: '';
            display: block;
            width: 50px;
            height: 2px;
            background: white;
            margin-top: 10px;
        }

        .footer-links,
        .footer-contact {
            list-style: none;
            padding: 0;
        }

        .footer-links a,
        .footer-contact a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover,
        .footer-contact a:hover {
            color: #ffcc00;
        }

        .footer-contact i {
            margin-right: 10px;
            color: #ffcc00;
        }

        .footer-social {
            text-align: center;
            margin-top: 30px;
        }

        .social-icon {
            color: white;
            font-size: 24px;
            margin: 0 10px;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .social-icon:hover {
            transform: scale(1.2);
            color: #ffcc00;
        }

        .footer-copyright {
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 15px;
            margin-top: 20px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .footer {
                text-align: center;
            }

            .footer-title {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Tentang Kami -->
                <div class="col-md-4">
                    <h5 class="footer-title">TENTANG KAMI</h5>
                    <p>TRAYN adalah platform belanja online terbaik yang memberikan pengalaman belanja yang aman, nyaman, dan inovatif. Kami berkomitmen untuk menjadi mitra belanja terpercaya Anda.</p>
                </div>
                <!-- Menu -->
                <div class="col-md-4">
                    <h5 class="footer-title">MENU</h5>
                    <ul class="footer-links">
                        <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ url('about') }}">About Us</a></li>
                        <li><a href="/produk">Shopping</a></li>
                        <li><a href="/cart">Keranjang</a></li>
                    </ul>
                </div>
                <!-- Kontak Kami -->
                <div class="col-md-4">
                    <h5 class="footer-title">KONTAK KAMI</h5>
                    <ul class="footer-contact">
                        <li><i class="bi bi-envelope"></i> <a href="mailto:trayn@gmail.com">trayn@gmail.com</a></li>
                        <li><i class="bi bi-telephone"></i> +62 811 44 665</li>
                        <li><i class="bi bi-geo-alt"></i> Jl. Dukuh Kuning 232</li>
                    </ul>
                </div>
            </div>
            <!-- Social Media -->
            <div class="footer-social">
                <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
                <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
            </div>
            <!-- Copyright -->
            <div class="footer-copyright">
                &copy; 2025 TRAYN. All Rights Reserved.
            </div>
        </div>
    </footer>
</body>
</html>
