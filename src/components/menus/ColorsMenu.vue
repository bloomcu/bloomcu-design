<template>
  <div class="siderail-menu">
    <header class="siderail-menu__header">
      <p class="font-bold">Color palette</p>
    </header>
    
    <div class="siderail-menu__body">
      
      <div class="siderail-menu__section">
        <p class="margin-bottom-sm">Primary</p>
        <div class="input-group">
          <input v-model="store.variables.color_primary" class="form-control width-100%" type="text">
          <div class="input-group__tag">
            <!-- <div :style="{'background-color': colorPrimary}" style="width: 20px; height: 20px; border-radius: 100px; cursor: pointer;"></div> -->
            <color-picker 
              v-model:pureColor="store.variables.color_primary"
              shape="circle"
              format="hex"
              pickerType="chrome"
              useType="pure"
              lang="en"
              roundHistory
            />
          </div>
        </div>
      </div>
      
      <div class="siderail-menu__section">
        <p class="margin-bottom-sm">Accent</p>
        <div class="input-group">
          <input v-model="store.variables.color_accent" class="form-control width-100%" type="text">
          <div class="input-group__tag">
            <color-picker 
              v-model:pureColor="store.variables.color_accent"
              shape="circle"
              format="hex"
              pickerType="chrome"
              useType="pure"
              lang="en"
              roundHistory
            />
          </div>
        </div>
      </div>
      
      <div class="siderail-menu__section">
        <p class="margin-bottom-sm">Text</p>
        <div class="input-group">
          <input v-model="store.variables.color_contrast_higher" class="form-control width-100%" type="text">
          <div class="input-group__tag">
            <color-picker 
              v-model:pureColor="store.variables.color_contrast_higher"
              shape="circle"
              format="hex"
              pickerType="chrome"
              useType="pure"
              lang="en"
              roundHistory
            />
          </div>
        </div>
      </div>
      
      <div class="siderail-menu__section">
        <p class="margin-bottom-sm">Background</p>
        <div class="input-group">
          <input v-model="store.variables.color_background" class="form-control width-100%" type="text">
          <div class="input-group__tag">
            <color-picker 
              v-model:pureColor="store.variables.color_background"
              shape="circle"
              format="hex"
              pickerType="chrome"
              useType="pure"
              lang="en"
              roundHistory
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useDesignStore } from '@/store/useDesignStore'
import { ColorPicker } from 'vue3-colorpicker'

const store = useDesignStore()
</script>

<style lang="scss">
@import "vue3-colorpicker/style.css";

/* --------------------------------
Vue Colorpicker
-------------------------------- */
.vc-colorpicker {
  .vc-color-wrap,
  .vc-color-wrap.transparent {
    margin-right: 0 !important;
  }

  .vc-display {
    display: none !important;
  }  
}
</style>
