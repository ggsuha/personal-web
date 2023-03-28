<script setup lang="ts">
import SimplePaginate from '@/Components/SimplePaginate.vue';
import Layout from '@/Layout/Default.vue'
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
  projects: {
    type: Object,
    required: true,
  },
})
</script>

<template>
  <Head key="page-title">
    <title>Project List - Suhadak Akbar</title>
  </Head>

  <Layout>
    <section class="container list">
      <header>
        <h1 class="title">
          <Link class="title-link" href="/project">
          Projects
          </Link>
        </h1>
      </header>

      <div class="project">
        <div v-for="project in projects.data" class="item">
          <Link class="title" :href="'/project/' + project.slug">{{ project.title }}</Link>
          <p class="description">{{ project.description }}</p>
        </div>
      </div>

      <SimplePaginate :data="projects" />
    </section>
  </Layout>
</template>
