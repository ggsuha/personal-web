<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import Navbar from '@/Layout/Navbar.vue'
import Footer from '@/Layout/Footer.vue'
import { store } from '@/store'

const colorScheme: string = store.isDark ? 'dark' : 'light';
</script>

<template>
  <Head key="page-title">
    <title>Suhadak Akbar</title>
  </Head>

  <div :class="'colorscheme-' + colorScheme">
    <div class="float-container">
      <a id="dark-mode-toggle" class="colorscheme-toggle" @click.prevent="store.changeColor">
        <i class="fa fa-adjust fa-fw" aria-hidden="true"></i>
      </a>
    </div>

    <main class="wrapper">
      <Navbar />

      <div class="content">
        <slot />
      </div>

      <Footer />
    </main>
  </div>
</template>
