<!-- resources/views/contact/index.blade.php -->

<div class="container">
    <h1 class="text-center">Pesan Kontak</h1>

    <!-- Button Kembali -->
    <a href="{{ url()->previous() }}" class="btn btn-back">Kembali</a>

    <!-- Button Buat Pesan -->
    <a href="{{ route('contact.create') }}" class="btn btn-create">Buat Pesan</a>

    <table class="table mt-4">
        <thead>
            <tr class="table-header">
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
                <tr class="table-row">
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->message }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('contact.edit', $message->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('contact.destroy', $message->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
     body {
        background-color: #f0f4f8;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    h1 {
        color: #1e88e5;
        font-weight: bold;
        font-size: 2.5rem;
        margin-bottom: 30px;
        text-align: center;
    }

    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 30px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Tombol Edit */
.btn-edit {
    background: linear-gradient(to right, #ffb74d, #f57c00); /* Gradien kuning ke oranye */
    color: white;
    box-shadow: 0 3px 5px rgba(255, 183, 77, 0.3);
    padding: 6px 12px; /* Padding lebih kecil */
    text-align: center; /* Menyelaraskan teks di tengah */
}

.btn-edit:hover {
    background: linear-gradient(to right, #f57c00, #e65100); /* Gradien oranye lebih gelap */
    transform: scale(1.05);
}
    /* Tombol Hapus */
    .btn-delete {
        background: linear-gradient(to right, #ef5350, #d32f2f); /* Gradien merah */
        color: white;
        box-shadow: 0 3px 5px rgba(239, 83, 80, 0.3);
        padding: 8px 16px;
    }

    .btn-delete:hover {
        background: linear-gradient(to right, #d32f2f, #b71c1c); /* Gradien merah lebih gelap */
        transform: scale(1.05);
    }

    .btn {
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
        display: inline-block;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        padding: 8px 16px; /* Lebar tombol lebih kecil */
    }

    /* Button Styles */
    .btn-create {
        background: linear-gradient(to right, #42a5f5, #1e88e5);
        color: white;
        margin-bottom: 20px;
        box-shadow: 0 4px 6px rgba(66, 165, 245, 0.3);
    }

    .btn-create:hover {
        background: linear-gradient(to right, #1e88e5, #1565c0);
        transform: scale(1.05);
    }

    .btn-back {
        background: linear-gradient(to right, #8bc34a, #388e3c);
        color: white;
        margin-right: 10px;
        margin-bottom: 20px;
        box-shadow: 0 4px 6px rgba(139, 195, 74, 0.3);
    }

    .btn-back:hover {
        background: linear-gradient(to right, #388e3c, #8bc34a);
        transform: scale(1.05);
    }

    /* Table Styles */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .table-header {
        background: linear-gradient(to right, #42a5f5, #1e88e5);
        color: white;
        text-align: center;
        font-size: 1rem;
        letter-spacing: 0.5px;
    }

    .table-row {
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    .table-row:hover {
        background-color: #f4f6f8;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .table th, .table td {
        padding: 15px;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .container {
            padding: 20px;
        }

        .btn-create, .btn-back {
            padding: 6px 16px;
            font-size: 0.9rem;
        }

        .table {
            font-size: 0.9rem;
        }

        .action-buttons {
            flex-direction: column;
            gap: 10px;
            padding: 6px 16px;
        }
    }

    @media (max-width: 768px) {
        .table {
            display: block;
            overflow-x: auto;
            width: 100%;
        }

        .btn-create, .btn-back {
            font-size: 0.9rem;
            padding: 8px 12px;
        }

        .btn {
            font-size: 0.9rem;
        }

        .action-buttons {
            flex-direction: column;
            gap: 10px;
        }
    }

    @media (max-width: 480px) {
        h1 {
            font-size: 1.8rem;
        }

        .table {
            font-size: 0.8rem;
        }

        .btn-create, .btn-back {
            font-size: 0.8rem;
            padding: 6px 10px;
        }

        .btn {
            font-size: 0.8rem;
        }

        .action-buttons {
            gap: 5px;
        }
    }
</style>

