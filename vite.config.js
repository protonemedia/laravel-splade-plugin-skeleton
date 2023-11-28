import { resolve } from 'path'
import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import spladeCore from '@protonemedia/laravel-splade-vite'

export default defineConfig({
    plugins: [
        spladeCore({
            artisan: 'vendor/bin/testbench',
        }),
        vue(),
    ],

    build: {
        lib: {
            entry: resolve(__dirname, 'resources/js/main.js'),
            name: 'SpladeCorePlugin',
            fileName: 'splade-core-plugin',
        },
        rollupOptions: {
            external: ['vue', 'axios', '@protonemedia/laravel-splade-core'],
            output: {
                globals: {
                    axios: 'axios',
                    vue: 'Vue',
                    '@protonemedia/laravel-splade-core': 'LaravelSpladeCore',
                },
            },
        },
    },
    resolve: {
        alias: {
            '@': '/resources/js',
        },
    },
})
