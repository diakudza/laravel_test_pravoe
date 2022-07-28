require('./bootstrap');

import { createApp, h } from 'vue'
import { App, plugin, Link} from '@inertiajs/inertia-vue3'
import Layout from "./Share/Layout";

const el = document.getElementById('app')

createApp({
    render: () => h(App, {
        initialPage: JSON.parse(el.dataset.page),
        // resolveComponent: name => import(`./Pages/${name}`).then(module => module.default), //без layout
        resolveComponent: name => {
            const page = require(`./Pages/${name}`).default
            page.layout = page.Layout || Layout
            return page
        },
    })
}).use(plugin)
    .mixin({methods: {route: window.route}})
    .mount(el)
