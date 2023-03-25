<script setup lang="ts">
import SimplePaginate from '@/Components/SimplePaginate.vue';
import Layout from '@/Layout/Default.vue'

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

      <SimplePaginate :data="projects" />
    </section>
  </Layout>
</template>
