<script setup lang="ts">
import Layout from '@/Layout/Default.vue'
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  posts: Object,
})
</script>

<template>
  <Layout>
    <section class="container list">
      <header>
        <h1 class="title">
          <Link class="title-link" href="/post">
          Posts
          </Link>
        </h1>
      </header>

      <ul>
        <li v-for="post in posts">
          <span class="date">July 25, 2022</span>
          <a class="title" href="mermaid-support.html">Mermaid JS support</a>
        </li>
      </ul>
    </section>
  </Layout>
</template>
