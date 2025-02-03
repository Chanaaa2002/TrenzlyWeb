<!-- Modal -->
<div id="addProductModal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
    <div class="w-full max-w-sm p-6 transition-transform duration-300 transform scale-95 bg-white rounded-lg shadow-lg hover:scale-100 animate-fadeIn">
        <h2 id="modalTitle" class="mb-4 text-xl font-semibold text-center text-gray-800">Add New Product</h2>

        <form id="productForm" method="POST" action="#" enctype="multipart/form-data">
            @csrf

            <!-- Product Name -->
            <label class="block mb-1 text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" name="name" id="productName" required class="w-full p-2 mb-3 text-gray-800 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">

            <!-- Description -->
            <label class="block mb-1 text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="productDescription" class="w-full p-2 mb-3 text-gray-800 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none"></textarea>

            <!-- Price and Stock -->
            <div class="flex gap-3 mb-3">
                <div class="w-1/2">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Price ($)</label>
                    <input type="number" name="price" id="productPrice" required class="w-full p-2 text-gray-800 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
                </div>
                <div class="w-1/2">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Stock</label>
                    <input type="number" name="stock" id="productStock" required class="w-full p-2 text-gray-800 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
                </div>
            </div>

            <!-- Category -->
            <label class="block mb-1 text-sm font-medium text-gray-700">Category</label>
            <select name="category_id" id="productCategory" required 
                    class="w-full p-2 mb-3 text-gray-800 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
                <option value="" disabled selected>Select a Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            

            <!-- Size and Color -->
            <div class="flex gap-3 mb-3">
                <div class="w-1/2">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Size</label>
                    <input type="text" name="size" id="productSize" placeholder="e.g., S, M, L" class="w-full p-2 text-gray-800 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
                </div>
                <div class="w-1/2">
                    <label class="block mb-1 text-sm font-medium text-gray-700">Color</label>
                    <input type="text" name="color" id="productColor" placeholder="e.g., Red, Blue" class="w-full p-2 text-gray-800 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">
                </div>
            </div>

            <!-- Image Upload -->
            <label class="block mb-1 text-sm font-medium text-gray-700">Product Images</label>
            <div id="imageUploadBox" class="p-3 mb-3 text-center border-2 border-dashed rounded-md cursor-pointer hover:bg-gray-50">
                <p class="text-gray-500">Click to Upload</p>
                <input type="file" name="images[]" id="imageInput" class="hidden" multiple accept="image/*">
            </div>

            <!-- Image Preview -->
            <div id="imagePreview" class="flex gap-2 mb-3"></div>

            <!-- Action Buttons -->
            <div class="flex justify-between">
                <button type="button" onclick="closeModal()" class="px-4 py-2 text-white bg-gray-500 rounded-md hover:bg-gray-700">
                    Cancel
                </button>
                <button type="submit" id="saveButton" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-700">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.3s ease-out;
    }

    /* Input Focus */
    input:focus,
    textarea:focus,
    select:focus {
        border-color: #2563EB; /* Blue */
    }

    /* Image Preview */
    #imagePreview img {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 4px;
    }
</style>

<script>
    function openModal() {
        document.getElementById('addProductModal').classList.remove('hidden');
        document.getElementById('productForm').reset();
        document.getElementById('modalTitle').innerText = "Add New Product";
        document.getElementById('saveButton').innerText = "Save Product";
    }

    function closeModal() {
        document.getElementById('addProductModal').classList.add('hidden');
    }

    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    const imageUploadBox = document.getElementById('imageUploadBox');

    imageUploadBox.addEventListener('click', () => imageInput.click());

    imageInput.addEventListener('change', function () {
        imagePreview.innerHTML = "";
        for (const file of this.files) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                imagePreview.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    });
</script>
