@extends('layouts.frontend')

@section('pages')

<!-- Custom Styles -->
<style>
    :root {
        --primary-color: #FF5722; /* Trenzly Orange */
        --secondary-color: #1F2937; /* Dark Gray */
        --accent-color: #FFC107; /* Yellow */
        --bg-color: #F8FAFC; /* Light Gray */
        --text-color: #374151; /* Gray */
    }

    /* Sidebar */
    .dashboard-sidebar {
        width: 250px;
        height: 100vh;
        background: var(--primary-color);
        color: white;
        position: absolute;
        padding: 20px;
        transition: width 0.3s ease-in-out;
    }
    .dashboard-sidebar:hover {
        width: 270px;
    }
    .sidebar-item {
        display: flex;
        align-items: center;
        padding: 12px;
        margin: 8px 0;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }
    .sidebar-item:hover {
        background: var(--accent-color);
        transform: scale(1.05);
    }
    .sidebar-item i {
        margin-right: 12px;
    }

    /* Main Dashboard */
    .dashboard-content {
        margin-left: 250px;
        padding: 30px;
        background: var(--bg-color);
        min-height: 100vh;
        transition: all 0.3s ease-in-out;
    }

    /* Animated Summary Cards */
    .summary-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        position: relative;
        overflow: hidden;
    }
    .summary-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.15);
    }
    .summary-card::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 4px;
        bottom: 0;
        left: 0;
        background: var(--primary-color);
        transition: width 0.3s ease-in-out;
    }
    .summary-card:hover::after {
        width: 80%;
    }

    /* Page Transitions */
    .fade-in {
        animation: fadeIn 0.6s ease-in-out;
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
    <div class="sidebar-item" onclick="loadPage('dashboard')">
        <i class="fa-solid fa-chart-line"></i> Dashboard
    </div>
    <div class="sidebar-item" onclick="loadPage('categories')">
        <i class="fa-solid fa-list"></i> Categories
    </div>
    <div class="sidebar-item" onclick="loadPage('products')">
        <i class="fa-solid fa-box"></i> Products
    </div>
    <div class="sidebar-item" onclick="loadPage('orders')">
        <i class="fa-solid fa-shopping-cart"></i> Orders
    </div>
    <div class="sidebar-item" onclick="loadPage('users')">
        <i class="fa-solid fa-users"></i> Users
    </div>
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
    <div class="flex items-center justify-between breadcrumb-bar">
        <h2 class="text-2xl font-bold text-gray-900">ADMIN DASHBOARD</h2>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-gray-700 hover:underline" 
                onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Sign out') }} <i class="ml-1 fa-solid fa-arrow-right-from-bracket"></i>
            </button>
        </form>
    </div>

    {{-- <div class="grid grid-cols-4 gap-6 mt-6">
        <div class="summary-card">
            <h3 class="text-lg font-semibold text-gray-700">Total Categories</h3>
            <p class="text-3xl font-bold text-orange-500">{{ $categoriesCount }}</p>
        </div>
        <div class="summary-card">
            <h3 class="text-lg font-semibold text-gray-700">Total Products</h3>
            <p class="text-3xl font-bold text-orange-500">{{ $productsCount }}</p>
        </div>
        <div class="summary-card">
            <h3 class="text-lg font-semibold text-gray-700">Total Orders</h3>
            <p class="text-3xl font-bold text-orange-500">{{ $ordersCount }}</p>
        </div>
        <div class="summary-card">
            <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
            <p class="text-3xl font-bold text-orange-500">{{ $usersCount }}</p>
        </div>
    </div> --}}
</div>

<script>
    function loadPage(page) {
        alert("Loading " + page + "...");
    }
</script>

@endsection
