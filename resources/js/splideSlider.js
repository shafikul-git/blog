import '@splidejs/splide/css';

import Splide from '@splidejs/splide';

document.addEventListener('DOMContentLoaded', function () {
    new Splide('#post-carousel', {
        type: 'loop',
        perPage: 3,
    }).mount();
});
