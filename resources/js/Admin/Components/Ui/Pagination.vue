<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  data: {
    type: Object,
    required: true,
  }
})
</script>

<template>
  <div v-if="data.data.length > 1" class="flex justify-center text-xs">
    <ul class="pagination p-2 shadow-sm rounded">
      <li v-for="link in data.links" class="pagination-item my-1/2">
        <Link :disabled="link.active || !link.url"
          class="box-border rounded border-2 border-emerald-500 px-3 py-2 text-gray-600 no-underline mx-2"
          :class="[link.url && !link.active ? 'hover:bg-emerald-100' : 'opacity-50']" :href="link.url ?? '#'" as="button"
          v-html="link.label">
        </Link>
      </li>
    </ul>
  </div>
</template>

<style scoped>
.pagination {
  list-style-type: none;
}

.pagination-item {
  display: inline-block;
}

/* .active {
  @apply .border-t .border-b .border-l .border-blue-100 .px-3 .py-2 .bg-blue-100 .no-underline .text-blue-500 .text-sm;
} */
</style>
