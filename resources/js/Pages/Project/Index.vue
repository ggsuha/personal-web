<script setup lang="ts">
import Layout from '@/Layout/Default.vue'

const props = defineProps({
  projects: Object,
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
        <div v-for="project in projects" class="item">
          <a class="title" href="mermaid-support.html">Mermaid JS support</a>
          <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis illo deleniti
            excepturi? Iusto voluptates
            debitis dicta? Hic molestias ab itaque nesciunt officia necessitatibus quidem placeat, a, aperiam eaque
            facilis porro.</p>
        </div>
      </div>
    </section>
  </Layout>
</template>
