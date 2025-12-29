<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Laundry</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6fb;
        }

        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 850px;
            display: flex;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .left {
            width: 50%;
            padding: 40px;
        }

        .left h2 {
            margin-bottom: 5px;
        }

        .left p {
            margin-top: 0;
            font-size: 13px;
            color: gray;
        }

        .btn-login {
            width: 100%;
            background: #333;
            border: none;
            padding: 14px;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .right {
            width: 50%;
            background: url("{{ asset('images/login-laundry.jpg') }}")
            center / cover no-repeat;
            position: relative;
        }

        .overlay {
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.45);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
            color: white;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="login-card">

        <!-- LEFT -->
        <div class="left">
            <h2>WELCOME TO NIWASA LAUNDRY!</h2>
            <p>Silakan login sebagai kasir untuk melanjutkan</p>

            <!-- LOGIN KASIR SAJA -->
            <a href="{{ route('login.kasir') }}" class="btn-login">
                Login Kasir
            </a>
        </div>

        <!-- RIGHT -->
        <div class="right">
            <div class="overlay">
                <div>
                    <h3>"CUCIAN Harga Terjangkau"</h3>
                    <p>Percayakan cucianmu pada kami</p>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
