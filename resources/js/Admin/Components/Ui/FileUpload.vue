<script setup lang="ts">
import Swal from 'sweetalert2';
import { nextTick, onMounted, reactive, watch } from 'vue';
import { FileRejectReason, useDropzone } from 'vue3-dropzone';

const props = defineProps({
  multiple: {
    type: Boolean,
    default: false
  },
  accept: {
    type: String,
    default: '*'
  },
  maxSize: {
    type: Number,
    default: 1048576
  },
  maxFiles: {
    type: Number,
    default: 999
  },
  modelValue: {
    type: Array<Object>,
    default: []
  },
});

const emit = defineEmits(['update:modelValue', 'remove']);

const state = reactive({
  files: [],
  previews: [],
});

onMounted(() => {
  nextTick(() => {
    props.modelValue.forEach(model => {
      state.files.push({ id: model.id });
      state.previews.push(model.url);
    });
  });
});

const { getRootProps, getInputProps, ...rest } = useDropzone({
  onDrop, onDropRejected, maxSize: props.maxSize
});

watch(state.files, () => {
  emit('update:modelValue', state.files);
});

function onDrop(acceptFiles: any) {
  acceptFiles.forEach((file: any) => {
    state.files.push(file);
    if (file.type.includes('image/')) {
      state.previews.push(URL.createObjectURL(file));
    }
  });
}

function onDropRejected(fileRejections: FileRejectReason[]) {
  fileRejections.forEach((file: any) => {
    file.errors.forEach((err: any) => {
      if (err.code === "file-too-large") {
        Swal.fire({
          text: 'File size is to big!',
          icon: 'error',
        })
      }

      // if (err.code === "file-invalid-type") {
      //   setErrors(`Error: ${err.message}`);
      // }
    });
  });
};

function handleClickDeleteFile(index: number) {
  const currentFile: any = state.files[index];
  const isFile = currentFile instanceof File;

  state.files.splice(index, 1);
  state.previews.splice(index, 1);

  if (!isFile) {
    emit('remove', currentFile.id);
  }
}
</script>

<template>
  <div class="w-full flex flex-row flex-wrap bg-white border-solid border-slate-200 border-2 rounded">
    <div class="w-36 h-36 box-border p-4" v-for="(file, index) in state.files" :key="index">
      <div class="relative  h-full w-full">
        <img class="object-cover h-full w-full rounded" :src="state.previews[index]" />
        <div class="absolute inset-x-0 bottom-0 bg-rose-600 text-center cursor-pointer p-1/2"
          @click="handleClickDeleteFile(index)">
          <span class="text-slate-50 text-xs">Hapus</span>
        </div>
      </div>
    </div>
    <div v-if="state.files.length < 1 || state.files.length < props.maxFiles" v-bind="getRootProps()"
      class="w-36 h-36 box-border p-4 cursor-pointer">
      <div class="relative h-full w-full rounded bg-cyan-600">
        <input v-bind="getInputProps({ multiple: props.multiple, accept: props.accept })" />
        <div class="absolute grid place-items-center inset-0">
          <p class="text-5xl text-slate-50">+</p>
        </div>
      </div>
    </div>
  </div>
</template>
