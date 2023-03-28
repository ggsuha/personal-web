<script setup lang="ts">
import Navbar from '@/Layout/Navbar.vue'
import Footer from '@/Layout/Footer.vue'
import { store } from '@/store'
</script>

<template>
  <div :class="'colorscheme-' + store.colorScheme">
    <div class="float-container">
      <button id="dark-mode-toggle" class="colorscheme-toggle" @click.prevent="store.changeColor"
        aria-label="Change Color Scheme">
        <i class="fa fa-adjust fa-fw" aria-hidden="true"></i>
      </button>
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
