<script setup lang="ts">
import { computed } from 'vue';
import Layout from '@/Admin/Layout/Default.vue'
import { Head } from '@inertiajs/vue3';
import Choices from '@/Admin/Components/Ui/Choices.vue';

const props = defineProps({
  action: {
    type: String,
    default: 'post',
  },
  project: {
    type: Object,
    default: null
  },
  technologies: {
    type: Object,
    required: true,
  }
})

const title = computed(() => {
  return props.action === 'post' ? 'Create' : 'Edit';
})
</script>

<template>
  <Head>
    <title>{{ title }} Project</title>
  </Head>

  <Layout>
    <div>
      <div class="flex flex-wrap mt-4">
        <div class="w-full xl:mb-0 px-4">
          <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-slate-100 border-0">
            <div class="rounded-t bg-white mb-6 px-6 py-6">
              <div class="text-center flex justify-between">
                <h6 class="text-slate-700 text-xl font-bold">{{ title }} Project</h6>
              </div>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
              <form>
                <div class="flex flex-wrap">
                  <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                      <label class="block uppercase text-slate-600 text-xs font-bold mb-2" htmlFor="title">
                        Title
                      </label>
                      <input type="text" id="title"
                        class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        value="lucky.jesse" />
                    </div>
                  </div>
                  <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                      <label class="block uppercase text-slate-600 text-xs font-bold mb-2">
                        Is project still exist?
                      </label>
                      <div class="text-slate-600 text-sm mb-2 px-3 py-3 ">
                        <span class="ml-6 first:ml-0">
                          <input type="radio" id="html" name="fav_language" value="HTML">
                          <label class="ml-1" for="html">Active</label>
                        </span>
                        <span class="ml-6 first:ml-0">
                          <input type="radio" id="css" name="fav_language" value="CSS">
                          <label class="ml-1" for="css">Dead</label>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                      <label class="block uppercase text-slate-600 text-xs font-bold mb-2" htmlFor="url">
                        Url
                      </label>
                      <input type="text"
                        class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        value="google.com" />
                    </div>
                  </div>
                  <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                      <label class="block uppercase text-slate-600 text-xs font-bold mb-2" htmlFor="grid-password">
                        Tech Used
                      </label>

                      <Choices id="tech" :multiple="true" placeholder="Select tech...">
                        <option value="tech.id" v-for="tech in technologies">{{ tech.name }}</option>
                      </Choices>
                    </div>
                  </div>

                  <div class="w-full lg:w-12/12 px-4">
                    <div class="relative w-full mb-3">
                      <label class="block uppercase text-slate-600 text-xs font-bold mb-2" htmlFor="description">
                        Description
                      </label>
                      <textarea type="text"
                        class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        rows="4">haha</textarea>
                    </div>
                  </div>
                </div>

                <div class="w-full text-right mt-6">
                  <button
                    class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                    type="button">
                    {{ title }}
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>
