
<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import Notification from '../Dropdown/Notification.vue';
import User from '../Dropdown/User.vue';

const collapseShow = ref('hidden');

function toggleCollapseShow(classes: any) {
  collapseShow.value = classes;
}
</script>

<template>
  <nav
    class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div
      class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
      <!-- Toggler -->
      <button
        class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
        type="button" @click="toggleCollapseShow('bg-white m-2 py-3 px-6')">
        <i class="fas f/admin/dashba-bars"></i>
      </button>
      <!-- Brand -->
      <Link
        class="md:block text-left md:pb-2 text-slate-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
        href="/admin">
      Admin
      </Link>
      <!-- User -->
      <ul class="md:hidden items-center flex flex-wrap list-none">
        <li class="inline-block relative">
          <Notification />
        </li>
        <li class="inline-block relative">
          <User />
        </li>
      </ul>
      <!-- Collapse -->
      <div
        class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded"
        v-bind:class="collapseShow">
        <!-- Collapse header -->
        <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-slate-200">
          <div class="flex flex-wrap">
            <div class="w-6/12">
              <Link
                class="md:block text-left md:pb-2 text-slate-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                href="/admin">
              Vue Notus
              </Link>
            </div>
            <div class="w-6/12 flex justify-end">
              <button type="button"
                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                v-on:click="toggleCollapseShow('hidden')">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-6 mb-4 md:hidden">
          <div class="mb-3 pt-0">
            <input type="text" placeholder="Search"
              class="border-0 px-3 py-2 h-12 border border-solid border-slate-500 placeholder-slate-300 text-slate-600 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal" />
          </div>
        </form>

        <!-- Divider -->
        <hr class="my-4 md:min-w-full" />
        <!-- Heading -->
        <h6 class="md:min-w-full text-slate-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
          Admin Layout Pages
        </h6>
        <!-- Navigation -->

        <ul class="md:flex-col md:min-w-full flex flex-col list-none mb-10">
          <li class="items-center">
            <!-- 'text-emerald-500 hover:text-emerald-600' -->
            <Link href="/admin" as="button" class="text-xs uppercase py-3 font-bold block" :class="[
              'text-slate-700 hover:text-slate-500',
            ]">
            <!-- 'text-slate-300' -->
            <i class="fas fa-tv mr-2 text-sm" :class="['opacity-75']"></i>
            Dashboard
            </Link>
          </li>

          <li class="items-center">
            <!-- 'text-emerald-500 hover:text-emerald-600' -->
            <Link href="/admin/project" as="button" class="text-xs uppercase py-3 font-bold block" :class="[
              'text-slate-700 hover:text-slate-500',
            ]">
            <!-- 'text-slate-300' -->
            <i class="fas fa-code mr-2 text-sm" :class="['opacity-75']"></i>
            Projects
            </Link>
          </li>
        </ul>
        <div class="absolute bottom-0 left-0 text-xs w-full text-center">
          <a as="button" target="_blank" href="/admin/filemanager">
            <div class="bg-emerald-600 p-2 text-white rounded w-full">File Manager
            </div>
          </a>
        </div>
      </div>
    </div>
  </nav>
</template>
