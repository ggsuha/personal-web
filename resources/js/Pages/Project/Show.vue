<script setup lang="ts">
import Layout from '@/Layout/Default.vue'
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  project: {
    type: Object,
    required: true,
  },
})
</script>

<template>
  <Layout>
    <section class="container post">
      <article>
        <header>
          <div class="post-title">
            <h1 class="title">
              <Link class="title-link" :href="'/project/' + project.slug">
              {{ project.title }}
              </Link>
            </h1>
          </div>
        </header>

        <div class="post-content">
          {{ project.description }}
        </div>
        <div class="gallery-container">
          <div class="gallery-column">
            <a target="_blank" href="/images/sample-1.jpg">
              <img class="gallery" src="/images/sample-1.jpg" alt="home">
            </a>
            <a target="_blank" href="/images/sample-2.jpg">
              <img class="gallery" src="/images/sample-2.jpg" alt="home">
            </a>
            <a target="_blank" href="/images/sample-2.jpg">
              <img class="gallery" src="/images/sample-6.jpg" alt="home">
            </a>
          </div>
          <div class="gallery-column">
          <a target="_blank" href="/images/sample-3.jpg">
            <img class="gallery" src="/images/sample-3.jpg" alt="home">
          </a>
            <a target="_blank" href="/images/sample-4.png">
              <img class="gallery" src="/images/sample-4.png" alt="home">
            </a>
            <a target="_blank" href="/images/sample-5.jpg">
              <img class="gallery" src="/images/sample-5.jpg" alt="home">
            </a>
          </div>
        </div>
        <!-- <footer>
                  <section class="see-also">
                  </section>
                </footer> -->
      </article>
    </section>
  </Layout>
</template>
