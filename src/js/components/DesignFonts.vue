<template>
  <div v-if="variables.font_primary.source === 'google-font'">
    <link :href="`https://fonts.googleapis.com/css2?family=${variables.font_primary.name}:wght@${variables.font_primary_weight}`" rel="stylesheet" />
  </div>
  
  <div v-if="variables.font_secondary.source === 'google-font'">
    <link :href="`https://fonts.googleapis.com/css2?family=${variables.font_secondary.name}:wght@${variables.font_secondary_weight}`" rel="stylesheet" />
    <link :href="`https://fonts.googleapis.com/css2?family=${variables.font_secondary.name}:wght@${variables.btn_text_weight}`" rel="stylesheet" />
  </div>
  
  <div v-if="variables.font_primary.source === 'upload'">
    <!-- <link v-if="variables.font_primary.source === 'upload'" rel="preconnect" as="font" :href="variables.font_primary.url" type="font/woff"> -->
    
    <!-- <component :is="'style'">
      @font-face {
        font-family: {{ variables.font_primary.name }};
        src: url("{{ variables.font_primary.url }}");
      }
    </component> -->
  </div>
  
  <!-- <component v-if="variables.font_secondary.source === 'upload'" :is="'style'">
    @font-face {
      font-family: {{ variables.font_secondary.name }};
      src: url("{{ variables.font_secondary.url }}");
    }
  </component> -->
</template>

<script setup>
const props = defineProps({
  variables: { 
    type: Object
  }
})
</script>
