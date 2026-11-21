
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - EventEase</title>
</head>
<body>

    <h1>Admin Dashboard</h1>
    <p>Welcome to EventEase Admin Panel</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>
