<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Navbar from '@/Layout/Navbar.vue'
import Footer from '@/Layout/Footer.vue'
</script>

<template>
  <Head>
    <link rel="stylesheet" href="css/css-coder.css" media="screen" />

    <link rel="stylesheet" href="css/css-coder-dark.css" media="screen" />

    <link rel="icon" type="image/png" href="favicons/images-favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicons/images-favicon-16x16.png" sizes="16x16" />
  </Head>

  <div class="float-container">
    <a id="dark-mode-toggle" class="colorscheme-toggle" href="hugo-coder.netlify.html">
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
</template>
