<template>
  <div>
    <div v-if="store.variables.font_primary.source !== 'upload'" class="file-upload inline-block">
      <input
        id="upload"
        class="file-upload__input sr-only" 
        @change="onUploadFile()"
        type="file" 
        ref="fileInput"
        name="upload"
        style="width: 1px; height: 1px;" 
      >
      <label for="upload" class="file-upload__label btn color-white bg-black width-100%">
        <span class="flex items-center">
          <svg class="icon" viewBox="0 0 20 20" aria-hidden="true">
            <g fill="currentColor">
              <path d="M18 12v4a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
              <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 13V2"></path>
              <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7l5-5 5 5"></path>
            </g>
          </svg>
          <span class="margin-left-xxs file-upload__text file-upload__text--has-max-width">Upload</span>
        </span>
      </label>
    </div>
    
    <div v-if="store.variables.font_primary.source === 'upload'">
      <div class="card padding-sm margin-bottom-sm">{{ store.variables.font_primary.name }}</div>
      <div class="flex gap-sm">
        <button class="btn color-white bg-black width-100%" @click="onRemoveFile()">Remove</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useDesignStore } from '../store/useDesignStore'

const store = useDesignStore()
const fileInput = ref()
const file = ref()

function onUploadFile() {
  file.value = fileInput.value.files[0]
  
  let formData = new FormData();
      formData.append('file', fileInput.value.files[0]);
      
  store.storeMedia(formData, 'font', '')
    .then((response) => {

      store.variables.font_primary = {
        source: 'upload',
        name: response.name,
        url: response.original_url,
      }
      
      store.variables.font_primary_weight = 'normal'
    })
}

function onRemoveFile() {
  store.variables.font_primary = {
    source: null,
    name: null,
    url: null,
  }
}
</script>
