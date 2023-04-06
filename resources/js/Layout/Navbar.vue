<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <nav class="navigation">
    <section class="container">
      <Link class="navigation-title" href="/">suha</Link>

      <input type="checkbox" id="menu-toggle" />
      <label class="menu-button float-right" for="menu-toggle">
        <i class="fa fa-bars fa-fw" aria-hidden="true"></i>
      </label>
      <ul class="navigation-list">
        <li class="navigation-item">
          <Link class="navigation-link" href="/project">Projects</Link>
        </li>
        <li class="navigation-item menu-separator">
          <span>|</span>
        </li>
        <li class="navigation-item">
          <a class="navigation-link" target="_blank" href="https://cdn.suha.my.id/f/CV-SuhadakAkbar.pdf">
            Download CV
          </a>
        </li>
      </ul>
    </section>
  </nav>
</template>
