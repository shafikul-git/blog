<div class="w-full max-w-xs border rounded-lg shadow-sm p-4">
    <!-- Header -->
    <div class="flex justify-between items-center border-b pb-2 mb-2">
        <h2 class="text-lg font-semibold">Categories</h2>
        <button class="text-gray-500 focus:outline-none">&uarr;</button>
    </div>

    <!-- Tabs -->
    <div class="flex mb-2">
        <button class="w-1/2 text-center py-2 border-b-2 border-blue-500 font-semibold">All Categories</button>
        <button class="w-1/2 text-center py-2 border-b-2 border-transparent text-gray-500 hover:text-black">Most Used</button>
    </div>

    <!-- Category List -->
    <div class="h-40 overflow-y-scroll border p-2 rounded mb-4">
        <label class="block">
            <input type="checkbox" class="mr-2">
            Australian data
        </label>
        <label class="block">
            <input type="checkbox" class="mr-2">
            B2B电子邮件清单
        </label>
        <label class="block">
            <input type="checkbox" class="mr-2">
            B2C 电子邮件列表
        </label>
        <label class="block">
            <input type="checkbox" class="mr-2">
            Bank User Number
        </label>
        <label class="block">
            <input type="checkbox" class="mr-2">
            base de datos de telefonos celulares
        </label>
        <label class="block">
            <input type="checkbox" class="mr-2">
            BTC 写码数据
        </label>
        <label class="block">
            <input type="checkbox" class="mr-2">
            C级聯絡人列表
        </label>
    </div>

    <!-- Add New Category -->
    <a href="#" class="text-blue-500 hover:underline mb-2 block">+ Add New Category</a>
    <input type="text" placeholder="New category name" class="w-full p-2 border rounded mb-2 outline-none">
    <select class="w-full p-2 border rounded mb-2 outline-none">
        <option>— Parent Category —</option>
    </select>
    <button class="w-full bg-blue-500 text-white p-2 rounded">Add New Category</button>
</div>