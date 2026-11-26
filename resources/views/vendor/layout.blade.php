
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - EventEase</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f6fa;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #17233d;
            position: fixed;
            left: 0;
            top: 0;
            padding: 25px 15px;
            color: white;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
            color: #a78bfa;
            margin-bottom: 35px;
            text-align: center;
        }

        .sidebar a {
            display: block;
            padding: 13px 15px;
            margin-bottom: 8px;
            color: #dce2f0;
            text-decoration: none;
            border-radius: 7px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #7655d9;
            color: white;
        }

        .main {
            margin-left: 250px;
            padding: 25px 30px;
        }

        .topbar {
            background: white;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .content {
            padding: 5px;
        }

        .logout-btn {
            background: #ef4444;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            cursor: pointer;
        }

        @media(max-width: 768px) {
            .sidebar {
                width: 180px;
            }

            .main {
                margin-left: 180px;
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">

        <div class="logo">EventEase</div>

        <a href="{{ route('vendor.dashboard') }}" class="active">
            Dashboard
        </a>

        <a href="{{ route('vendor.profile.edit') }}">My Profile</a>
        <a href="{{ route('vendor.services.index') }}">My Services</a>
        <a href="{{ route('vendor.packages.index') }}">Packages</a>
        <a href="{{ route('vendor.bookings.index') }}">Booking Requests</a>
        <a href="#">My Gallery</a>
        <a href="#">Reviews</a>
        <a href="#">Availability</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                Logout
            </button>
        </form>

    </div>

    <div class="main">

        <div class="topbar">
            <h2>@yield('page-heading')</h2>

            <span>Welcome, {{ Auth::user()->name }}</span>
        </div>

        <div class="content">
            @yield('content')
        </div>

    </div>

</body>
</html>
