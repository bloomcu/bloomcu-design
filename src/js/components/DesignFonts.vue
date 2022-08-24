<template>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link :href="`https://fonts.googleapis.com/css2?family=${variables.font_primary}:wght@${variables.font_primary_weight}`" rel="stylesheet" />
  <link :href="`https://fonts.googleapis.com/css2?family=${variables.font_secondary}:wght@${variables.font_secondary_weight}`" rel="stylesheet" />
</template>

<script setup>
const props = defineProps({
  variables: { 
    type: Object
  }
})
</script>
