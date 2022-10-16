import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { resolvePageComponent } from "vite-plugin-laravel/inertia";
// import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m.js";

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(name, import.meta.glob("../views/pages/**/*.vue")),
    setup({ el, app, props, plugin }) {
        createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});
