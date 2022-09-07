<template>
  <!-- Google fonts -->
  <div v-if="variables.font_primary.source === 'google-font'">
    <link :href="`https://fonts.googleapis.com/css2?family=${variables.font_primary.name}:wght@${variables.font_primary.weight}`" rel="stylesheet" />
  </div>
  
  <div v-if="variables.font_secondary.source === 'google-font'">
    <link :href="`https://fonts.googleapis.com/css2?family=${variables.font_secondary.name}:wght@${variables.font_secondary.weight}`" rel="stylesheet" />
  </div>
  
  <div v-if="variables.font_buttons.source === 'google-font'">
    <link :href="`https://fonts.googleapis.com/css2?family=${variables.font_buttons.name}:wght@${variables.font_buttons.weight}`" rel="stylesheet" />
  </div>
  
  <!-- Uploaded fonts -->
  <component v-if="variables.font_primary.source === 'upload'" :is="'style'">
    @font-face {
      font-family: "{{ variables.font_primary.name }}";
      font-style: normal;
      font-weight: normal;
      font-display: auto;
      src: url("{{ variables.font_primary.url }}");
    }
  </component>
  
  <component v-if="variables.font_secondary.source === 'upload'" :is="'style'">
    @font-face {
      font-family: "{{ variables.font_secondary.name }}";
      font-style: normal;
      font-weight: normal;
      font-display: auto;
      src: url("{{ variables.font_secondary.url }}");
    }
  </component>
  
  <component v-if="variables.font_buttons.source === 'upload'" :is="'style'">
    @font-face {
      font-family: "{{ variables.font_buttons.name }}";
      font-style: normal;
      font-weight: normal;
      font-display: auto;
      src: url("{{ variables.font_buttons.url }}");
    }
  </component>
</template>

<style>
/* @font-face {
  font-family: var(--font-primary);
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url('https://build-api.sfo3.cdn.digitaloceanspaces.com/local_harmon/16/Museosans-300.woff') format('woff');
} */
</style>

<script setup>
const props = defineProps({
  variables: { 
    type: Object
  }
})
</script>
