<div id="post-carousel" class="splide post-carousel">
    <div class="splide__track">
        <ul class="splide__list" id="sliderContent">
           
        </ul>
    </div>
</div>

<script>
    const sliderContent = document.getElementById('sliderContent')

    axios.get("{{ route('spacificCategoryPost', $data) }}")
        .then(response => {
            response.data.data.forEach(resData => {
                sliderContent.innerHTML += `
                <li class="splide__slide">
                    <div class="w-full pb-3">
                        <div class="hover-img bg-white">
                            <a href="${resData.post.slug}">
                                <img class="max-w-full w-full mx-auto"
                                    src="${resData.post.featured_image}" alt="alt title">
                            </a>
                            <div class="py-3 px-6">
                                <h3 class="text-lg font-bold leading-tight mb-2">
                                    <a href="${resData.post.slug}">
                                        ${resData.post.title}
                                    </a>
                                </h3>
                                <a class="text-gray-500" href="${resData.category.slug}">
                                    <span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>
                                    ${resData.category.name}
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                `
            });

        })
        .catch(error => {
            console.log('api error ' + error);
        })
</script>




@vite(['resources/js/splideSlider.js'])

