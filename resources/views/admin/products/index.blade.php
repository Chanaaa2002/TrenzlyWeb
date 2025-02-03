@extends('layouts.frontend')

@section('pages')

<style>
    /* Sidebar styling */
    .sidebar {
        width: 240px;
        height: 100vh;
        background: #1E293B; /* Dark blue */
        color: white;
        position: absolute;
        top: 0;
        left: 0;
        padding: 20px;
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
        background: #4F46E5; /* Vibrant blue */
        color: #FFF;
        transform: translateX(5px);
    }

    .content {
        margin-left: 260px; /* Offset for sidebar */
        padding: 20px;
    }

    /* Modal Styling */
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        display: none;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: white;
        padding: 20px;
        border-radius: 10px;
        width: 500px;
        max-width: 90%;
        animation: fadeIn 0.5s ease-in-out;
    }

    .close-modal {
        background: #FF0000;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .h-screen {
        height: 100vh;
    }

  /* Sidebar Styling */
aside {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

aside ul li:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

/* Button Hover Effects */
button {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

button:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}
/* Table Styling */
table {
    border-collapse: separate;
    border-spacing: 0 10px;
}

table thead {
    font-size: 0.875rem;
    font-weight: 600;
}

table tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.05);
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

    <!-- Main Content -->
    <main class="flex-1 p-6 bg-gray-100">
        <h2 class="mb-6 text-4xl font-bold text-gray-800">Product Management</h2>

        <!-- Add Product Button -->
        <button onclick="openModal()" 
        class="px-4 py-2 text-sm font-medium text-white transition-transform rounded shadow-lg bg-gradient-to-r from-blue-500 to-purple-500 hover:scale-105">
            + Add Product
        </button>

        <!-- Product Table -->
        <div class="mt-8 overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-lg">
                <thead class="text-gray-700 bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left">Image</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Category</th>
                        <th class="px-6 py-3 text-left">Price</th>
                        <th class="px-6 py-3 text-left">Size</th>
                        <th class="px-6 py-3 text-left">Color</th>
                        <th class="px-6 py-3 text-left">Stock</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-6 py-3">
                                <img src="{{ asset('storage/' . json_decode($product->images)[0]) }}" 
                                     alt="Product Image" 
                                     class="object-cover w-16 h-16 rounded-lg">
                            </td>
                            <td class="px-6 py-3">{{ $product->name }}</td>
                            <td class="px-6 py-3">{{ $product->category->name }}</td>
                            <td class="px-6 py-3">${{ $product->price }}</td>
                            <td class="px-6 py-3">{{ $product->size }}</td>
                            <td class="px-6 py-3">{{ $product->color }}</td>
                            <td class="px-6 py-3">{{ $product->stock }}</td>
                            <td class="flex gap-2 px-6 py-3">
                                <button onclick="editProduct({{ $product->id }})" 
                                        class="px-4 py-2 text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                    Edit
                                </button>
                                <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
</div>



@include('admin.products.create')

<script>
    function openModal() {
        document.getElementById('addProductModal').classList.remove('hidden');
        document.getElementById('modalTitle').innerText = "Add New Product";
        document.getElementById('saveButton').innerText = "Save Product";
        document.getElementById('methodField').value = "POST";
        document.getElementById('productForm').action = "{{ route('admin.products.store') }}";
    }

    function closeModal() {
        document.getElementById('addProductModal').classList.add('hidden');
        document.getElementById('productForm').reset();
        document.getElementById('productId').value = "";
    }

    function editProduct(product) {
        openModal();

        document.getElementById('modalTitle').innerText = "Edit Product";
        document.getElementById('saveButton').innerText = "Update Product";
        document.getElementById('methodField').value = "PUT";
        document.getElementById('productForm').action = "/admin/products/" + product.id;

        document.getElementById('productId').value = product.id;
        document.getElementById('productName').value = product.name;
        document.getElementById('productDescription').value = product.description;
        document.getElementById('productPrice').value = product.price;
        document.getElementById('productStock').value = product.stock;
        document.getElementById('productSize').value = product.size;
        document.getElementById('productColor').value = product.color;
        document.getElementById('productCategory').value = product.category_id;

        document.getElementById('imagePreview').innerHTML = "";
        if (product.images) {
            let images = JSON.parse(product.images);
            images.forEach(img => {
                let imgElement = document.createElement("img");
                imgElement.src = "/storage/" + img;
                imgElement.classList.add("w-24", "h-24", "object-cover", "rounded-lg");
                document.getElementById('imagePreview').appendChild(imgElement);
            });
        }
    }
</script>

@endsection
