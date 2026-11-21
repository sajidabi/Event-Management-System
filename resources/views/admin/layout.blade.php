
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - EventEase</title>

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
            overflow-y: auto;
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

        .menu-heading {
            color: #929db4;
            font-size: 12px;
            margin: 22px 15px 10px;
            text-transform: uppercase;
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

        .content-area {
            background: white;
            padding: 25px;
            border-radius: 10px;
            min-height: 400px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .logout-btn {
            width: 100%;
            background: #dc3545;
            color: white;
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

        <div class="logo">EventEase Admin</div>

        <p class="menu-heading">Main Menu</p>

        <a href="{{ route('admin.dashboard') }}" class="active">
            Dashboard
        </a>

        <p class="menu-heading">Management</p>

        <a href="#">Manage Users</a>
        <a href="#">Manage Vendors</a>
        <a href="#">Categories</a>
        <a href="#">Services</a>
        <a href="#">Bookings</a>
        <a href="#">Reviews</a>

        <p class="menu-heading">Other</p>

        <a href="#">Reports</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                Logout
            </button>
        </form>

    </div>

    <div class="main-content">

        <div class="topbar">
            <h3>Admin Dashboard</h3>

            <span>
                Welcome, {{ Auth::user()->name }}
            </span>
        </div>

        <div class="content-area">
            @yield('content')
        </div>

    </div>

</body>
</html>
