@extends('layouts.frontend')

@section('pages')

<style>
    /* Sidebar Styling */
    .sidebar {
        width: 240px;
        height: 100vh;
        background: #1E293B; /* Dark Blue */
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
    </aside>

    <!-- Logout Form -->
<form id="logoutForm" method="POST" action="{{ route('logout') }}" class="hidden">
    @csrf
</form>




<main class="flex-1 p-6 bg-gray-100">
    <div class="content">
        <h2 class="mb-6 text-3xl font-bold text-gray-800">Category Management</h2>
        <a href="#" onclick="openModal()" class="add-btn">+ Add Category</a>
        <table>
            <thead>
                <tr>
                    
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        
                        <td>{{ $category->name }}</td>
                        <td>
                            <button class="action-btn edit-btn" onclick="editCategory({{ $category }})">Edit</button>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>



















<

@include('admin.categories.create')

<script>
    function openModal() {
        document.getElementById('addCategoryModal').classList.remove('hidden');
        document.getElementById('modalTitle').innerText = "Add New Category";
        document.getElementById('saveButton').innerText = "Save Category";
        document.getElementById('methodField').value = "POST";
        document.getElementById('categoryForm').action = "{{ route('admin.categories.store') }}";
    }

    function closeModal() {
        document.getElementById('addCategoryModal').classList.add('hidden');
        document.getElementById('categoryForm').reset();
    }

    function editCategory(category) {
        openModal();
        document.getElementById('modalTitle').innerText = "Edit Category";
        document.getElementById('saveButton').innerText = "Update Category";
        document.getElementById('methodField').value = "PUT";
        document.getElementById('categoryForm').action = "/admin/categories/" + category.id;
        document.getElementById('categoryName').value = category.name;
    }
</script>

@endsection
