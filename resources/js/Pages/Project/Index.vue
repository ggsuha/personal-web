<script setup lang="ts">
import Layout from '@/Layout/Default.vue'
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  projects: {
    type: Object,
    required: true,
  },
})
</script>

<template>
  <Layout>
    <section class="container list">
      <header>
        <h1 class="title">
          <a class="title-link" href="/project">
            Projects
          </a>
        </h1>
      </header>

      <div class="project">
        <div v-for="project in projects.data" class="item">
          <a class="title" :href="project.slug">{{ project.title }}</a>
          <p class="description">{{ project.description }}</p>
        </div>
      </div>
      <div class="paginate-simple">
        <Link :href="projects.prev_page_url ?? '#'" as="button" :disabled="projects.prev_page_url === null"><i
          class="fa fa-3x fa-angle-left" aria-hidden="true"></i></Link>
        <Link :href="projects.next_page_url ?? '#'" as="button" :disabled="projects.next_page_url === null"><i
          class="fa fa-3x fa-angle-right" aria-hidden="true"></i>
        </Link>
      </div>
    </section>
  </Layout>
</template>
