<script setup lang="ts">
import { computed, onMounted } from 'vue';
import Layout from '@/Admin/Layout/Default.vue'
import { Head, useForm } from '@inertiajs/vue3';
import Choices from '@/Admin/Components/Ui/Choices.vue';
import FileUpload from '@/Admin/Components/Ui/FileUpload.vue';
import Swal from 'sweetalert2';
import 'sweetalert2/src/sweetalert2.scss';
import InputError from '@/Admin/Components/Ui/InputError.vue';

const props = defineProps({
  action: {
    type: String,
    default: 'post',
  },
  errors: {
    type: Object
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

const form = useForm({
  title: props.project?.title,
  is_live: props.project?.is_live === 1 ? true : false,
  url: props.project?.url,
  technologies: props.project?.technologies ? props.project?.technologies.map((x: Object) => x.id.toString()) : [],
  description: props.project?.description ?? '',
  images: props.project?.images ?? [],
  removed_images: [],
});

const title = computed(() => {
  return props.action === 'post' ? 'Create' : 'Edit';
})

function flagRemovedImage(id: number) {
  form.removed_images.push(id);
}

function submit() {
  form.transform((data) => ({
    ...data,
    _method: props.action,
  })).post(
    props.action === 'post' ? '/admin/project' : `/admin/project/${props.project.slug}/update`,
    {
      preserveScroll: true,
      onSuccess: (response) => {
        Swal.fire('Data berhasil diproses!')
      }
    });
}
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
                        placeholder="lucky.jesse" v-model="form.title" />
                      <InputError :text="errors?.title" />
                    </div>
                  </div>
                  <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                      <label class="block uppercase text-slate-600 text-xs font-bold mb-2">
                        Is project still exist?
                      </label>
                      <div class="text-slate-600 text-sm mb-2 px-3 py-3 ">
                        <span class="ml-6 first:ml-0">
                          <input type="radio" id="live" v-model="form.is_live" :value="true">
                          <label class="ml-1" for="live">Active</label>
                        </span>
                        <span class="ml-6 first:ml-0">
                          <input type="radio" id="die" v-model="form.is_live" :value="false">
                          <label class="ml-1" for="die">Dead</label>
                        </span>
                      </div>
                      <InputError :text="errors?.is_live" />
                    </div>
                  </div>
                  <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                      <label class="block uppercase text-slate-600 text-xs font-bold mb-2" htmlFor="url">
                        Url
                      </label>
                      <input type="text"
                        class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        placeholder="google.com" v-model="form.url" />
                      <InputError :text="errors?.url" />
                    </div>
                  </div>
                  <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                      <label class="block uppercase text-slate-600 text-xs font-bold mb-2" htmlFor="grid-password">
                        Tech Used
                      </label>

                      <Choices id="tech" :multiple="true" placeholder="Select technology..." v-model="form.technologies">
                        <option :value="tech.id" v-for="tech in technologies">{{ tech.name }}</option>
                      </Choices>
                      <InputError :text="errors?.technologies" />
                    </div>
                  </div>

                  <div class="w-full lg:w-12/12 px-4">
                    <div class="relative w-full mb-3">
                      <label class="block uppercase text-slate-600 text-xs font-bold mb-2" htmlFor="description">
                        Description
                      </label>
                      <textarea type="text"
                        class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        rows="4" v-model="form.description"></textarea>
                      <InputError :text="errors?.description" />
                    </div>
                  </div>

                  <div class="w-full lg:w-12/12 px-4">
                    <div class="relative w-full mb-3">
                      <label class="block uppercase text-slate-600 text-xs font-bold mb-2" htmlFor="image">
                        Image
                      </label>

                      <FileUpload v-model="form.images" accept="image/*" @remove="flagRemovedImage" />
                      <InputError :text="errors?.images" />
                    </div>
                  </div>
                </div>

                <div class="w-full text-right mt-6">
                  <button
                    class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                    type="button" @click.prevent="submit">
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
