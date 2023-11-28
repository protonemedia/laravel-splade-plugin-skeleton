import { createApp } from 'vue/dist/vue.esm-bundler.js'
import { SpladeCorePlugin } from '@protonemedia/laravel-splade-core'
import YourPlugin from '../../../resources/js/main.js'

createApp()
    .use(SpladeCorePlugin, {
        components: {},
    })
    .use(YourPlugin)
    .mount('#app')
