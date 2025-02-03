<div id="addProductModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
    <div class="w-1/2 p-6 bg-white rounded-lg shadow-lg">
        <h2 class="mb-4 text-2xl font-bold text-gray-800">Add Product</h2>
        <form id="addProductForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Product Name -->
            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" id="name" name="name" placeholder="Enter product name"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-orange-400 focus:border-orange-400" required>
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-700">Category</label>
                <select id="category_id" name="category_id"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-orange-400 focus:border-orange-400" required>
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-700">Price</label>
                <input type="number" id="price" name="price" placeholder="Enter product price"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-orange-400 focus:border-orange-400" required>
            </div>

            <!-- Stock -->
            <div class="mb-4">
                <label for="stock" class="block mb-2 text-sm font-medium text-gray-700">Stock</label>
                <input type="number" id="stock" name="stock" placeholder="Enter stock quantity"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-orange-400 focus:border-orange-400" required>
            </div>

            <!-- Images -->
            <div class="mb-4">
                <label for="images" class="block mb-2 text-sm font-medium text-gray-700">Product Images</label>
                <input type="file" id="images" name="images[]" multiple
                    class="w-full px-4 py-2 border rounded-lg focus:ring-orange-400 focus:border-orange-400">
            </div>

            <!-- Submit and Cancel Buttons -->
            <div class="flex justify-end space-x-4">
                <button type="button" onclick="closeAddProductModal()"
                    class="px-4 py-2 text-white bg-gray-600 rounded-lg hover:bg-gray-700">Cancel</button>
                <button type="submit"
                    class="px-4 py-2 text-white bg-orange-500 rounded-lg hover:bg-orange-600">Add Product</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddProductModal() {
        document.getElementById('addProductModal').classList.remove('hidden');
    }

    function closeAddProductModal() {
        document.getElementById('addProductModal').classList.add('hidden');
    }
</script>
