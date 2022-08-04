<template>
  <div>
    <h1 class="color">Hello</h1>
  </div>
</template>

<script setup>
import { ref } from 'vue'
const color = ref('red')

const yellow = ref('yellow')
const tan = ref('tan')
const red = ref('red')
const green = ref('green')

// export default {
//   data() {
//       return {
//         primary: '#0065ff',
//         accent: '#ff0000',
//         text: '#0065ff',
//         background: '#fafafa',
//         backgroundMedium: '#d3d3d3',
//       }
//   },
// }
</script>

<style lang="scss">
// :root {
//   --color-contrast-high: red !important;
//   --color-contrast-higher: green !important;  
// }

[data-theme] {
  --color-primary: v-bind(yellow) !important;
  --color-bg: v-bind(tan) !important;
  --color-contrast-high: v-bind(red) !important;
  --color-contrast-higher: v-bind(green) !important;
}

// [data-theme] {
//   --color-primary: yellow !important;
//   --color-bg: tan !important;
//   --color-contrast-high: red !important;
//   --color-contrast-higher: green !important;
// }

// Todo: These classes are not scoped to the theme [data-theme] 
// body {
//   --color-bg: tan !important;
// }

// section.calculator {
//   background-color: tan; // --color-bg
// }

// body {
//   --color-contrast-high: red !important;
// }

// h1, .h1, h2, .h2, h3, .h3, h4, .h4 {
//   --color-contrast-higher: green !important;  
// }

// a, .link {
//   --color-primary: yellow !important;
// }

</style>
