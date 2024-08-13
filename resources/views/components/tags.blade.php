<div class="w-full max-w-md border rounded-md shadow-md p-3 dark:bg-gray-800 dark:border-gray-700 dark:shadow-none">
    <p class="text-xl font-bold dark:text-white">Tags</p>
    <div class="flex my-2">
        <input type="text" placeholder="Add tag" class="flex-grow outline-none p-1 tagInput dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200" />
        <button type="button" onclick="adTag()" class="bg-blue-500 text-white px-3 py-1 rounded ml-2 dark:bg-blue-600">Add</button>
    </div>
    <div class="flex flex-wrap gap-2 adTags dark:text-gray-200">
        <input type="hidden" name="tags" class="tagsInput" />
        <!-- Tag Button All -->
    </div>
</div>

<script>
    function adTag() {
        const adTags = document.querySelector('.adTags');
        const tagInput = document.querySelector('.tagInput');
        const inputVal = tagInput.value.trim();

        const tagsInput = document.querySelector('.tagsInput');
        if (inputVal) {
            const tagsArray = inputVal.split(',').map(tag => tag.trim()).filter(tag => tag !== "");
            tagsArray.forEach(tag => {
                // Check if the tag already exists to avoid duplicates
                if (!tagsInput.value.split(',').includes(tag)) {
                    // Create a new tag button
                    const tagButton = document.createElement('button');
                    tagButton.type = 'button';
                    tagButton.className =
                        'dark:bg-black dark:text-white shadow-md shadow-indigo-300 hover:shadow-red-300 hover:bg-red-600 hover:text-white px-2 py-1 border-2 rounded-md';
                    tagButton.innerHTML = `${tag} <i class="fa-solid fa-xmark"></i>`;
                    tagButton.onclick = function() {
                        removeTag(this);
                    };

                    // Append the new tag button to the adTags container
                    adTags.appendChild(tagButton);

                    // Update the hidden input field to include the new tag
                    tagsInput.value += tagsInput.value ? `,${tag}` : tag;
                }
            });
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

    function removeTag(element) {
        const tagsInput = document.querySelector('.tagsInput');
        const tagText = element.innerText.trim();

        const tagsArray = tagsInput.value.split(',').filter(tag => tag !== tagText);
        tagsInput.value = tagsArray.join(',');

        element.remove();
        // element.parentNode.removeChild(element);
    }
</script>
