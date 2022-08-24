<template>
  <component :is="'style'">
    <!-- Root & Default theme -->
    :root, [data-theme="default"] {
      --color-white:           {{ variables.color_white }};
      --color-black:           {{ variables.color_black }};
      --color-primary:         {{ variables.color_primary }};
      --color-accent:          {{ variables.color_accent }};
      --color-contrast-high:   {{ variables.color_contrast_higher }};
      --color-contrast-higher: {{ variables.color_contrast_higher }};
      --color-bg:              {{ variables.color_background }};
      --text-base-size:        {{ variables.text_base_size + 'rem' }};
      --font-primary:          {{ variables.font_primary }};
      --font-primary-weight:   {{ variables.font_primary_weight }};
      --font-secondary:        {{ variables.font_secondary }};
      --font-secondary-weight: {{ variables.font_secondary_weight }};
      --btn-radius:            {{ variables.button_radius + 'em' }};
    }
    
    <!-- Theme 1 -->
    [data-theme="bg-1"] {        
      --color-bg: {{ variables.color_primary + '0D' }};
    }
    
    <!-- Theme 2 -->
    [data-theme="bg-2"] {        
      --color-bg:              {{ variables.color_primary }};
      --color-primary:         {{ variables.color_white }};
      --color-contrast-lower:  {{ variables.color_contrast_higher }};
      --color-contrast-high:   {{ variables.color_white }};
      --color-contrast-higher: {{ variables.color_white }};
    }
  </component>
</template>

<script setup>
const props = defineProps({
  variables: { 
    type: Object
  }
})
</script>
