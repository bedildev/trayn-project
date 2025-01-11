<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="{{ url('dashboard') }}">TRAYN</a>
        
        <!-- Tombol Toggler untuk layar kecil -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Menu Navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Menu sebelah kiri -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/produk">Shopping</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart">Keranjang</a>
                </li>
    
            </ul>
            
            <!-- Menu sebelah kanan -->
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <span class="navbar-text me-4 text-nowrap"> 
                        Selamat Datang, {{ Auth::user()->name }}
                    </span>
                </li>
                <li class="nav-item">
                    <!-- Menambahkan margin kanan untuk menggeser ke kiri -->
                    <form action="/logout" method="POST" class="d-inline me-2">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" style="margin-left: 1rem;">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
