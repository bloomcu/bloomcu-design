<template>
  <component :is="'style'">
    <!-- Root & Default theme -->
    :root, [data-theme="default"] {
      --color-white:              {{ variables.color_white }};
      --color-black:              {{ variables.color_black }};
      --color-primary:            {{ variables.color_primary }};
      --color-accent:             {{ variables.color_accent }};
      --color-contrast-high:      {{ variables.color_contrast_higher }};
      --color-contrast-higher:    {{ variables.color_contrast_higher }};
      --color-bg:                 {{ variables.color_background }};
      --text-base-size:           {{ variables.text_base_size + 'rem' }};
      --font-primary:             {{ variables.font_primary.name }};
      <!-- --font-primary-url:         {{ variables.font_primary.url }}; -->
      --font-secondary:           {{ variables.font_secondary.name }};
      <!-- --font-secondary-url:       {{ variables.font_secondary.url }}; -->
      --font-primary-weight:      {{ variables.font_primary_weight }};
      --font-secondary-weight:    {{ variables.font_secondary_weight }};
      --btn-primary-text-color:   {{ variables.btn_primary_text_color ? variables.btn_primary_text_color : variables.color_white }};
      --btn-secondary-text-color: {{ variables.btn_secondary_text_color ? variables.btn_secondary_text_color : variables.color_white }};
      --btn-tertiary-text-color:  {{ variables.btn_tertiary_text_color ? variables.btn_tertiary_text_color : variables.color_contrast_higher }};
      --btn-radius:               {{ variables.btn_radius + 'em' }};
      --btn-text-weight:          {{ variables.btn_text_weight }};
      --btn-text-transform:       {{ variables.btn_text_transform }};
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

<style lang="scss">
/* --------------------------------
Base Theme Overrides
-------------------------------- */
h1, .h1, h2, .h2, h3, .h3, h4, .h4 {
  font-family: var(--font-primary);
  font-weight: var(--font-primary-weight);
}

body {
  font-family: var(--font-secondary);
  font-weight: var(--font-secondary-weight);
}

a {
  color: var(--color-contrast-higher);
  
  &:hover {
    text-decoration: none;
  }
}

.btn--primary, .btn--secondary, .btn--tertiary {
  border: 2px solid transparent;
  font-family: var(--font-secondary);
  font-weight: var(--btn-text-weight);
  text-transform: var(--btn-text-transform);
}

.btn--primary {
  background: var(--color-primary);
  color: var(--btn-primary-text-color);

  // &:hover {
  //   border: 2px solid var(--color-primary);
  //   background-color: transparent;
  //   color: var(--color-primary)
  // }
}

.btn--secondary {
  background-color: var(--color-accent);
  color: var(--btn-secondary-text-color);

  // &:hover {
  //   border: 2px solid var(--color-accent);
  //   background-color: transparent;
  //   color: var(--color-accent)
  // }
}

.btn--tertiary {
  background-color: var(--color-white);
  color: var(--btn-tertiary-text-color);

  // &:hover {
  //   border: 2px solid var(--color-accent);
  //   background-color: transparent;
  //   color: var(--color-accent)
  // }
}

[data-theme="bg-1"] {
  background-color: var(--color-bg);
}

[data-theme="bg-2"] {
  background-color: var(--color-bg);
  
  .btn--primary {
    color: var(--color-contrast-lower);
  }
  
  .btn--tertiary {
    color: var(--color-contrast-lower);
  }
  
  .pre-title {
    color: var(--color-primary);
  }
}

// Override tertiary button in hero's
.hero, 
.feature-v4 { // feature-v4 is the isolated hero block
  .btn--tertiary {
    background-color: var(--color-accent);
    color: var(--btn-secondary-text-color);
  }
}

// Fixes the button misalignment in boxed hero
.hero--boxed {
  .btn--primary {
    margin-bottom: var(--gap-y, 0) !important;
    margin-right: 0 !important;
  }
}

.boxed-feature {
  // Secondary button
  .color-inherit {
    
  }
}
</style>
