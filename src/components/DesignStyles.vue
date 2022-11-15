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
      --color-contrast-medium:    {{ variables.color_contrast_higher }};
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
      --btn-padding-y:            {{ variables.btn_padding_y + 'em' }};
      --btn-padding-x:            {{ variables.btn_padding_x + 'em' }};
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
      --color-contrast-medium:    {{ variables.color_white }};
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
  font-family: var(--font-primary, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol");
  font-weight: var(--font-primary-weight);
}

body {
  font-family: var(--font-secondary, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol");
  font-weight: var(--font-secondary-weight);
}

a {
  color: var(--color-contrast-higher);
  
  &:hover {
    text-decoration: none;
  }
}

.btn,
.button {
  border: 2px solid transparent;
  font-family: var(--font-buttons);
  font-weight: var(--font-buttons-weight);
  text-transform: var(--btn-text-transform);
  padding: var(--btn-padding-y) var(--btn-padding-x);
  box-shadow: none;
  
  &:hover {
    box-shadow: none;
  }
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
  // border-color: var(--color-contrast-low);
  color: var(--btn-tertiary-text-color);
  
  &:hover {
    background-color: hsla(var(--color-contrast-lower-h),var(--color-contrast-lower-s),var(--color-contrast-lower-l),var(--bg-o,1));
  }
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
    
    &:hover {
      background-color: var(--color-contrast-higher);
      opacity: .9;
    }
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

/* --------------------------------
Fixes the button misalignment in boxed hero
-------------------------------- */
.hero--boxed {
  .btn--primary {
    margin-bottom: var(--gap-y, 0) !important;
    margin-right: 0 !important;
  }
}

/* --------------------------------
Hide the help icon
-------------------------------- */
.js-tour-help-trigger {
  font-size: var(--text-sm);
  
  .icon {
    display: none !important;
  }
  .mega-nav__icon-label {
    margin-left: 0 !important;
  }
}

/* --------------------------------
Override testimonial quote svg color
-------------------------------- */
section.full-width-blockquote,
section.testimonial-cards {
  .icon {
    display: none;
  }
  
  .text-component, // child of section.full-width-blockquote
  .testimonial-cards-block__icon { // child of section.testimonial-cards
    &:before {
      display: inline-flex;
      content: '';
      
      -webkit-mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 27'%3E%3Cg%3E%3Cg id='Style-Guide' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Specs---Icons' transform='translate(-933 -731)' fill='%2382BC00' fill-rule='nonzero'%3E%3Cpath d='M964.221 758v-12.926h-5.84c0-2.042.495-3.797 1.484-5.265.99-1.469 2.441-2.554 4.356-3.256V731c-1.66.51-3.207 1.18-4.643 2.01a15.9 15.9 0 0 0-3.782 3.017 13.807 13.807 0 0 0-2.585 4.069c-.639 1.532-.958 3.191-.958 4.978V758h11.968zm-19.053 0v-12.926h-5.84c0-2.042.494-3.797 1.484-5.265.99-1.469 2.441-2.554 4.356-3.256V731c-1.66.51-3.207 1.18-4.643 2.01a15.9 15.9 0 0 0-3.782 3.017 13.807 13.807 0 0 0-2.585 4.069c-.639 1.532-.958 3.191-.958 4.978V758h11.968z' id='“'%3E%3C/path%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E") no-repeat 100% 100%;
      
      mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 27'%3E%3Cg%3E%3Cg id='Style-Guide' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Specs---Icons' transform='translate(-933 -731)' fill='%2382BC00' fill-rule='nonzero'%3E%3Cpath d='M964.221 758v-12.926h-5.84c0-2.042.495-3.797 1.484-5.265.99-1.469 2.441-2.554 4.356-3.256V731c-1.66.51-3.207 1.18-4.643 2.01a15.9 15.9 0 0 0-3.782 3.017 13.807 13.807 0 0 0-2.585 4.069c-.639 1.532-.958 3.191-.958 4.978V758h11.968zm-19.053 0v-12.926h-5.84c0-2.042.494-3.797 1.484-5.265.99-1.469 2.441-2.554 4.356-3.256V731c-1.66.51-3.207 1.18-4.643 2.01a15.9 15.9 0 0 0-3.782 3.017 13.807 13.807 0 0 0-2.585 4.069c-.639 1.532-.958 3.191-.958 4.978V758h11.968z' id='“'%3E%3C/path%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E") no-repeat 100% 100%;
      
      background-color: var(--color-accent);
      background-size: 50px 50px;
      width: 60px;
      height: 60px;
    }
    
    p {
      padding-top: 30px;
    }
  }
}

/* --------------------------------
Override tertiary button in hero's
-------------------------------- */
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

/* --------------------------------
Patch in calculator styles from Child Theme
-------------------------------- */
section.calculator {
  padding: var(--space-xl) 0;
  background-position: center;
  background-size:cover;
  background-repeat: no-repeat;
  
  @media (min-width: 64rem) {
    padding: var(--space-xxl) 0;
  }
  
  h2, h3, p, span, label {
    color: var(--color-contrast-higher) !important;
  }
  
  .button {
    width: fit-content !important;
  }
  
  .results_ticker {
    color: var(--color-primary) !important;
  }
  
  .calculator-section label {
    font-size: unset !important;
  }

  & > .container {
    background-color: var(--color-white);
    padding: var(--space-xl) var(--space-sm) var(--space-md);
    box-shadow: 0 20px 40px 0 rgba(0,0,0,0.1);
    
    @media (min-width: 48rem) {
      padding: var(--space-xl);
    }

    @media (min-width: 64rem) {
      padding: var(--space-xl) var(--space-xxl);
    }
  }
  
  .calculator .calculator-footer a {
    width: 100%;
    
    &:hover {
      background: var(--color-primary-light);
    }
    
    @media (min-width: 48rem) {
      width: 50%;
    }
  }
  
  .button-group__button label {
    border: 2px solid var(--color-primary) !important;
    color: var(--color-primary) !important;
    
    &:hover {
      background: var(--color-primary) !important;
    }
  }
  
  .button-group__button input:checked+label {
    background: var(--color-primary) !important;
    color: var(--color-contrast-lower) !important;
  }
  
  .button-group__button input:hover~label {
    background: var(--color-primary) !important;
    color: var(--color-contrast-lower) !important;
  }
  
  .button-group__button input:focus~label:after {
    border: none;
  }
  
  .calculator-section .slider-group-min,
  .calculator-section .slider-group-max {
    display: none;
  }
}

.calculator-layout-wide .calculator-body {
  grid-row-start: 1 !important;
  grid-row-end:3 !important
}

.calculator-layout-wide .calculator-header {
  grid-row-start: 1 !important;
  height: auto !important;
}

.calculator-layout-wide .calculator-footer {
  grid-row-start:2 !important;
  height: auto !important;
}

.calculator .calc-input {
  width: 100%;
  margin-top: 0 !important;
  padding: 12px 14px !important;
  border-radius: 3px;
}

.calculator .calculator-section .select-group select {
  border: 1px solid var(--color-contrast-low) !important;
  color: var(--color-primary) !important;

  appearance: none;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: right 1rem center;
  background-size: 1em;
}

.modal .calculator-section .input-group,
.calculator .calculator-section .input-group {
  border-bottom: none;
  border: 1px solid var(--color-contrast-low) !important;
  border-radius: 3px;
  color: var(--color-primary);
  display: flex;
}

.modal .calculator-section .input-group {
  max-width: fit-content;
}

.modal .calculator-section .input-group .pre,
.calculator .calculator-section .input-group .pre {
  border-right: 1px solid var(--color-contrast-low);
  height: 100%;
  line-height: var(--space-lg);
  padding: 0 15px !important;
  color: var(--color-primary) !important;
}

.modal .calculator-section .input-group input,
.calculator .calculator-section .input-group input {
  color: var(--color-primary) !important;
  border: none;
  line-height: var(--space-lg);
  padding: 0 10px !important;
}

.calculator .calculator-section label,
.calculator .calculator-section span {
  font-weight: 400;
  margin-bottom: var(--space-sm);
  display: block;
}

.calc_main_input_desc {
  display: flex;
}

.calculator .calculator-header h3,
.calculator .calculator-header .caculator-header__title {
  color: var(--color-primary);
  margin-bottom: var(--space-md);
}

.calculator.calculator-retirement-savings .calculator-header h3 {
  margin-bottom: var(--space-xs);
}

.calculator.calculator-retirement-savings .output-result-savings {
  margin-bottom: var(--space-sm);
}

.calculator .calculator-header .output-result {
  font-size: var(--text-xxl) !important;
  font-weight: bold !important;
  color: var(--color-primary) !important;
  
  @media (min-width: 48rem) {
    font-size: var(--text-xxxl) !important;
  }
  
  @media (min-width: 64rem) {
    font-size: var(--text-xxxxl) !important;
  }
}

.calculator-saving-compounding .calculator-body .calculator-section:nth-child(4),
.calculator-investment .calculator-body .calculator-section:nth-child(4),
.calculator-mortgage-payment .calculator-body .calculator-section:nth-child(3),
.calculator-retirement-savings .calculator-body .calculator-section:nth-child(3) {
  clear: both;
}

section.calculator[data-theme="bg-2"] {
  h2, h3, p, span, label, legend {
    color: var(--color-contrast-lower) !important;
  }
  
  .results_ticker {
    color: var(--color-bg) !important;
  }
  
  .input-group .pre,
  .input-group input,
  .select-group select {
    color: var(--color-bg) !important;
  }
  
  .calculator-header div.output-result {
    color: var(--color-bg) !important;
  }
  
  .button {
    background: var(--color-bg);
    color: var(--color-contrast-higher);
    
    &:hover {
      background: var(--color-primary-light);
    }
  }
  
  .button-group__button label {
    border: 2px solid var(--color-bg) !important;
    color: var(--color-bg) !important;
    
    &:hover {
      background: var(--color-bg) !important;
    }
  }
  
  .button-group__button input:checked+label {
    background: var(--color-bg) !important;
    color: var(--color-contrast-higher) !important;
  }
  
  .button-group__button input:hover~label {
    background: var(--color-bg) !important;
    color: var(--color-contrast-higher) !important;
  }
  
  .button-group__button input:focus~label:after {
    border: none;
  }
  
  .calculator-section .slider-group input[type=range]::-webkit-slider-thumb {
    background-color:var(--color-bg) !important;
  }
}
</style>
