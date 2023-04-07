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

function cut(text: string, threshold: number = 222) {
  if (!text) {
    return '';
  }

  if (text.length > threshold) {
    text = text.replace(new RegExp(".(?=.{0," + (text.length - threshold - 1) + "}$)", "g"), '') + '...';
  }

  return text;
}
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
        <template v-if="projects.data.length > 1">
          <div v-for="project in projects.data" class="item">
            <Link class="title" :href="'/project/' + project.slug">{{ project.title }}</Link>
            <p class="description">{{ cut(project.description) }}</p>
          </div>
        </template>
        <div v-else>
          Empty project
        </div>
      </div>

      <SimplePaginate :data="projects" />
    </section>
  </Layout>
</template>
