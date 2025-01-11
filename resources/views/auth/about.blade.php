<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'About Us')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f1f1;
            font-family: 'Ubuntu', sans-serif;
        }

        .about-us {
            padding: 40px 20px;
        }

        .image img {
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
        }

        .content {
            max-width: 600px;
        }

        .content h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #000;
        }

        .content h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #000;
        }

        .content h2 span {
            color: #1e88e5;
            font-weight: bold;
        }

        .content p {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 20px;
            color: #000;
        }

        .btn {
            background-color: #1e88e5;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .btn:hover {
            background-color: #c2185b;
        }

        #about {
            margin-bottom: 100px; /* Jarak tambahan antara tabel dan footer */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- About Us Section -->
    <section class="about-us">
        <div class="container">
            <div class="row align-items-center">
                <!-- Image Section -->
                <div class="col-12 col-lg-6 text-center mb-4 mb-lg-0">
                    <div class="image">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo TRAYN Shop">
                    </div>
                </div>
                <!-- Content Section -->
                <div class="col-12 col-lg-6">
                    <div class="content">
                        <h1>About Us</h1>
                        <h2>TRAYN <span>& SHOP</span></h2>
                        <p>
                            Selamat datang di TRAYN Shop, destinasi fashion terbaik Anda! Kami hadir untuk memberikan Anda pengalaman belanja yang luar biasa dengan koleksi produk fashion berkualitas tinggi, desain modern, dan harga yang terjangkau.
                        </p>
                        <p>
                            Di TRAYN Shop, kami percaya bahwa setiap orang layak tampil stylish tanpa harus menguras dompet. Oleh karena itu, kami menyediakan berbagai macam pilihan pakaian, aksesori, dan produk gaya hidup yang dirancang untuk memenuhi kebutuhan dan selera semua pelanggan kami.
                        </p>
                        <p>
                            Komitmen kami adalah memberikan pelayanan terbaik, kualitas produk yang terjamin, dan desain yang selalu mengikuti tren terkini. Baik Anda mencari pakaian kasual, busana formal, atau aksesori untuk melengkapi penampilan Anda, TRAYN Shop adalah tempat yang tepat.
                        </p>
                        <a href="#about"><button class="btn" style="background-color: #1e88e5; color: white">Let's Talk</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5 mb-5" id="about">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Daftar Pertanyaan</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Buat Pertanyaan</button>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Topik</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($abouts as $about)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $about->title }}</td>
                    <td>{{ $about->description }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $about->id }}">Edit</button>
                        <form action="{{ route('auth.about.destroy', $about->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('auth.about') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Pertanyaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Topik</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" id="description" rows="4" placeholder="Enter description" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Edit Modal (Loop for Each Item) -->
    @foreach ($abouts as $about)
    <div class="modal fade" id="editModal-{{ $about->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $about->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('auth.about.update', $about->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel-{{ $about->id }}">Edit Pertanyaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title-{{ $about->id }}" class="form-label">Judul</label>
                            <input type="text" name="title" class="form-control" id="title-{{ $about->id }}" value="{{ $about->title }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description-{{ $about->id }}" class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" id="description-{{ $about->id }}" rows="4" required>{{ $about->description }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    
    <!-- Footer -->
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
