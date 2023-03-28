<script setup lang="ts">
import { createPopper } from "@popperjs/core";
import { ref } from "vue";

const dropdownPopoverShow = ref(false)
const btnDropdownRef = ref(null);
const popoverDropdownRef = ref(null);

function toggleDropdown(event: any) {
  event.preventDefault();
  if (dropdownPopoverShow.value) {
    dropdownPopoverShow.value = false;
  } else {
    dropdownPopoverShow.value = true;
    if (btnDropdownRef.value && popoverDropdownRef.value) {
      createPopper(btnDropdownRef.value, popoverDropdownRef.value, {
        placement: "bottom-start",
      });
    }
  }
}
</script>

<template>
  <div>
    <a class="text-slate-500 block py-1 px-3" ref="btnDropdownRef" v-on:click="toggleDropdown($event)">
      <i class="fas fa-bell"></i>
    </a>
    <div ref="popoverDropdownRef"
      class="bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" v-bind:class="{
        hidden: !dropdownPopoverShow,
        block: dropdownPopoverShow,
      }">
      <a href="javascript:void(0);"
        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
        Action
      </a>
      <a href="javascript:void(0);"
        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
        Another action
      </a>
      <a href="javascript:void(0);"
        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
        Something else here
      </a>
      <div class="h-0 my-2 border border-solid border-slate-100" />
      <a href="javascript:void(0);"
        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
        Seprated link
      </a>
    </div>
  </div>
</template>
