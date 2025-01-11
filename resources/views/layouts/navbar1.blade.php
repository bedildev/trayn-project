<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAYN</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
        }

        /* Navbar Styles */
        .navbar {
            background: linear-gradient(to right, #1e88e5, #1565c0);
            color: #fff;
            padding: 10px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .navbar .logo {
            font-size: 1.8rem;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .navbar nav {
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.3s ease;
        }

        .navbar .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .navbar .nav-links li {
            display: inline;
        }

        .navbar .nav-links a {
            text-decoration: none;
            color: #fff;
            font-size: 1rem;
            padding: 5px 10px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .navbar .nav-links a:hover {
            background-color: #ffcc00;
            color: #1e88e5;
        }

        /* Auth Buttons */
        .navbar .auth-buttons {
            display: flex;
            gap: 10px;
        }

        .navbar .auth-buttons .btn {
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 0.9rem;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar .auth-buttons .btn-login {
            background-color: transparent;
            border: 2px solid #fff;
            color: #fff;
        }

        .navbar .auth-buttons .btn-login:hover {
            background-color: #fff;
            color: #1e88e5;
        }

        .navbar .auth-buttons .btn-signup {
            background-color: #ffcc00;
            color: #1e88e5;
        }

        .navbar .auth-buttons .btn-signup:hover {
            background-color: #ffc107;
            color: #1e88e5;
        }

        /* Menu Toggle Button (For Mobile) */
        .navbar .menu-toggle {
            display: none;
            font-size: 1.8rem;
            color: #fff;
            background: none;
            border: none;
            cursor: pointer;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar nav {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                position: absolute;
                top: 60px;
                left: 0;
                background: #1e88e5;
                width: 100%;
                padding: 20px;
                opacity: 0;
                transform: translateY(-20px);
                transition: all 0.3s ease;
                visibility: hidden;
            }

            .navbar nav.active {
                opacity: 1;
                transform: translateY(0);
                visibility: visible;
            }

            .navbar .menu-toggle {
                display: block;
            }

            .navbar .auth-buttons {
                display: none;
            }

            .navbar .nav-links {
                gap: 15px;
                width: 100%;
                text-align: left;
            }

            .navbar .nav-links li {
                width: 100%;
            }

            .navbar .nav-links a {
                padding: 10px 20px;
                display: block;
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .navbar .logo {
                font-size: 1.4rem;
            }

            .navbar .menu-toggle {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <header class="navbar">
        <div class="container">
            <h1 class="logo">TRAYN</h1>
            <nav>
                <ul class="nav-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <a href="{{ url('login') }}" class="btn btn-login">Login</a>
                <a href="{{ url('register') }}" class="btn btn-signup">Register</a>
            </div>
            <button class="menu-toggle" onclick="toggleMenu()">☰</button>
        </div>
    </header>

    <script>
        function toggleMenu() {
            const nav = document.querySelector('.navbar nav');
            nav.classList.toggle('active');
            document.body.style.overflow = nav.classList.contains('active') ? 'hidden' : 'auto';
        }
    </script>

</body>
</html>
