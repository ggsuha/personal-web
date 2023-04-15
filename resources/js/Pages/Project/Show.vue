<script setup lang="ts">
import Layout from '@/Layout/Default.vue'
import { Link } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';
import { computed } from '@vue/reactivity';

const props = defineProps({
  project: {
    type: Object,
    required: true,
  },
})

const images = computed(() => {
  if (props.project.images.length === 0) {
    return null;
  }

  if (props.project.images.length == 1) {
    return [props.project.images];
  }

  const middleIndex = Math.ceil(props.project.images.length / 2);

  const firstHalf = props.project.images.slice().splice(0, middleIndex);
  const secondHalf = props.project.images.slice().splice(-middleIndex);

  return [firstHalf, secondHalf];
})
</script>

<template>
  <Head key="page-title">
    <title>{{ project.title }} - Suhadak Akbar</title>
  </Head>

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
          <pre v-html="project.description"></pre>
        </div>
        <div class="gallery-container" v-if="images">
          <div class="gallery-column" v-for="collection in images">
            <a v-for="image in collection" target="_blank" :href="image.url">
              <img class="gallery" loading="lazy" :src="image.url" :alt="`${project.title}-image`">
            </a>
          </div>
        </div>

        <div class="link" v-if="project.url">
          <a :href="project.url" class="button">See Project</a>
        </div>

        <footer>
          <section class="built-with" v-if="project.technologies.length > 0">
            <h1 class="title">Built with:</h1>
            <div class="tech">
              <div class="tooltip" v-for="tech in project.technologies">
                <img loading="lazy" :src="`/images/tech/${tech.code}.svg`" :alt="tech.name">
                <span>{{ tech.name }}</span>
              </div>
            </div>
          </section>
        </footer>
      </article>
    </section>
  </Layout>
</template>
