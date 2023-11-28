const components = import.meta.glob('./splade/*.vue', { eager: true })

export default {
    install: (app) => {
        for (const [path, m] of Object.entries(components)) {
            const componentName = path
                .split('/')
                .pop()
                .replace(/\.\w+$/, '')

            app.component(componentName, m.default)
        }
    },
}
