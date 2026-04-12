<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Mart - Admin Panel</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/adminstyle.css') }}">
</head>
<body>

<div class="admin-container">
    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <!-- Toggle Button Inside Sidebar -->
        <div class="sidebar-header">
            <div class="logo-area">
                <i class="fa fa-shopping-cart"></i>
                <span class="logo-text">Prime Mart</span>
            </div>
            <button class="toggle-btn" id="toggleSidebar">
                <i class="fa fa-angle-left" id="toggleIcon"></i>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="sidebar-nav">
            <ul>
                <li class="active">
                    <a href="{{ url('/admin/dashboard') }}">
                        <i class="fa fa-tachometer"></i>
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                
                <li class="has-dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle">
                        <i class="fa fa-box"></i>
                        <span class="nav-label">Products</span>
                        <i class="fa fa-chevron-down arrow"></i>
                    </a>
                    <ul class="dropdown-menu-nav">
                        <li><a href="{{ url('/admin/allproducts') }}"><i class="fa fa-list"></i> All Products</a></li>
                        <li><a href="{{ url('/admin/createproducts') }}"><i class="fa fa-plus"></i> Create Product</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="{{ url('/admin/categories') }}">
                        <i class="fa fa-tags"></i>
                        <span class="nav-label">Categories</span>
                    </a>
                </li>
                
                <li class="has-dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="nav-label">Orders</span>
                        <i class="fa fa-chevron-down arrow"></i>
                    </a>
                    <ul class="dropdown-menu-nav">
                        <li><a href="{{ url('/admin/activeorders') }}"><i class="fa fa-clock-o"></i> Active Orders</a></li>
                        <li><a href="{{ url('/admin/allorders') }}"><i class="fa fa-history"></i> All Orders</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="{{ url('/admin/settings') }}">
                        <i class="fa fa-cog"></i>
                        <span class="nav-label">Settings</span>
                    </a>
                </li>
                
                <li class="logout">
                    <a href="{{ url('/logout') }}">
                        <i class="fa fa-sign-out"></i>
                        <span class="nav-label">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="page-title">
                <h2>@yield('page-title', 'Dashboard')</h2>
            </div>
            <div class="admin-profile">
                <div class="dropdown">
                    <button class="profile-btn dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-user-circle"></i>
                        <span>Hello Admin</span>
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="content-area">
            @yield('content')
        </div>
    </main>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // Sidebar Toggle
        $('#toggleSidebar').on('click', function() {
            $('#sidebar').toggleClass('collapsed');
            
            var icon = $('#toggleIcon');
            if ($('#sidebar').hasClass('collapsed')) {
                icon.removeClass('fa-angle-left').addClass('fa-angle-right');
            } else {
                icon.removeClass('fa-angle-right').addClass('fa-angle-left');
            }
            
            localStorage.setItem('sidebarCollapsed', $('#sidebar').hasClass('collapsed'));
        });
        
        // Load saved state
        if (localStorage.getItem('sidebarCollapsed') === 'true') {
            $('#sidebar').addClass('collapsed');
            $('#toggleIcon').removeClass('fa-angle-left').addClass('fa-angle-right');
        }
        
        // Dropdown Toggle
        $('.dropdown-toggle').on('click', function(e) {
            e.preventDefault();
            var parent = $(this).closest('.has-dropdown');
            parent.toggleClass('open');
            $('.has-dropdown').not(parent).removeClass('open');
        });
        
        // Active link highlight
        var currentUrl = window.location.href;
        $('.sidebar-nav ul li a').each(function() {
            if ($(this).attr('href') && currentUrl.indexOf($(this).attr('href')) !== -1) {
                $(this).closest('li').addClass('active').parents('.has-dropdown').addClass('open');
            }
        });
    });
</script>

@stack('scripts')
</body>
</html>