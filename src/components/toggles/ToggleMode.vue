<template>
  <ul class="radio-switch-vertical">
    <li v-if="ui.canEdit" @click="toggleEditMode()" class="radio-switch-vertical__item">
      <input class="radio-switch-vertical__input sr-only" type="radio" name="radio-switch-vertical-name" id="radio-1" :checked="ui.mode === 'edit'">
      <label class="radio-switch-vertical__label" for="radio-1">
        <svg class="icon icon--xs" height="16" width="16" viewBox="0 0 16 16"><g><path d="M8.1,3.5l-7.8,7.8C0.1,11.5,0,11.7,0,12v3c0,0.6,0.4,1,1,1h3c0.3,0,0.5-0.1,0.7-0.3l7.8-7.8L8.1,3.5z"></path> <path data-color="color-2" d="M15.7,3.3l-3-3c-0.4-0.4-1-0.4-1.4,0L9.5,2.1l4.4,4.4l1.8-1.8C16.1,4.3,16.1,3.7,15.7,3.3z"></path></g></svg>
      </label>
    </li>
    
    <li @click="toggleViewMode()" class="radio-switch-vertical__item">
      <input class="radio-switch-vertical__input sr-only" type="radio" name="radio-switch-vertical-name" id="radio-2" :checked="ui.mode === 'view'">
      <label class="radio-switch-vertical__label" for="radio-2">
        <svg class="icon icon--xs" height="16" width="16" viewBox="0 0 16 16"><g><path d="M8,14c4.707,0,7.744-5.284,7.871-5.508c0.171-0.304,0.172-0.676,0.001-0.98C15.746,7.287,12.731,2,8,2 C3.245,2,0.251,7.289,0.126,7.514c-0.169,0.303-0.168,0.672,0.002,0.975C0.254,8.713,3.269,14,8,14z M8,4 c2.839,0,5.036,2.835,5.818,4C13.034,9.166,10.837,12,8,12c-2.841,0-5.038-2.838-5.819-4.001C2.958,6.835,5.146,4,8,4z"></path> <circle data-color="color-2" cx="8" cy="8" r="2"></circle></g></svg>
      </label>
      <div aria-hidden="true" class="radio-switch-vertical__marker"></div>
    </li>

  </ul>
</template>

<script setup>
import { onMounted } from 'vue'
import { useDesignStore } from '@/store/useDesignStore'
import { useUIStore } from '@/store/useUIStore'
import { useUserStore } from '@/store/useUserStore'

const design = useDesignStore()
const user = useUserStore()
const ui = useUIStore()

design.$subscribe((mutation, state) => {
  setCanUserEdit()
})

onMounted(() => {
  setCanUserEdit()
})

function setCanUserEdit() {
  if (design.design) {
    if (design.design.designer_email === user.email) {
      ui.canEdit = true
    } else {
      ui.canEdit = false
      ui.mode = 'view'
    }  
  }
}

const toggleViewMode = () => {
  ui.mode = 'view'
  localStorage.setItem('design_plugin_mode', 'view')
  // document.cookie = 'design_plugin_mode=view; path=/;'
}

const toggleEditMode = () => {
  ui.mode = 'edit'
  localStorage.setItem('design_plugin_mode', 'edit')
  // document.cookie = 'design_plugin_mode=edit; path=/;'
}
</script>

<style lang="scss">
:root {
  --radio-switch-vertical-width: 80px;
  --radio-switch-vertical-height: 44px;
  --radio-switch-vertical-padding: 3px;
  --radio-switch-vertical-radius: 50em;
  --radio-switch-vertical-animation-duration: 0.2s;
}

.radio-switch-vertical {
  position: relative;
  display: inline-block; // flexbox fallback
  display: inline-flex;
  flex-direction: column;
  padding: var(--radio-switch-vertical-padding);
  border-radius: calc(var(--radio-switch-vertical-radius) * 1.4);
  border: 1px solid #dadadc;
  // background-color: var(--color-bg-darker);
}

.radio-switch-vertical__item {
  position: relative;
  display: inline-block; // flexbox fallback
  height: calc(var(--radio-switch-vertical-height) - 2 * var(--radio-switch-vertical-padding));
  width: calc(var(--radio-switch-vertical-width) * 0.5 - var(--radio-switch-vertical-padding));
}

.radio-switch-vertical__label {
  position: relative;
  z-index: 2;
  display: flex;
  height: 100%;
  align-items: center;
  justify-content: center;
  border-radius: var(--radio-switch-vertical-radius);
  cursor: pointer;
  font-size: var(--text-sm);
  user-select: none;
  transition: all var(--radio-switch-vertical-animation-duration);

  .radio-switch-vertical__input:checked ~ & {
    color: var(--color-white);
  }

  .radio-switch-vertical__input:focus ~ & { // focus effect in browsers not supporting :focus-within
    background-color: #fff;
  }
  
  // trick to detect :focus-within support
  // https://css-tricks.com/using-feature-detection-conditionals-and-groups-with-selectors
  :not(*):focus-within, 
  // reset focus style for browsers supporting :focus-within
  .radio-switch-vertical__input:focus ~ & {
    background-color: transparent;
  }
}

.radio-switch-vertical__marker {
  position: absolute;
  z-index: 1;
  top: -100%;
  left: 0;
  border-radius: var(--radio-switch-vertical-radius);
  background-color: #96f;
  height: calc(var(--radio-switch-vertical-height) - 2 * var(--radio-switch-vertical-padding));
  width: calc(var(--radio-switch-vertical-width) * 0.5 -  var(--radio-switch-vertical-padding));
  box-shadow: var(--shadow-md);
  transition: transform var(--radio-switch-vertical-animation-duration);

  .radio-switch-vertical__input:checked ~ & {
    transform: translateY(100%);
  }
}
</style>
