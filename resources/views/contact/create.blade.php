<!-- resources/views/contact/create.blade.php -->


<div class="container">
    <h1 class="text-center" style="color: #1e88e5; font-family: 'Arial', sans-serif; font-weight: bold; font-size: 2.5rem; margin-bottom: 30px;">Buat Pesan Kontak</h1>
    
    <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">Pesan</label>
            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-submit">Kirim Pesan</button>
        
    </form>
</div>

<!-- Custom CSS for styling -->
<style>
    body {
        background-color: #f0f4f8;
        font-family: 'Arial', sans-serif;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 30px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #1e88e5;
        font-size: 2.5rem;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 1.1rem;
        color: #333;
        margin-bottom: 5px;
        display: block;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #1e88e5;
        outline: none;
    }

    .btn-submit {
        background: linear-gradient(to right, #1e88e5, #1565c0);
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-block;
        margin-top: 15px;
    }

    .btn-submit:hover {
        background: linear-gradient(to right, #1565c0, #1e88e5);
        transform: scale(1.05);
    }

    .btn-submit:active {
        transform: scale(1);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 20px;
        }

        h1 {
            font-size: 2rem;
        }

        .form-group input,
        .form-group textarea {
            font-size: 0.9rem;
        }

        .btn-submit {
            width: 100%;
            padding: 12px 20px;
        }
    }
</style>
