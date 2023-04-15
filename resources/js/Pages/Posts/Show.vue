<script setup lang="ts">
import Layout from '@/Layout/Default.vue'

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
              <a class="title-link" href="https://hugo-coder.netlify.app/posts/mermaid-support/">
                Mermaid JS support
              </a>
            </h1>
          </div>
          <div class="post-meta">
            <div class="date">
              <span class="posted-on">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <time datetime="2022-07-25T00:00:00Z">
                  July 25, 2022
                </time>
              </span>
              <span class="reading-time">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                One-minute read
              </span>
            </div>
          </div>
        </header>

        <div class="post-content">
          <p>If you want to use <a href="https://mermaid-js.github.io/mermaid/#/" class="external-link" target="_blank"
              rel="noopener">Mermaid-JS</a> on your website.
            Provide <code>mermaid</code> as <a href="https://gohugo.io/content-management/shortcodes/#readout"
              class="external-link" target="_blank" rel="noopener">Shortcode</a> in your markdown file.</p>
          <div class="mermaid">
            flowchart LR

            A --> B

            B --> C

            C --> D

            D --> B

          </div>
          <div class="mermaid">
            sequenceDiagram
            participant Alice
            participant Bob
            Alice->>Bob: Hi Bob
            Bob->>Alice: Hi Alice
          </div>
          <p>Find more example on <a href="https://mermaid-js.github.io/mermaid/#/" class="external-link" target="_blank"
              rel="noopener">Mermaid-JS</a> website.</p>
        </div>
        <footer>
          <section class="see-also">
          </section>
        </footer>
      </article>
    </section>
  </Layout>
</template>
