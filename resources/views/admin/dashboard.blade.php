@extends('admin.admin_layout')

@section('page-title', 'Dashboard')

@section('content')
<div class="dashboard-container">
    <!-- Welcome Section -->
    <div class="welcome-section">
        <div class="welcome-text">
            <h2>Welcome back, Admin! 👋</h2>
            <p>Here's what's happening with your store today.</p>
        </div>
        <div class="date-time">
            <i class="fa fa-calendar"></i>
            <span id="currentDateTime"></span>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon purple">
                <i class="fa fa-shopping-bag"></i>
            </div>
            <div class="stat-info">
                <h3>Total Products</h3>
                <div class="stat-value">1,234</div>
                <div class="stat-change positive">
                    <i class="fa fa-arrow-up"></i> +12.5%
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon blue">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="stat-info">
                <h3>Total Orders</h3>
                <div class="stat-value">856</div>
                <div class="stat-change positive">
                    <i class="fa fa-arrow-up"></i> +8.2%
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon green">
                <i class="fa fa-dollar"></i>
            </div>
            <div class="stat-info">
                <h3>Total Revenue</h3>
                <div class="stat-value">$45,678</div>
                <div class="stat-change positive">
                    <i class="fa fa-arrow-up"></i> +23.1%
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon orange">
                <i class="fa fa-users"></i>
            </div>
            <div class="stat-info">
                <h3>Total Customers</h3>
                <div class="stat-value">3,456</div>
                <div class="stat-change negative">
                    <i class="fa fa-arrow-down"></i> -2.3%
                </div>
            </div>
        </div>
    </div>

    <!-- Charts & Activity Section -->
    <div class="charts-row">
        <!-- Sales Chart -->
        <div class="chart-card">
            <div class="card-header">
                <h3><i class="fa fa-line-chart"></i> Sales Overview</h3>
                <select class="chart-select">
                    <option>This Week</option>
                    <option>This Month</option>
                    <option>This Year</option>
                </select>
            </div>
            <div class="card-body">
                <canvas id="salesChart"></canvas>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="activity-card">
            <div class="card-header">
                <h3><i class="fa fa-bell"></i> Recent Activity</h3>
                <a href="#" class="view-all">View All</a>
            </div>
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-icon blue-bg">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="activity-details">
                        <p><strong>New order #12345</strong> placed by John Doe</p>
                        <span class="time">2 minutes ago</span>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon green-bg">
                        <i class="fa fa-box"></i>
                    </div>
                    <div class="activity-details">
                        <p><strong>Product "iPhone 15"</strong> added to inventory</p>
                        <span class="time">1 hour ago</span>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon red-bg">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="activity-details">
                        <p><strong>New customer</strong> Sarah Johnson registered</p>
                        <span class="time">3 hours ago</span>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon yellow-bg">
                        <i class="fa fa-tag"></i>
                    </div>
                    <div class="activity-details">
                        <p><strong>Summer Sale</strong> discount code created</p>
                        <span class="time">5 hours ago</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders Table -->
    <div class="orders-table-card">
        <div class="card-header">
            <h3><i class="fa fa-truck"></i> Recent Orders</h3>
            <a href="{{ url('/admin/all-orders') }}" class="view-all">View All Orders →</a>
        </div>
        <div class="table-responsive">
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#ORD-001</td>
                        <td>John Doe</td>
                        <td>iPhone 15 Pro</td>
                        <td>$999.00</td>
                        <td><span class="status delivered">Delivered</span></td>
                        <td>2024-01-15</td>
                        <td><button class="action-btn view-btn"><i class="fa fa-eye"></i></button></td>
                    </tr>
                    <tr>
                        <td>#ORD-002</td>
                        <td>Jane Smith</td>
                        <td>Samsung Galaxy S24</td>
                        <td>$899.00</td>
                        <td><span class="status processing">Processing</span></td>
                        <td>2024-01-14</td>
                        <td><button class="action-btn view-btn"><i class="fa fa-eye"></i></button></td>
                    </tr>
                    <tr>
                        <td>#ORD-003</td>
                        <td>Mike Johnson</td>
                        <td>Sony Headphones</td>
                        <td>$199.00</td>
                        <td><span class="status shipped">Shipped</span></td>
                        <td>2024-01-14</td>
                        <td><button class="action-btn view-btn"><i class="fa fa-eye"></i></button></td>
                    </tr>
                    <tr>
                        <td>#ORD-004</td>
                        <td>Emily Davis</td>
                        <td>MacBook Pro</td>
                        <td>$1999.00</td>
                        <td><span class="status pending">Pending</span></td>
                        <td>2024-01-13</td>
                        <td><button class="action-btn view-btn"><i class="fa fa-eye"></i></button></td>
                    </tr>
                    <tr>
                        <td>#ORD-005</td>
                        <td>Chris Wilson</td>
                        <td>Apple Watch</td>
                        <td>$399.00</td>
                        <td><span class="status delivered">Delivered</span></td>
                        <td>2024-01-13</td>
                        <td><button class="action-btn view-btn"><i class="fa fa-eye"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Current Date & Time
    function updateDateTime() {
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
        document.getElementById('currentDateTime').innerHTML = now.toLocaleDateString('en-US', options);
    }
    updateDateTime();
    setInterval(updateDateTime, 1000);

    // Sales Chart
    const ctx = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Sales ($)',
                data: [1200, 1900, 1500, 2100, 2800, 3200, 4100],
                borderColor: '#667eea',
                backgroundColor: 'rgba(102, 126, 234, 0.1)',
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#667eea',
                pointBorderColor: '#fff',
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>
@endpush