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
  <div class="paginate-simple" v-if="data.data.length > 1">
    <Link :href="data.prev_page_url ?? '#'" as="button" id="prev-page" aria-label="Prev Page"
      :disabled="data.prev_page_url === null"><i class="fa fa-3x fa-angle-left" aria-hidden="true"></i></Link>
    <Link :href="data.next_page_url ?? '#'" as="button" id="next-page" aria-label="Next Page"
      :disabled="data.next_page_url === null"><i class="fa fa-3x fa-angle-right" aria-hidden="true"></i>
    </Link>
  </div>
</template>
