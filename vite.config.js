import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/sass/main.sass', 'resources/js/main.js', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
