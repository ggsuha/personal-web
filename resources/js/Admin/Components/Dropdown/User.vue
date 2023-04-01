<script setup lang="ts">
import { router } from "@inertiajs/core";
import { createPopper } from "@popperjs/core";
import Swal from "sweetalert2";
import 'sweetalert2/src/sweetalert2.scss'
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

function logout() {
  Swal.fire({
    title: 'Are you sure?',
    showCancelButton: true,
    confirmButtonText: 'Yeah',
    cancelButtonText: 'Nope'
  }).then((result) => {
    if (result.isConfirmed) {
      router.post(`/admin/logout`, {})
    }
  })
}
</script>

<template>
  <div>
    <a class="text-slate-500 block" href="#pablo" ref="btnDropdownRef" v-on:click="toggleDropdown($event)">
      <div class="items-center flex">
        <span class="w-12 h-12 text-sm text-white bg-slate-200 inline-flex items-center justify-center rounded-full">
          <img alt="..." class="w-full rounded-full align-middle border-none shadow-lg" src="/images/suha.jpeg" />
        </span>
      </div>
    </a>
    <div ref="popoverDropdownRef"
      class="bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" v-bind:class="{
        hidden: !dropdownPopoverShow,
        block: dropdownPopoverShow,
      }">
      <button @click="logout"
        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
        Logout
      </button>
    </div>
  </div>
</template>

