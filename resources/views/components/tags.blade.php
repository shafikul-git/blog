<div class="w-full max-w-md border rounded-md shadow-md shadow-indigo-300 p-2">
    <p class="text-xl dark:text-white font-bold">Tags </p>
    <div class="flex my-2">
        <input type="text" placeholder="Add tag" class="flex-grow outline-none p-1 tagInput" />
        <button type="button" onclick="adTag()" class="bg-blue-500 text-white px-3 py-1 rounded ml-2">Add</button>
    </div>
    <div class="flex flex-wrap gap-2 adTags">
        <input type="hidden" name="tags" class="tagsInput" />
        <!-- Tag Button All -->
    </div>
</div>

<script>
    function adTag() {
        const adTags = document.querySelector('.adTags');
        const tagInput = document.querySelector('.tagInput');
        const inputVal = tagInput.value;
        if (inputVal) {
            adTags.innerHTML += `<button type="button" onclick="removeTag(this)" class="dark:bg-black dark:text-white shadow-md shadow-indigo-300 hover:shadow-red-300 hover:bg-red-600 hover:text-white px-2 py-1 border-2 rounded-md">
            ${inputVal} <i class="fa-solid fa-xmark"></i>
        </button>`;
            tagInput.value = "";
        }
    }
    // Add event listener for Enter key
    document.querySelector('.tagInput').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            adTag();
        }
    });

    function storeAllTags(){
        const adTags = document.querySelector('.tagsInput');
        // const tagesArray = Array.form
    }

    function removeTag(element) {
        element.parentNode.removeChild(element);
    }
</script>
