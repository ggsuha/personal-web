<script setup lang="ts">
import Sidebar from "../Components/Sidebar/Default.vue"
import Navbar from "../Components/Navbar/Admin.vue"
import Footer from "../Components/Footers/Admin.vue";
</script>

<template>
  <div>
    <Sidebar />
    <div class="relative md:ml-64 bg-slate-100">
      <Navbar />
      <div class="px-4 md:px-10 mx-auto w-full">
        <div class="min-h-screen">

          <slot />
        </div>
        <Footer />
      </div>
    </div>
  </div>
</template>
