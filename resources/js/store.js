import { reactive } from "vue";

export const store = reactive({
  isDark: localStorage.getItem("isDark") ?? false,
  changeColor() {
    this.isDark = !this.isDark;
    localStorage.setItem("isDark", this.isDark);
  },
});
