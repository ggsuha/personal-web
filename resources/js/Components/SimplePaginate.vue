<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  data: {
    type: Object,
    required: true,
  },
})
</script>

<template>
  <div class="paginate-simple">
    <Link :href="data.prev_page_url ?? '#'" as="button" :disabled="data.prev_page_url === null"><i
      class="fa fa-3x fa-angle-left" aria-hidden="true"></i></Link>
    <Link :href="data.next_page_url ?? '#'" as="button" :disabled="data.next_page_url === null"><i
      class="fa fa-3x fa-angle-right" aria-hidden="true"></i>
    </Link>
  </div>
</template>
