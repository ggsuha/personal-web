<script setup lang="ts">
import Layout from "@/Admin/Layout/Auth.vue"
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Admin/Components/Ui/InputError.vue';

const props = defineProps({
  errors: {
    type: Object
  }
})

const form = useForm({
  email: null,
  password: null,
  remember: null,
});

function submit() {
  form.post(
    '/admin/login',
    {
      preserveScroll: true
    });
}
</script>

<template>
  <Head>
    <title>Login</title>
  </Head>

  <Layout>
    <div class="container mx-auto px-4 h-full">
      <div class="flex content-center items-center justify-center h-full">
        <div class="w-full lg:w-4/12 px-4">
          <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-slate-200 border-0">
            <div class="rounded-t mb-0 px-6 py-6">
              <div class="text-center mb-3">
                <h6 class="text-slate-500 text-sm font-bold">
                  Sign in
                </h6>
              </div>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
              <form>
                <div class="relative w-full mb-3">
                  <label class="block uppercase text-slate-600 text-xs font-bold mb-2" htmlFor="grid-password">
                    Email
                  </label>
                  <input type="email"
                    class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Email" v-model="form.email" />
                  <InputError :text="errors?.email" />
                </div>

                <div class="relative w-full mb-3">
                  <label class="block uppercase text-slate-600 text-xs font-bold mb-2" htmlFor="grid-password">
                    Password
                  </label>
                  <input type="password"
                    class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Password" v-model="form.password" />
                </div>
                <div>
                  <label class="inline-flex items-center cursor-pointer">
                    <input id="customCheckLogin" type="checkbox" v-model="form.remember"
                      class="form-checkbox border-0 rounded text-slate-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" />
                    <span class="ml-2 text-sm font-semibold text-slate-600">
                      Remember me
                    </span>
                  </label>
                </div>

                <div class="text-center mt-6">
                  <button
                    class="bg-slate-800 text-white active:bg-slate-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                    type="button" @click.prevent="submit">
                    Sign In
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
