<script setup lang="ts">
import Layout from '@/Layout/Default.vue'
</script>

<template>
  <Layout>
    <section class="container centered">
      <div class="about">
        <div class="avatar">
          <picture>
            <source srcset="/images/suha.webp" type="image/webp">
            <source srcset="/images/suha.jpeg" type="image/jpeg">
            <img src="images/suha.jpeg" alt="avatar" />
          </picture>
        </div>

        <h1>Suhadak Akbar</h1>
        <h2>Backend Developer</h2>

        <ul>
          <li>
            <a href="https://github.com/ggsuha/" aria-label="Github">
              <i class="fa fa-2x fa-github" aria-hidden="true"></i>
            </a>
          </li>

          <li>
            <a href="https://twitter.com/akbarsuhadak/" aria-label="Twitter">
              <i class="fa fa-2x fa-twitter" aria-hidden="true"></i>
            </a>
          </li>

          <li>
            <a href="https://id.linkedin.com/in/akbarsuhadak/" aria-label="LinkedIn">
              <i class="fa fa-2x fa-linkedin" aria-hidden="true"></i>
            </a>
          </li>

          <li>
            <a href="https://www.instagram.com/akbarsuhadak//" aria-label="Instagram">
              <i class="fa fa-2x fa-instagram" aria-hidden="true"></i>
            </a>
          </li>
        </ul>
      </div>
    </section>
  </Layout>
</template>
