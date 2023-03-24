import { reactive } from "vue";

interface Store {
    isDark: boolean;
    changeColor: () => void;
}

export const store: Store = reactive({
    isDark: localStorage.getItem("isDark") === "true" ? true : false,
    changeColor() {
        this.isDark = !this.isDark;
        localStorage.setItem("isDark", this.isDark.toString());
    },
});
