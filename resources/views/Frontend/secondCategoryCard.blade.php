<div class="flex flex-row flex-wrap -mx-3" id="secondCategoryCard">

</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    const secondCategoryCard = document.getElementById('secondCategoryCard')

    axios.get("{{ route('spacificCategoryPost', $data) }}")
        .then(response => {
            // console.log(response.data.data);
            response.data.data.forEach(resData => {
                secondCategoryCard.innerHTML += `
                <x-card
                    class="flex-shrink max-w-full w-full sm:w-1/3 lg:w-1/4 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100"
                    blockClass="flex flex-row sm:block hover-img" contentBlockClass="py-0 sm:py-3 pl-3 sm:pl-0"
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
