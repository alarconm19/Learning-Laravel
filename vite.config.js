import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                'resources/dashboardTemplate/css/styles.css',
                'resources/dashboardTemplate/js/scripts.js',
                'resources/dashboardTemplate/assets/demo/chart-area-demo.js',
                'resources/dashboardTemplate/assets/demo/chart-bar-demo.js',
                'resources/dashboardTemplate/js/datatables-simple-demo.js'
            ],
            refresh: true,
        }),
    ],
});
