<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kasir</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .navbar {
            background: #00a65a;
            padding: 12px 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar {
            width: 230px;
            background: #222d32;
            color: white;
            height: 100vh;
            position: fixed;
        }

        .sidebar .user-panel {
            padding: 15px;
            border-bottom: 1px solid #444;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 12px 20px;
        }

        .sidebar ul li:hover {
            background: #1e282c;
            cursor: pointer;
        }

        .content {
            margin-left: 230px;
            padding: 20px;
        }

        .alert {
            background: #00a65a;
            color: white;
            padding: 10px;
            border-radius: 4px;
        }

        .card {
            background: white;
            margin-top: 20px;
            border-radius: 5px;
            overflow: hidden;
        }

        .card-header {
            background: #dd4b39;
            color: white;
            padding: 10px;
        }

        .card-body {
            padding: 15px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .box {
            width: 200px;
            color: white;
            padding: 15px;
            border-radius: 4px;
        }

        .green { background: #00a65a; }
        .blue { background: #00c0ef; }
        .orange { background: #f39c12; }
        .red { background: #dd4b39; }
        .navy { background: #0073b7; }

        a {
            color: white;
            text-decoration: none;
        }
        .profile-page {
    padding: 0;
}

/* HERO SECTION */
.company-hero {
    height: 400px;
    background: url("{{ asset('images/login-laundry.jpg') }}") center / cover no-repeat;
    position: relative;
    border-radius: 6px;
    overflow: hidden;
}

.company-hero .overlay {
    background: rgba(0, 0, 0, 0.6);
    height: 100%;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 20px;
}

.company-hero h1 {
    font-size: 42px;
    margin-bottom: 10px;
    letter-spacing: 2px;
}

.company-hero p {
    font-size: 18px;
    max-width: 700px;
}

/* PROFILE CONTENT */
.company-profile {
    background: white;
    margin-top: 30px;
    padding: 30px;
    border-radius: 6px;
    line-height: 1.7;
}

.company-profile h2 {
    margin-bottom: 15px;
    color: #00a65a;
}

.company-profile h3 {
    margin-top: 20px;
    color: #333;
}

.company-profile ul {
    margin-top: 10px;
    padding-left: 20px;
}

.company-profile ul li {
    margin-bottom: 8px;
}

    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <b>NIWASA LAUNDRY</b>
    <div>
        {{ $user->name }} |
        <a href="{{ route('logout') }}">Logout</a>
    </div>
</div>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="user-panel">
        <b>{{ $user->name }}</b><br>
        <small style="color: #00ff99">● ON</small>
    </div>

    <ul>
<li>
    <a href="{{ route('kasir.dashboard') }}">Dashboard</a>
</li>
<li>
    <a href="{{ route('kasir.transaksi') }}">Transaksi Penjualan</a>
</li>


        <li><a href="{{ route('laporan.penjualan') }}">
        Laporan Penjualan
</a></li>

       
        <li>
        <a href="{{ route('pelanggan.index') }}">Data Pelanggan</a>
        </li>
    </ul>
</div>

<!-- CONTENT -->
<div class="content profile-page">

    <div class="company-hero">
        <div class="overlay">
            <h1>NIWASA LAUNDRY</h1>
            <p>
                Solusi Laundry Cepat, Bersih, dan Terpercaya<br>
                Melayani dengan sepenuh hati untuk kepuasan pelanggan
            </p>
        </div>
    </div>

    <div class="company-profile">
        <h2>Tentang Kami</h2>
        <p>
            <b>Niwasa Laundry</b> adalah usaha jasa laundry yang berfokus pada kualitas,
            ketepatan waktu, dan kebersihan. Kami melayani pencucian pakaian harian,
            selimut, sprei, jaket, dengan harga terjangkau.
        </p>

    </div>

</div>


</body>
</html>
