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
    /* Sidebar Styling */
    .sidebar {
        width: 240px;
        height: 100vh;
        background: var(--primary-color); /* Dark Blue */
        color: white;
        position: fixed;
        top: 0;
        left: 0;
        padding: 20px;
        overflow: auto;
    }

    .sidebar-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px;
        margin: 10px 0;
        border-radius: 6px;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }

    .sidebar-item:hover {
        background: #4F46E5; /* Vibrant Blue */
        color: #FFF;
        transform: translateX(5px);
    }

    .content {
        margin-left: 260px;
        padding: 20px;
    }

    /* Table Styling */
    table {
        border-collapse: collapse;
        width: 100%;
        background: white;
        border-radius: 8px;
        overflow: hidden;
    }

    table thead th {
        text-align: left;
        padding: 12px 15px;
        background: #4F46E5;
        color: white;
        font-size: 14px;
    }

    table tbody tr {
        transition: all 0.2s ease-in-out;
    }

    table tbody tr:hover {
        background: #F3F4F6;
    }

    table td {
        padding: 12px 15px;
        font-size: 14px;
        color: #374151;
    }

    /* Add Button Styling */
    .add-btn {
        padding: 10px 20px;
        background: #4F46E5;
        color: white;
        font-size: 14px;
        border-radius: 6px;
        transition: all 0.3s ease-in-out;
        display: inline-block;
        margin-bottom: 20px;
    }

    .add-btn:hover {
        background: #365772;
    }

    /* Action Buttons */
    .action-btn {
        padding: 8px 12px;
        font-size: 14px;
        border-radius: 6px;
        color: white;
        cursor: pointer;
    }

    .edit-btn {
        background: #3B82F6;
    }

    .edit-btn:hover {
        background: #2563EB;
    }

    .delete-btn {
        background: #EF4444;
    }

    .delete-btn:hover {
        background: #DC2626;
    }
</style>


<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 text-white bg-blue-900">
        <div class="p-4 text-2xl font-bold">Trenzly Admin</div>
        <div class="sidebar-item" onclick="window.location='{{ route('admin.dashboard') }}'">
            <i class="fa-solid fa-chart-line"></i> Dashboard
        </div>
    
        <div class="sidebar-item" onclick="window.location='{{ route('admin.categories.index') }}'">
            <i class="fa-solid fa-list"></i> Categories
        </div>
    
        <div class="sidebar-item" onclick="window.location='{{ route('admin.products.index') }}'">
            <i class="fa-solid fa-box"></i> Products
        </div>
        
        <div class="sidebar-item" onclick="window.location='{{ route('admin.orders.index') }}'">
            <i class="fa-solid fa-shopping-cart"></i> Orders
        </div>
    
        <div class="sidebar-item" onclick="window.location='{{ route('admin.users.index') }}'">
            <i class="fa-solid fa-users"></i> Users
        </div>
    
        <div class="sidebar-item" onclick="window.location='{{ route('admin.settings.index') }}'">
            <i class="fa-solid fa-cog"></i> Settings
        </div>
    
        <div class="sidebar-item" onclick="document.getElementById('logoutForm').submit();">
            <i class="fa-solid fa-sign-out-alt"></i> Logout
        </div>
    </aside>

    <!-- Logout Form -->
<form id="logoutForm" method="POST" action="{{ route('logout') }}" class="hidden">
    @csrf
</form>

<div class="dashboard-content fade-in">
    <h2 class="text-3xl font-bold text-gray-900">Settings</h2>

    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf
        <label class="block mb-2 text-sm font-medium text-gray-800">Site Title</label>
        <input type="text" name="site_title" class="w-full p-2 mb-4 border rounded-md" placeholder="Enter site title">

        <label class="block mb-2 text-sm font-medium text-gray-800">Admin Email</label>
        <input type="email" name="admin_email" class="w-full p-2 mb-4 border rounded-md" placeholder="Enter admin email">

        <button class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-700">Save Settings</button>
    </form>
</div>
@endsection
