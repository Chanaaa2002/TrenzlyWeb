<div id="addCategoryModal" 
     class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
    <div class="w-full max-w-sm p-6 transition-transform duration-300 transform scale-95 bg-white rounded-lg shadow-lg hover:scale-100">
        <h2 id="modalTitle" class="mb-4 text-xl font-semibold text-center text-gray-800">Add New Category</h2>

        <form id="categoryForm" method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <input type="hidden" name="_method" id="methodField" value="POST">

            <!-- Category Name -->
            <label class="block mb-1 text-sm font-medium text-gray-700">Category Name</label>
            <input type="text" name="name" id="categoryName" required 
                   class="w-full p-2 mb-3 text-gray-800 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none">

            <!-- Action Buttons -->
            <div class="flex justify-between">
                <button type="button" onclick="closeCategoryModal()" 
                        class="px-4 py-2 text-white bg-gray-500 rounded-md hover:bg-gray-700">
                    Cancel
                </button>
                <button type="submit" id="saveCategoryButton" 
                        class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-700">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function closeCategoryModal() {
        document.getElementById('addCategoryModal').classList.add('hidden'); // Hide the modal
        document.getElementById('categoryForm').reset(); // Reset the form fields
    }
</script>
