import { createApp } from 'vue/dist/vue.esm-bundler.js'
import { SpladeCorePlugin } from '@protonemedia/laravel-splade-core'

const inDevelopment = true

const registerPlugin = (plugin) => {
    app.use(plugin.default).mount('#app')
}

const app = createApp().use(SpladeCorePlugin)

inDevelopment ? import('../../../resources/js/main.js').then(registerPlugin) : import('../../../dist/splade-core-plugin.js').then(registerPlugin)
