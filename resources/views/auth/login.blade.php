<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAYN-STORE-Login-Form</title>
    <!-- Link Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        
        body {
            font-family: 'Comic Neue', cursive;
            background: linear-gradient(135deg, #4fc3f7, #1e88e5); /* Gradasi biru cerah */
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #ffffff; /* Warna kotak putih cerah */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            font-family: 'Poppins', sans-serif;
            color: #1e88e5; /* Biru cerah */
            margin-bottom: 20px;
            font-size: 32px;
            font-weight: 700;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: 600;
            color: #1e88e5;
            font-size: 14px;
        }

        input {
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #1e88e5;
            border-radius: 10px;
            background: #f4f6f9;
            color: #333;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
        }

        input::placeholder {
            color: #9e9e9e; /* Placeholder abu */
        }

        input:focus {
            outline: none;
            border-color: #4fc3f7; /* Warna fokus biru cerah */
        }

        button {
            background: #1e88e5;
            color: #ffffff;
            padding: 12px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-family: 'Comic Neue', cursive;
            font-weight: bold;
            transition: background 0.3s ease-in-out;
        }

        button:hover {
            background: #4fc3f7;
        }

        .error-messages {
            background: #e57373;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 10px;
            font-size: 14px;
            color: #ffffff;
        }

        .error-messages ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .error-messages li {
            color: #ffffff;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: #1e88e5;
            font-size: 12px;
        }

        footer a {
            color: #1e88e5;
            text-decoration: none;
            font-family: 'Comic Neue', cursive;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="name">Username:</label>
            <input type="name" name="name" placeholder="Enter your Username" required>

            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Enter your password" required>

            <button type="submit">Login</button>
        </form>
        <footer>
            Don't have an account? <a href="/register">Register here</a>
        </footer>
    </div>
</body>
</html>
