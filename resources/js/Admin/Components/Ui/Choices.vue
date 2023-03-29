<script setup lang="ts">
import Choices from "choices.js";
import { onMounted, watch } from "vue";
import '@/../css/choices.css';

const emit = defineEmits(["update:modelValue"]);
const props = defineProps({
  modelValue: {
    type: [String, Array<String>],
  },
  id: {
    type: String,
    required: true,
  },
  placeholder: {
    type: String,
    default: "Pilih salah satu...",
  },
  placeholderValue: {
    type: [Number, String, Array],
    default: "",
  },
  choices: {
    type: Array,
    default: []
  },
  multiple: {
    type: Boolean,
    default: false
  },
  allowDuplicate: {
    type: Boolean,
    default: true
  }
});

onMounted(() => {
  if (document.getElementById(props.id)?.choices) {
    document.getElementById(props.id)?.choices.destroy();
  }

  const selectLocation = new Choices(
    document.getElementById(props.id),
    {
      allowHTML: true,
      choices: props.choices,
      shouldSort: false,
      placeholder: true,
      placeholderValue: props.placeholder,
      position: 'bottom',
      itemSelectText: '',
      duplicateItemsAllowed: props.allowDuplicate,
      removeItems: true,
      removeItemButton: true,
    }
  ).setChoiceByValue(props.modelValue ?? '');

  document.getElementById(props.id).choices = selectLocation;
})

function inputChange(event: any) {
  //if select is multiple, we will set value as array
  //of selected options
  if (props.multiple) {
    var options = event.target.options;
    var value = [];
    for (var i = 0, l = options.length; i < l; i++) {
      if (options[i].selected) {
        value.push(options[i].value);
      }
    }

    emit("update:modelValue", value || []);
  } else { //otherwise will set value as string
    emit("update:modelValue", event.target.value || '');
  }
}

watch(() => props.modelValue, (value) => {
  if (props.multiple) {
    document.getElementById(props.id).choices.destroy();
    document.getElementById(props.id).choices.init();
    document.getElementById(props.id).choices.setChoiceByValue(value);
  } else {
    document.getElementById(props.id).choices.setChoiceByValue(value);
  }
})
</script>

<template>
  <select :value="modelValue" @change="inputChange" :id="id" :multiple="multiple">
    <option v-if="!multiple" :value="placeholderValue" placeholder>{{ placeholder }}</option>
    <slot />
  </select>
</template>
