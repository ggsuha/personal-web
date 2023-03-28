<script setup lang="ts">
import { ref } from 'vue';
import Layout from '@/Admin/Layout/Default.vue'
import PageVisits from '@/Admin/Components/Card/PageVisits.vue';
import SocialTraffic from '@/Admin/Components/Card/SocialTraffic.vue';
import Stats from '@/Admin/Components/Header/Stats.vue';
import { Head } from '@inertiajs/vue3';

const name = ref('dashboard-page')
</script>

<template>
  <Head>
    <title>Dashboard</title>
  </Head>
  <Layout>
    <Stats />
    <div>
      <div class="flex flex-wrap mt-4">
        <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
          <PageVisits />
        </div>
        <div class="w-full xl:w-4/12 px-4">
          <SocialTraffic />
        </div>
      </div>
    </div>
  </Layout>
</template>
