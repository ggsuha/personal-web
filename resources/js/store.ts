import { reactive } from "vue";

interface Store {
    colorScheme: string;
    changeColor: () => void;
}

export const store: Store = reactive({
    colorScheme:
        localStorage.getItem("colorScheme") === "dark" ? "dark" : "light",
    changeColor() {
        this.colorScheme = this.colorScheme === "dark" ? "light" : "dark";
        localStorage.setItem("colorScheme", this.colorScheme);
    },
});
