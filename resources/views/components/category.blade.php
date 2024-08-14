@props(['categories'])
<div class="w-full max-w-xs border rounded-lg shadow-sm p-4 dark:bg-gray-800 dark:border-gray-700">
    <!-- Header -->
    <div class="flex justify-between items-center border-b pb-2 mb-2 dark:border-gray-700">
        <h2 class="text-lg font-semibold dark:text-gray-200">Categories</h2>
    </div>

    <!-- Tabs -->
    <div class="flex mb-2">
        <button type="button" class="w-1/2 text-center py-2 border-b-2 border-blue-500 font-semibold dark:text-gray-200 dark:border-blue-400">All Categories</button>
        <button type="button" class="w-1/2 text-center py-2 border-b-2 border-transparent text-gray-500 hover:text-black dark:text-gray-400 dark:hover:text-gray-200">Most Used</button>
    </div>

    <div class="addCategorys h-40 overflow-y-scroll border p-2 rounded mb-4 dark:border-gray-700 dark:bg-gray-900">
        <!-- Category All -->
        @foreach ($categories as $category)
            @if ($category->name != 'uncategory')
                <label class="block dark:text-gray-200">
                    <input value="{{ $category->name }}" name="category[]" type="checkbox" class="mr-2 dark:bg-gray-700 dark:border-gray-600 dark:checked:bg-blue-500">
                        <span class="capitalize">{{ $category->name }}</span>
                </label>
            @endif
        @endforeach
        <label class="block dark:text-gray-200">
            <input value="uncategory" name="category[]" type="checkbox" class="mr-2 dark:bg-gray-700 dark:border-gray-600 dark:checked:bg-blue-500">
                <span class="capitalize">uncategory</span>
        </label>
    </div>

    <!-- Add New Category -->
    <button onclick="showAddCategory()" type="button" class="categoryButtonText text-blue-500 hover:underline mb-2 block dark:text-blue-400">+ Add New Category</button>
    <div class="hidden showCategory">
        <input type="text" placeholder="New category name" class="categoryInputVal w-full p-2 border rounded mb-2 outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 ">
        <button type="button" onclick="newCategoryAdd()" class="w-full bg-blue-500 text-white p-2 rounded dark:bg-blue-600 dark:text-gray-200">Add New Category</button>
    </div>
</div>
<script>
function showAddCategory(){
    const showCategory = document.querySelector('.showCategory');
    const categoryButtonText = document.querySelector('.categoryButtonText');
    showCategory.classList.toggle('hidden');
    if (showCategory.classList.contains('hidden')) {
        categoryButtonText.textContent = '+ Add New Category';
    } else {
        categoryButtonText.textContent = '- Remove New Category';
    }
}
function newCategoryAdd(){
    const addCategorys = document.querySelector('.addCategorys');
    const categoryInputVal = document.querySelector('.categoryInputVal');
    const inputVal = categoryInputVal.value.trim();
    addCategorys.innerHTML += `<label class="block dark:text-gray-200">
                                <input value="${inputVal}" name="category[]" type="checkbox" checked class="mr-2 dark:bg-gray-700 dark:border-gray-600 dark:checked:bg-blue-500">
                                    <span class="capitalize">${inputVal}</span>
                                </label>`;
        categoryInputVal.value = "";
}
// Add event listener for Enter key
document.querySelector('.categoryInputVal').addEventListener('keydown', function(event) {
if (event.key === 'Enter') {
    event.preventDefault();
    newCategoryAdd();
}
});
</script>