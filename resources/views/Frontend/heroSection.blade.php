<div class="bg-white py-6">
    <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
        <!-- big grid 1 -->
        <div class="flex flex-row flex-wrap">
            <!--Start left cover-->
            <div class="flex-shrink max-w-full w-full lg:w-1/2 pb-1 lg:pb-0 lg:pr-1" id="heroSectionFirst">
               
            </div>

            <!--Start box news-->
            <div class="flex-shrink max-w-full w-full lg:w-1/2">
                <div class="box-one flex flex-row flex-wrap allContent" id="allContent">
                    <h2 class="font-bold text-4xl text-indigo-600 lodingText"></h2>
                    <!--All Content-->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const lodingText = document.querySelector('.lodingText');
    const allContent = document.getElementById('allContent')
    const heroSectionFirst = document.getElementById('heroSectionFirst')
    let heroFristContent = null;

    lodingText.innerHTML = 'Loding ... ';
    const singlePostRoute = "{{ route('singlePost', ':slug') }}";

    axios.get("{{ route('heroSection') }}")
    .then(response =>{
        if (response.status == 200) {
            lodingText.innerHTML = ' ';

            response.data.data.forEach((element, index) => {
                if (index === 0) {
                    heroFristContent = element;
                    return; 
                }
                const postUrl = singlePostRoute.replace(':slug', element.post.slug);

                allContent.innerHTML += `
                 <article class="flex-shrink max-w-full w-full sm:w-1/2">
                        <div class="relative hover-img max-h-48 overflow-hidden">
                            <a href="${postUrl}">
                                <img class="max-w-full w-full mx-auto h-auto" src="{{ asset('storage/${element.post.featured_image}') }}"
                                    alt="${element.post.alt_name}">
                            </a>
                            <div class="absolute px-4 pt-7 pb-4 bottom-0 w-full bg-gradient-cover">
                                <a href="${postUrl}">
                                    <h2 class="text-lg font-bold capitalize leading-tight text-white mb-1">${element.post.title}</h2>
                                </a>
                                <div class="pt-1">
                                    <div class="text-gray-100">
                                        <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>${element.category.name}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                `
            });

            const FirstPostUrl = singlePostRoute.replace(':slug', heroFristContent.post.slug);
            heroSectionFirst.innerHTML = `
             <div class="relative hover-img max-h-98 overflow-hidden">
                    <a href="${FirstPostUrl}">
                        <img class="max-w-full w-full mx-auto h-auto" src="{{ asset('storage/${heroFristContent.post.featured_image}') }}""
                            alt="${heroFristContent.post.alt_name}">
                    </a>
                    <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover">
                        <a href="${FirstPostUrl}">
                            <h2 class="text-3xl font-bold capitalize text-white mb-3">${heroFristContent.post.title}</h2>
                        </a>
                        <p class="text-gray-100 hidden sm:inline-block">${heroFristContent.post.title}</p>
                        <div class="pt-2">
                            <div class="text-gray-100">
                                <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>${heroFristContent.category.name}
                            </div>
                        </div>
                    </div>
                </div>
            `
        }
    }).catch(err => {
        lodingText.innerHTML = 'Error API ... ';
        console.log(err);
    })

</script>