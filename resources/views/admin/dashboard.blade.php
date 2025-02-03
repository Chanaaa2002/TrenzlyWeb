@extends('layouts.frontend')

@section('pages')

<style>
    :root {
        --primary-color: #365772; /* Deep Orange */
        --secondary-color: #1E293B; /* Dark Blue */
        --highlight-color: #FF9800; /* Bright Orange */
        --bg-color: #FAFAFA; /* Light Gray */
        --text-color: #374151; /* Gray */
    }

    /* Sidebar */
    .dashboard-sidebar {
        width: 240px;
        height: 100vh;
        background: var(--primary-color);
        color: white;
        position: absolute;
        padding: 20px;
        transition: all 0.3s ease-in-out;
    }
    .dashboard-sidebar:hover {
        width: 250px;
    }
    .sidebar-item {
        display: flex;
        align-items: center;
        padding: 12px;
        margin: 10px 0;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        font-size: 16px;
    }
    .sidebar-item:hover {
        background: var(--highlight-color);
        transform: scale(1.05);
    }
    .sidebar-item i {
        margin-right: 10px;
    }

    /* Dashboard Content */
    .dashboard-content {
        margin-left: 240px;
        padding: 30px;
        background: var(--bg-color);
        min-height: 100vh;
        transition: all 0.3s ease-in-out;
    }

    /* Summary Cards */
    .summary-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 18px;
    }
    .summary-card:hover {
        transform: scale(1.03);
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
    }
    .summary-card i {
        font-size: 36px;
        color: var(--primary-color);
    }

    /* Animation */
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- Sidebar -->
<div class="dashboard-sidebar">
    <h2 class="mb-6 text-xl font-bold text-white">Trenzly Admin</h2>

    <div class="sidebar-item" onclick="window.location='{{ route('admin.dashboard') }}'">
        <i class="fa-solid fa-chart-line"></i> Dashboard
    </div>

    <div class="sidebar-item" onclick="window.location='{{ route('admin.categories.index') }}'">
        <i class="fa-solid fa-list"></i> Categories
    </div>

    <div class="sidebar-item" onclick="window.location='{{ route('admin.products.index') }}'">
        <i class="fa-solid fa-box"></i> Products
    </div>
    
    {{-- <div class="sidebar-item" onclick="window.location='{{ route('admin.orders.index') }}'">
        <i class="fa-solid fa-shopping-cart"></i> Orders
    </div>

    <div class="sidebar-item" onclick="window.location='{{ route('admin.users.index') }}'">
        <i class="fa-solid fa-users"></i> Users
    </div>

    <div class="sidebar-item" onclick="window.location='{{ route('admin.settings') }}'">
        <i class="fa-solid fa-cog"></i> Settings
    </div> --}}

    <div class="sidebar-item" onclick="document.getElementById('logoutForm').submit();">
        <i class="fa-solid fa-sign-out-alt"></i> Logout
    </div>
</div>

<!-- Logout Form -->
<form id="logoutForm" method="POST" action="{{ route('logout') }}" class="hidden">
    @csrf
</form>


<!-- Main Dashboard Content -->
<div class="dashboard-content fade-in">
    <div class="flex items-center justify-between breadcrumb-bar background-blue">
        <h2 class="text-3xl font-bold text-gray-900">ADMIN DASHBOARD</h2>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-gray-700 hover:underline"
                onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Sign out') }} <i class="ml-1 fa-solid fa-arrow-right-from-bracket"></i>
            </button>
        </form>
    </div>

    <div class="grid grid-cols-4 gap-6 mt-8">
        {{-- <div class="summary-card">
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Categories</h3>
                <p class="text-3xl font-bold text-orange-500">{{ $categoriesCount }}</p>
            </div>
            <i class="fa-solid fa-list"></i>
        </div> --}}
        {{-- <div class="summary-card">
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Products</h3>
                <p class="text-3xl font-bold text-orange-500">{{ $productsCount }}</p>
            </div>
            <i class="fa-solid fa-box"></i>
        </div> --}}
        {{-- <div class="summary-card">
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Orders</h3>
                <p class="text-3xl font-bold text-orange-500">{{ $ordersCount }}</p>
            </div>
            <i class="fa-solid fa-shopping-cart"></i>
        </div>
        <div class="summary-card">
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Users</h3>
                <p class="text-3xl font-bold text-orange-500">{{ $usersCount }}</p>
            </div>
            <i class="fa-solid fa-users"></i>
        </div> --}}
    </div>
</div>

<script>
    function loadPage(page) {
        alert("Loading " + page + "...");
    }
</script>

@endsection
