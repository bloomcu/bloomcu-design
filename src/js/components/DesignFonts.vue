<template>
  <!-- <div v-if="variables.font_primary.source"> -->
    <div v-if="variables.font_primary.source === 'google-font'">
      <link :href="`https://fonts.googleapis.com/css2?family=${variables.font_primary.name}:wght@${variables.font_primary_weight}`" rel="stylesheet" />
    </div>
    
    <div v-if="variables.font_primary.source === 'upload'">
      <!-- <link rel="preconnect" as="font" :href="variables.font_primary.url" type="font/woff"> -->
      <component :is="'style'">
        @font-face {
          font-family: "{{ variables.font_primary.name }}";
          font-style: normal;
          font-weight: normal;
          font-display: auto;
          src: url("{{ variables.font_primary.url }}");
        }
      </component>
    </div>
  <!-- </div> -->
  
  <!-- <div v-if="variables.font_secondary.source"> -->
    <div v-if="variables.font_secondary.source === 'google-font'">
      <link :href="`https://fonts.googleapis.com/css2?family=${variables.font_secondary.name}:wght@${variables.font_secondary_weight}`" rel="stylesheet" />
      <link :href="`https://fonts.googleapis.com/css2?family=${variables.font_secondary.name}:wght@${variables.btn_text_weight}`" rel="stylesheet" />
    </div>
    
    <div v-if="variables.font_secondary.source === 'upload' && variables.font_secondary.url !== variables.font_primary.url">
      <!-- <link rel="preconnect" as="font" :href="variables.font_secondary.url" type="font/woff">   -->
      <component :is="'style'">
        @font-face {
          font-family: "{{ variables.font_secondary.name }}";
          font-style: normal;
          font-weight: normal;
          font-display: auto;
          src: url("{{ variables.font_secondary.url }}");
        }
      </component>
    </div>
  <!-- </div> -->
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
