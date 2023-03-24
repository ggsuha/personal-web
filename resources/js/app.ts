import "@/bootstrap";

import { createApp, h, DefineComponent } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue");
        let page: any = pages[`./Pages/${name}.vue`]();
        const _page:
            | DefineComponent
            | Promise<DefineComponent>
            | {
                  default: DefineComponent;
              } = page;

        return _page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});
