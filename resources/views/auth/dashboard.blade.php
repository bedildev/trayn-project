<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Ubuntu', sans-serif;
}

a{
    text-decoration: none;
    color: #000;
}

img{
    object-fit: cover;
}

body{
    background-color: #f1f1f1;
}

nav{
    padding: 0 80px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 80px;
}

nav a.logo{
    font-size: 33px;
    color: #0f2182;
    font-weight: 600;
}

nav .links a:not(:last-child){
    margin-right: 20px;
}

nav .login button{
    padding: 8px 14px;
    border: none;
    cursor: pointer;
    background-color: transparent;
}

nav .login button.signup{
    background-color: #000;
    color: #fff;
    border-radius: 4px;
    margin-right: 14px;
}

header{
    padding: 0 80px;
    height: calc(100vh - 80px);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

header .left{
    width: 700px;
}

header .left h1{
    font-size: 80px;
}

header .left h1 span{
    color: #1e88e5;
}

header .left p{
    margin: 40px 0;
    color: #777;
}

header .left a{
    display: flex;
    align-items: center;
    background: #000;
    width: 200px;
    padding: 8px;
    border-radius: 60px;
    text-decoration: none;
}

header .left a i{
    background-color: #fff;
    font-size: 24px;
    border-radius: 50%;
    padding: 8px;
}

header .left a span{
    color: #fff;
    margin-left: 10px;
}

header img{
    width: 600px;
}

h2.separator{
    padding: 0 80px;
    font-size: 40px;
    margin-top: 40px;
}

.sell-nft{
    padding: 0 80px;
    margin: 50px 0 80px;
    display: flex;
    justify-content: space-between;
    gap: 30px;
}

.sell-nft .item,
.nft-shop .nft-list .item{
    padding: 20px;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.sell-nft .item:hover,
.nft-shop .nft-list .item:hover,
.sellers .item:hover{
    box-shadow: none;
}

.sell-nft .item .header{
    display: flex;
    align-items: center;
    gap: 10px;
}

.sell-nft .item .header i{
    font-size: 40px;
}

.sell-nft .item .header h5{
    font-size: 17px;
}

.sell-nft .item p{
    margin-top: 10px;
    padding: 0 4px;
}

.nft-shop{
    padding: 0 80px;
    margin-top: 30px;
}

.nft-shop .category{
    display: flex;
    gap: 14px;
    
}

.nft-shop .category a{
    background-color: #dfdcdc;
    padding: 8px 14px;
    font-size: 15px;
    border-radius: 14px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.nft-shop .category a:hover{
    color: #fff;
    background-color: #1e88e5;
}

.nft-shop .nft-list{
    padding: 40px 0;
    display: flex;
    justify-content: space-between;
    gap: 20px;
}

.nft-shop .nft-list .item img{
    width: 280px;
    height: 280px;
    border-radius: 18px;
}

.nft-shop .nft-list .item .info{
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid #edecec;
}

.nft-shop .nft-list .item .info h5{
    font-size: 18px;
}

.nft-shop .nft-list .item .info .btc{
    margin-top: 10px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.nft-shop .nft-list .item .btc i{
    font-size: 22px;
    color: #1e88e5;
}

.nft-shop .nft-list .item .btc p{
    font-size: 12px;
    color: #1e88e5;
}

.nft-shop .nft-list .item .info > p{
    font-size: 12px;
    color: #989898;
}

.nft-shop .nft-list .item .bid{
    padding: 14px 0 4px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.nft-shop .nft-list .item .bid p,
.nft-shop .nft-list .item .bid a{
    background-color: #edecec;
    padding: 6px 10px;
    font-size: 13px;
    border-radius: 10px;
}

.nft-shop .nft-list .item .bid a{
    color: #1e88e5;
    background: transparent;
    font-weight: bold;
    transition: all 0.3s ease;
}

.nft-shop .nft-list .item .bid a:hover{
    color: #fff;
    background-color: #000;
}

.view-more{
    margin: 10px 0 40px;
    display: flex;
    justify-content: center;
}

.view-more button{
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    background: #dfdcdc;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.view-more button:hover{
    color: #fff;
    background: #1e88e5;
}

.sellers{
    padding: 0 80px;
    margin: 40px 0 80px;
    display: flex;
    gap: 30px;
}

.sellers .item{
    background: #fff;
    display: flex;
    align-items: center;
    width: 25%;
    gap: 14px;
    padding: 14px;
    border-radius: 18px;
    cursor: pointer;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.sellers .item img{
    width: 64px;
}

.sellers .item .info p{
    font-size: 14px;
    margin-top: 8px;
}

footer{
    background-color: #000;
    color: #fff;
    padding: 100px 80px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

footer h3{
    font-size: 48px;
}

footer .right{
    width: 80%;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 26px;
}

footer .right .links{
    display: flex;
    gap: 30px;
}

footer .right .links a{
    color: #989898;
    transition: color 0.3s ease;
}

footer .right .links a:hover{
    color: #fff;
}

footer .right .social{
    display: flex;
    align-items: center;
    gap: 10px;
}

footer .right .social i{
    font-size: 30px;
    cursor: pointer;
    transition: color 0.3s ease;
}

footer .right .social i:hover{
    color: #1e88e5;
}

footer .right p{
    font-size: 13px;
    color: #777;
}

@media screen and (max-width: 1400px) {
    
    nav,
    header,
    h2.separator,
    .sell-nft,
    .nft-shop,
    .sellers{
        padding: 0 40px;
    }

    header .left h1{
        font-size: 60px;
    }

    header img{
        width: 540px;
    }

    .nft-shop .nft-list .item img{
        width: 220px;
        height: 220px;
    }

    footer{
        padding: 100px 40px;
    }

    footer h3{
        font-size: 38px;
    }

}

@media screen and (max-width: 1200px) {
    
    header .left h1{
        font-size: 48px;
    }

    header img{
        width: 480px;
    }

    h2.separator{
        font-size: 34px;
    }

    .sell-nft .item .header i{
        font-size: 36px;
    }

    .sell-nft .item .header h5{
        font-size: 15px;
    }

    .sell-nft .item p{
        font-size: 13px;
    }

    .nft-shop .nft-list{
        flex-wrap: wrap;
        row-gap: 30px;
    }

    .nft-shop .nft-list .item{
        width: 48%;
    }

    .nft-shop .nft-list .item img{
        width: 100%;
        height: auto;
    }

    .sellers{
        flex-wrap: wrap;
    }

    .sellers .item{
        width: 48%;
    }

    footer .links a{
        font-size: 15px;
    }

}

@media screen and (max-width: 992px) {
    
    nav a.logo{
        font-size: 28px;
    }

    nav .links a{
        font-size: 14px;
    }

    header{
        flex-direction: column-reverse;
        height: auto;
        margin-bottom: 60px;
    }

    header .left{
        width: 100%;
    }

    header img{
        width: 100%;
    }

    .sell-nft{
        flex-wrap: wrap;
        gap: 20px;
    }

    .sell-nft .item{
        width: 48%;
    }

    .sellers{
        gap: 20px;
    }

}

@media screen and (max-width: 768px) {
    
    nav,
    header,
    h2.separator,
    .sell-nft,
    .nft-shop,
    .sellers{
        padding: 0 20px;
    }

    nav a.logo{
        display: none;
    }

    nav .links a{
        font-size: 12px;
    }

    nav .login button{
        font-size: 12px;
        padding: 6px 10px;
    }

    header .left h1{
        font-size: 36px;
    }

    header .left p{
        font-size: 14px;
    }

    header .left a{
        padding: 6px;
        width: 160px;
        font-size: 14px;
    }

    header .left a i{
        padding: 6px;
    }

    h2.separator{
        font-size: 30px;
    }

    footer{
        padding: 40px 20px;
    }

}

@media screen and (max-width: 576px) {
    
    header .left h1{
        font-size: 30px;
    }

    .sell-nft .item{
        width: 100%;
    }

    .nft-shop .nft-list .item,
    .sellers .item{
        width: 47%;
    }

    .nft-shop .category a{
        font-size: 13px;
    }

}
    </style>
</head>
<body>
    @include('layouts.navbar')

    <header>
        <div class="left">
            <h1>Selamat Datang <span>TRAYN</span></h1>
            <p>Toko Online TRAYN 
            </p>
            <a href="/produk">
                <i class='bx bx-basket'></i>
                <span>Belanja Sekarang</span>
            </a>
        </div>
        <img src="{{asset('img/logo.png')}}">
    </header>

    <h2 class="separator">
        
    </h2>

    <div class="sell-nft">
        <div class="item">
            <div class="header">
                <i class='bx bx-wallet-alt'></i>
                <h5>TRAYN SHOP</h5>
            </div>
            <p>TRAYN Shop adalah toko yang menawarkan berbagai macam produk fashion berkualitas tinggi dengan desain modern dan elegan.</p>
        </div>
        <div class="item">
            <div class="header">
                <i class='bx bx-cart-alt'></i>
                <h5>Temukan Promo disini!</h5>
            </div>
            <p>TRAYN Shop sering memberikan promo menarik untuk memberikan pengalaman belanja yang lebih menyenangkan dan hemat bagi pelanggan.</p>
        </div>
        <div class="item">
            <div class="header">
                <i class='bx bx-grid-alt'></i>
                <h5>Mengapa Anda Harus Memilih Kami?</h5>
            </div>
            <p>TRAYN Shop hadir sebagai solusi fashion modern yang tidak hanya menawarkan produk berkualitas, tetapi juga memberikan pengalaman belanja terbaik bagi pelanggan.</p>
        </div>
    </div>

    <h2 class="separator">
        Segera Hadir
    </h2>

    <div class="nft-shop">
        <div class="category">
            <a href="/produk">Temukan produk trending disini!</a>
        </div>

        <div class="nft-list">
            <div class="item">
                <img src="{{asset('img/poto1.jpg')}}">
                <div class="info">
                    <div>
                        <h5>Sepatu Putih</h5>
                        <div class="btc">
                            <i class='bx bxl-bitcoin'></i>
                            <p>50.000</p>
                        </div>
                    </div>
                    
                </div>

            </div>
            <div class="item">
                <img src="{{asset('img/poto2.jpg')}}">
                <div class="info">
                    <div>
                        <h5>T-Shirt Hitam</h5>
                        <div class="btc">
                            <i class='bx bxl-bitcoin'></i>
                            <p>120.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{asset('img/poto3.jpg')}}">
                <div class="info">
                    <div>
                        <h5>Celana Casual</h5>
                        <div class="btc">
                            <i class='bx bxl-bitcoin'></i>
                            <p>150.000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="view-more">
       <a href="/produk" style="color: #777"><button>Lihat Selengkapnya</button> </a>
    </div>

    </div>
    <div class="container mt-4">
        @yield('content')
    </div>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>