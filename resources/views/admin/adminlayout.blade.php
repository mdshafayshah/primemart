<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/adminstyle.css') }}">
</head>

<body>

    <div class="admin-wrapper">

        <!-- Sidebar -->

        <div class="sidebar">
            <h3 class="logo">Prime Admin</h3>

                                     <div class="topbar">
                <button id="toggleBtn" class="btn btn-sm btn-dark">
                    <i class="fa fa-bars"></i>
                </button>

            </div>

            <ul>
                <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>
                <li><a href="{{route('product')}}"><i class="fa fa-box"></i> Products</a></li>
                <li><a href="{{route('categories')}}"><i class="fa fa-list"></i> Categories</a></li>
                <li><a href="{{route('orders')}}"><i class="fa fa-shopping-cart"></i> Orders</a></li>
            </ul>
        </div>

        <!-- Main -->
        <div class="main">

            <!-- Top Navbar -->
            <div class="topbar">
                <h4>Dashboard</h4>
                <div class="user">
                    <i class="fa fa-user-circle"></i> Admin
                </div>
            </div>

            <!-- Content -->
            <div class="content">
                @yield('content')
            </div>

        </div>

    </div>

</body>
<script>
    document.getElementById('toggleBtn').onclick = function () {
        document.querySelector('.sidebar').classList.toggle('hide');
    }
</script>

</html>