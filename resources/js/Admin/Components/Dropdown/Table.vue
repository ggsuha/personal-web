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
    <button class="text-slate-500 py-1 px-3" ref="btnDropdownRef" @click="toggleDropdown($event)">
      <i class="fas fa-ellipsis-v"></i>
    </button>
    <div ref="popoverDropdownRef"
      class="bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" v-bind:class="{
        hidden: !dropdownPopoverShow,
        block: dropdownPopoverShow,
      }">
      <slot />
    </div>
  </div>
</template>
