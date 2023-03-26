import "@/bootstrap";
import "@/../css/nprogress.css";

import { createApp, h, DefineComponent } from "vue";
import { createInertiaApp, router } from "@inertiajs/vue3";
import NProgress from "nprogress";

createInertiaApp({
    progress: false, //not working, so I need to disable it
    resolve: (name) => {
        const pages = import.meta.glob("./Admin/Pages/**/*.vue");
        let page: any = pages[`./Admin/Pages/${name}.vue`]();
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

/**
 * Somehow InertiaProgress are not working,
 * so I need to install NProgress
 */
NProgress.configure({ easing: "ease", showSpinner: false });
router.on("start", () => NProgress.start());
router.on("finish", () => NProgress.done());
