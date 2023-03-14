<script setup lang="ts">
import Layout from '@/Layout/Default.vue'
</script>

<template>
  <Layout>
    <section class="container centered">
      <div class="about">
        <div class="avatar">
          <img src="images/images-avatar.jpg" alt="avatar" />
        </div>

        <h1>John Doe</h1>

        <h2>Full Stack DevOps<br />Magician<br /></h2>

        <ul>
          <li>
            <a href="https://github.com/johndoe/" aria-label="Github">
              <i class="fa fa-2x fa-github" aria-hidden="true"></i>
            </a>
          </li>

          <li>
            <a href="https://gitlab.com/johndoe/" aria-label="Gitlab">
              <i class="fa fa-2x fa-gitlab" aria-hidden="true"></i>
            </a>
          </li>

          <li>
            <a href="https://twitter.com/johndoe/" aria-label="Twitter">
              <i class="fa fa-2x fa-twitter" aria-hidden="true"></i>
            </a>
          </li>

          <li>
            <a href="https://www.linkedin.com/in/johndoe/" aria-label="LinkedIn">
              <i class="fa fa-2x fa-linkedin" aria-hidden="true"></i>
            </a>
          </li>

          <li>
            <a href="https://medium.com/@johndoe" aria-label="Medium">
              <i class="fa fa-2x fa-medium" aria-hidden="true"></i>
            </a>
          </li>

          <li>
            <a href="https://myhugosite.com/index.xml" aria-label="RSS" rel="alternate" type="application/rss+xml">
              <i class="fa fa-2x fa-rss" aria-hidden="true"></i>
            </a>
          </li>
        </ul>
      </div>
    </section>
  </Layout>
</template>
