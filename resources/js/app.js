import './bootstrap';
import '@splidejs/splide/css';

import Alpine from 'alpinejs';
import Splide from '@splidejs/splide';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    new Splide('#post-carousel', {
        type: 'loop',
        perPage: 3,
    }).mount();
});
