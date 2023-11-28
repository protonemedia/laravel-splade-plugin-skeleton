import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import spladeCore from '@protonemedia/laravel-splade-vite'

export default defineConfig({
    plugins: [
        spladeCore({
            artisan: 'vendor/bin/testbench',
            execOptions: {
                cwd: '../',
            },
        }),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': '/../resources/js',
        },
    },
})
