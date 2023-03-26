<script setup lang="ts">
import { ref } from 'vue';

const props = defineProps({
  absolute: {
    type: Boolean,
    default: false,
  },
})

const date = ref(new Date().getFullYear());
</script>

<template>
  <footer class="pb-6" :class="[
    absolute ? 'absolute w-full bottom-0 bg-slate-800' : 'relative',
  ]">
    <div class="container mx-auto px-4">
      <hr class="mb-6 border-b-1 border-slate-600" />
      <div class="flex flex-wrap items-center md:justify-between justify-center">
        <div class="w-full px-4">
          <div class="text-sm text-slate-500 font-semibold py-1 text-center">
            Copyright © {{ date }}
            <a href="https://www.creative-tim.com?ref=vn-footer-small"
              class="text-white hover:text-slate-300 text-sm font-semibold py-1">
              Suhadak Akbar
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>
