<script setup lang="ts">
import FooterSmall from "@/Admin/Components/Footers/FooterSmall.vue";
import registerBg2 from "@/../img/auth_background.png";
</script>

<template>
  <div>
    <main>
      <section class="relative w-full h-full py-40 min-h-screen">
        <div class="absolute top-0 w-full h-full bg-slate-800 bg-no-repeat bg-full"
          :style="`background-image: url('${registerBg2}');`"></div>

        <slot />

        <FooterSmall absolute />
      </section>
    </main>
  </div>
</template>
