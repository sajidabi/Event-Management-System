
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - EventEase</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f5fa;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #17233d;
            color: white;
            position: fixed;
            padding: 25px 18px;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
            color: #a78bfa;
            margin-bottom: 35px;
        }

        .sidebar a {
            display: block;
            color: #dce2f0;
            text-decoration: none;
            padding: 13px 15px;
            margin-bottom: 8px;
            border-radius: 7px;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #7655d9;
            color: white;
        }

        .main-content {
            margin-left: 250px;
            padding: 25px 30px;
        }

        .topbar {
            background: white;
            padding: 18px 25px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .topbar h3 {
            color: #17233d;
        }

        .welcome {
            background: linear-gradient(120deg, #7655d9, #9b79ed);
            color: white;
            padding: 35px;
            border-radius: 12px;
            margin-bottom: 30px;
        }

        .welcome h2 {
            margin-bottom: 12px;
        }

        .welcome p {
            line-height: 1.6;
        }

        .content-area {
            background: white;
            padding: 25px;
            border-radius: 10px;
            min-height: 350px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .logout-btn {
            width: 100%;
            background: #dc3545;
            color: white !important;
            border: none;
            cursor: pointer;
            padding: 12px;
            border-radius: 7px;
            font-size: 15px;
        }

        @media(max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">

        <div class="logo">EventEase</div>

        <a href="{{ route('customer.dashboard') }}" class="active">
            Dashboard
        </a>

        <a href="#">
            Browse Services
        </a>

        <a href="#">
            My Bookings
        </a>

        <a href="#">
            My Reviews
        </a>

        <a href="#">
            My Profile
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                Logout
            </button>
        </form>

    </div>

    <div class="main-content">

        <div class="topbar">
            <h3>Customer Dashboard</h3>

            <span>
                Welcome, {{ Auth::user()->name }}
            </span>
        </div>

        <div class="welcome">
            <h2>Welcome to EventEase!</h2>
            <p>
                Plan your special events with ease.
                Explore services, compare packages and book
                trusted vendors for your memorable occasions.
            </p>
        </div>

        <div class="content-area">
            @yield('content')
        </div>

    </div>

</body>
</html>
