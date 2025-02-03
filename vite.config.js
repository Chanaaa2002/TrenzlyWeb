import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','resources/css/style.css', 'resources/css/category.css','resources/js/welcome.js', 'resources/css/product_list.css'],
            
            
            refresh: true,
        }),
    ],
});
