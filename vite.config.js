import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/splideSlider.js',
                'resources/js/tailwind.js',
                'resources/js/fontawesome.js',
            ],
            refresh: true,
        }),
    ],
});
