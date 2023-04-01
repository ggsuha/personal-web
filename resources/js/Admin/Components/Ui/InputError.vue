<script setup lang="ts">
const props = defineProps({
  text: {
    type: String,
    default: null,
  }
})
</script>

<template>
  <span v-if="text" class="text-sm mt-1/2 text-red-500">{{ text }}</span>
</template>
