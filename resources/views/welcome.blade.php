<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Manajemen Inventaris</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to bottom,rgb(20, 5, 54),rgb(0, 0, 0)); /* Gradasi oranye ke biru dongker */
            color: #f1f1f1;
            min-height: 100vh;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
        }

        .logo-container {
            background-color: rgb(255, 255, 255); /* Kotak putih transparan */
            padding: 5px 10px;
            border-radius: 12px;
            backdrop-filter: blur(4px);
        }

        .logo {
            height: 60px;
        }

        .navbar {
            display: flex;
            gap: 12px;
        }

        .navbar a {
            text-decoration: none;
            padding: 10px 20px;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .navbar a.login {
            background: #fff;
            color: #112749;
            border: 2px solid #ff7e5f;
        }

        .navbar a.login:hover {
            background: #062852;
            color: #fff;
        }

        .navbar a.register {
            background: #2193b0;
            color: #fff;
            border: 2px solidrgb(227, 107, 37);
        }

        .navbar a.register:hover {
            background: #176b85;
        }

        .header {
            text-align: center;
            padding: 40px 20px 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 42px;
            font-weight: 700;
            color: white;
        }

        .header p {
            font-size: 18px;
            margin-top: 12px;
            color: white;
        }

        .content {
            max-width: 750px;
            margin: 30px auto 60px;
            padding: 40px 30px;
            background-color: rgba(0, 0, 0, 0.4); /* Hitam transparan */
            border: 1.5px solid white;
            border-radius: 16px;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
            text-align: center;
            color: white;
        }

        .content h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .btn-dashboard {
            display: inline-block;
            margin-top: 30px;
            padding: 14px 32px;
            background: linear-gradient(to right,rgb(241, 88, 12),rgb(255, 107, 16));
            color: white;
            font-weight: 600;
            font-size: 16px;
            border-radius: 10px;
            text-decoration: none;
        }

        .btn-dashboard:hover {
            opacity: 0.9;
        }

        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #ccc;
        }

        @media (max-width: 600px) {
            .top-bar {
                flex-direction: column;
                align-items: center;
                gap: 10px;
                padding: 20px;
            }

            .header h1 {
                font-size: 28px;
            }

            .content {
                margin: 20px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Top Bar with Logo & Navbar -->
    <div class="top-bar">
        <div class="logo-container">
            <img src="{{ asset('forpic.img/logocm.png') }}" alt="Logo CM" class="logo">
        </div>
        <div class="navbar">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="login">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="login">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="register">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <!-- Header -->
    <div class="header">
        <h1>SISTEM MANAJEMEN INVENTARIS</h1>
        <p>Kelola stok barang, kategori, dan transaksi masuk/keluar dengan mudah.</p>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Selamat Datang!</h2>
        <p>Sistem ini membantu Anda mengatur dan memantau barang secara real-time. Cocok digunakan untuk gudang, toko, atau keperluan internal.</p>
        <a href="{{ route('dashboard') }}" class="btn-dashboard">Masuk ke Dashboard</a>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; {{ date('Y') }} Sistem Manajemen Inventaris - All Rights Reserved.
    </div>

</body>
</html>
