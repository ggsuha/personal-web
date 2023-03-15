import { reactive } from "vue";

export const store = reactive({
  isDark: localStorage.getItem("isDark") === "true" ? true : false,
  changeColor() {
    this.isDark = !this.isDark;
    localStorage.setItem("isDark", this.isDark);
  },
});
