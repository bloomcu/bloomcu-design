<template>
  <component :is="'style'">
    <!-- Root & Default theme -->
    :root, [data-theme="default"] {
      
      <!-- Colors -->
      --color-white:              {{ variables.color_white }};
      --color-black:              {{ variables.color_black }};
      --color-primary:            {{ variables.color_primary }};
      --color-primary-light:      {{ shadeColor(variables.color_primary, 10) }}; <!-- 10% darker -->
      --color-accent:             {{ variables.color_accent }};
      --color-accent-light:       {{ shadeColor(variables.color_accent, 10) }}; <!-- 10% darker -->
      --color-contrast-high:      {{ variables.color_contrast_higher }};
      --color-contrast-higher:    {{ variables.color_contrast_higher }};
      --color-contrast-medium:    {{ shadeColor(variables.color_contrast_higher, -10) }}; <!-- 10% lighter -->
      --color-bg:                 {{ variables.color_background }};
      
      <!-- Base text -->
      --text-base-size:           {{ variables.text_base_size + 'rem' }};
      
      <!-- Primary font -->
      --font-primary:             {{ variables.font_primary.name }};
      --font-primary-weight:      {{ variables.font_primary.weight }};
      
      <!-- Secondary font -->
      --font-secondary:           {{ variables.font_secondary.name }};
      --font-secondary-weight:    {{ variables.font_secondary.weight }};
      
      <!-- Buttons font -->
      --font-buttons:             {{ variables.font_buttons.name ? variables.font_buttons.name : variables.font_secondary.name }};
      --font-buttons-weight:      {{ variables.font_buttons.weight ? variables.font_buttons.weight : variables.font_secondary.weight }};
      
      <!-- Buttons text colors -->
      --btn-primary-text-color:   {{ variables.btn_primary_text_color ? variables.btn_primary_text_color : variables.color_white }};
      --btn-secondary-text-color: {{ variables.btn_secondary_text_color ? variables.btn_secondary_text_color : variables.color_white }};
      --btn-tertiary-text-color:  {{ variables.btn_tertiary_text_color ? variables.btn_tertiary_text_color : variables.color_contrast_higher }};
      
      <!-- Buttons style -->
      --btn-radius:               {{ variables.btn_radius + 'em' }};
      --btn-text-transform:       {{ variables.btn_text_transform }};
    }
    
    <!-- Theme 1 -->
    [data-theme="bg-1"] {        
      --color-bg:                 {{ variables.color_primary + '0D' }};
    }
    
    <!-- Theme 2 -->
    [data-theme="bg-2"] {        
      --color-bg:                 {{ variables.color_primary }};
      --color-primary:            {{ variables.color_white }};
      --color-contrast-lower:     {{ variables.color_contrast_higher }};
      --color-contrast-high:      {{ variables.color_white }};
      --color-contrast-higher:    {{ variables.color_white }};
    }
  </component>
</template>

<script setup>
const props = defineProps({
  variables: { 
    type: Object
  }
})

function shadeColor(color, percent) {
    var R = parseInt(color.substring(1,3),16);
    var G = parseInt(color.substring(3,5),16);
    var B = parseInt(color.substring(5,7),16);

    R = parseInt(R * (100 + percent) / 100);
    G = parseInt(G * (100 + percent) / 100);
    B = parseInt(B * (100 + percent) / 100);

    R = (R<255)?R:255;  
    G = (G<255)?G:255;  
    B = (B<255)?B:255;  

    var RR = ((R.toString(16).length==1)?"0"+R.toString(16):R.toString(16));
    var GG = ((G.toString(16).length==1)?"0"+G.toString(16):G.toString(16));
    var BB = ((B.toString(16).length==1)?"0"+B.toString(16):B.toString(16));

    return "#"+RR+GG+BB;
}
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
  font-family: var(--font-buttons);
  font-weight: var(--font-buttons-weight);
  text-transform: var(--btn-text-transform);
}

.btn--primary {
  background: var(--color-primary);
  color: var(--btn-primary-text-color);

  &:hover {
    background: var(--color-primary-light);
  }
}

.btn--secondary {
  background-color: var(--color-accent);
  color: var(--btn-secondary-text-color);

  &:hover {
    background-color: var(--color-accent-light);
  }
}

.btn--tertiary {
  background-color: var(--color-white);
  color: var(--btn-tertiary-text-color);
}

.color-contrast-medium {
  color: var(--color-contrast-medium);
}

.color-contrast-high {
  color: var(--color-contrast-high);
}

.color-contrast-higher {
  color: var(--color-contrast-higher);
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
  
  .text-component {
    p {
      color: var(--color-contrast-high);
    }
  }
}

// Override tertiary button in hero's
.hero, 
.feature-v4 { // feature-v4 is the isolated hero block
  .btn--tertiary {
    background-color: var(--color-accent);
    color: var(--btn-secondary-text-color);
    
    &:hover {
      background-color: var(--color-accent-light);
    }
  }
}

// Fixes the button misalignment in boxed hero
.hero--boxed {
  .btn--primary {
    margin-bottom: var(--gap-y, 0) !important;
    margin-right: 0 !important;
  }
}

// Hide the help icon
.js-tour-help-trigger {
  font-size: var(--text-sm);
  
  .icon {
    display: none !important;
  }
  .mega-nav__icon-label {
    margin-left: 0 !important;
  }
}
</style>
