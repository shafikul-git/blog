<div class="flex flex-row flex-wrap -mx-3" id="threadCategoryCard">

</div>

<script>
    const threadCategoryCard = document.getElementById('threadCategoryCard')

    axios.get("{{ route('spacificCategoryPost', $data) }}")
        .then(response => {
            console.log(response.data.data);
            response.data.data.forEach((resData, index) => {
                let mainClass , blockClass, contentBlockClass;

                if (index === 0) {
                     mainClass = "flex-shrink max-w-full w-full px-3 pb-5";
                     blockClass = "relative hover-img max-h-98 overflow-hidden";
                     contentBlockClass = "absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover";
                } else{
                     mainClass = "flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100";
                     blockClass = "flex flex-row sm:block hover-img";
                     contentBlockClass = "py-0 sm:py-3 pl-3 sm:pl-0";
                }

                threadCategoryCard.innerHTML += `
                <x-card 
                    class="${mainClass}"
                    blockClass="${blockClass}"
                    contentBlockClass="${contentBlockClass}"
                    img="${resData.post.featured_image}"
                    alt="${resData.post.alt_name}"
                    heading="${resData.post.title}"
                    slug="${resData.post.slug}"
                    content="${resData.post.content}"
                    category="${resData.category.name}"
                    categorySlug="${resData.category.slug}"
                    >
                </x-card>
                `
            });

        })
        .catch(error => {
            console.log('api error ' + error);
        })
</script>
