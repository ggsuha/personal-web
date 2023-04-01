<script setup lang="ts">
import Layout from '@/Admin/Layout/Default.vue'
import { Head, router, Link } from '@inertiajs/vue3';
import Pagination from '@/Admin/Components/Ui/Pagination.vue';
import Swal from 'sweetalert2'
import 'sweetalert2/src/sweetalert2.scss'

const props = defineProps({
  projects: {
    type: Object,
    required: true,
  }
})

function confirmDelete(slug: string) {
  Swal.fire({
    title: 'Are you sure?',
    showCancelButton: true,
    confirmButtonText: 'Yeah',
    cancelButtonText: 'Nope'
  }).then((result) => {
    if (result.isConfirmed) {
      router.visit(`/admin/project/${slug}`, {
        method: 'delete',
        onSuccess: () => {
          Swal.fire('Deleted!', '', 'success')
        }
      })
    }
  })
}
</script>

<template>
  <Head>
    <title>Project List</title>
  </Head>

  <Layout>
    <div class="flex flex-wrap mt-4">
      <div class="w-full mb-12 px-4">

        <div class="relative flex flex-col min-w-0 break-words w-full mb-2 shadow-lg rounded bg-white">
          <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div class="flex flex-wrap items-center">
              <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                <h3 class="font-semibold text-lg text-slate-700">
                  Projects
                </h3>
              </div>
              <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                <Link href="/admin/project/create"
                  class="bg-emerald-600 text-white hover:bg-emerald-700 text-xs px-3 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                  as="button">
                Add Project
                </Link>
              </div>
            </div>
          </div>
          <div class="block w-full overflow-x-auto">
            <!-- Projects table -->
            <table class="items-center w-full bg-transparent border-collapse">
              <thead>
                <tr>
                  <th
                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-slate-50 text-slate-500 border-slate-100">
                    Title
                  </th>
                  <th
                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-slate-50 text-slate-500 border-slate-100">
                  </th>
                </tr>
              </thead>
              <tbody>
                <template v-if="projects.data.length > 1">
                  <tr v-for="project in projects.data">
                    <th
                      class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                      <span class="ml-3 font-bold text-slate-600">
                        {{ project.title }}
                      </span>
                    </th>
                    <td
                      class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right">
                      <Link :href="`/admin/project/${project.slug}/edit`"
                        class="bg-sky-500 text-white hover:bg-sky-600 text-xs px-2 py-1 rounded outline-none focus:outline-none mx-1 mb-1 ease-linear transition-all duration-150">
                      Edit</Link>
                      <Link href="" @click.prevent="confirmDelete(project.slug)"
                        class="bg-red-500 text-white hover:bg-red-600 text-xs px-2 py-1 rounded outline-none focus:outline-none mx-1 mb-1 ease-linear transition-all duration-150">
                      Delete</Link>
                    </td>
                  </tr>
                </template>
                <tr v-else>
                  <td
                    class="w-full border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-center">
                    Empty data
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="relative bg-white shadow-lg rounded w-full">
          <Pagination :data="projects" />
        </div>
      </div>
    </div>

  </Layout>
</template>
