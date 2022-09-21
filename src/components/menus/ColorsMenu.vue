<template>
  <div class="siderail-menu" style="position: absolute; top: -96px;">
    <div class="siderail-menu__section" style="width: auto;">
      <p style="font-size: 18px;" class="font-bold">Color palette</p>
    </div>
    <div class="siderail-menu__section">
      <p style="width: 200px; font-size: 18px;">Primary</p>
      <div class="input-group">
        <input v-model="store.variables.color_primary" class="form-control" style="width: 160px;" type="text">
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
      <p style="width: 200px; font-size: 18px;">Accent</p>
      <div class="input-group">
        <input v-model="store.variables.color_accent" class="form-control" style="width: 160px;" type="text">
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
      <p style="width: 200px; font-size: 18px;">Text</p>
      <div class="input-group">
        <input v-model="store.variables.color_contrast_higher" class="form-control" style="width: 160px;" type="text">
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
      <p style="width: 200px; font-size: 18px;">Background</p>
      <div class="input-group">
        <input v-model="store.variables.color_background" class="form-control" style="width: 160px;" type="text">
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
</template>

<script setup>
import { useDesignStore } from '@/store/useDesignStore'
import { ColorPicker } from 'vue3-colorpicker'

const store = useDesignStore()
</script>

<style lang="scss">
@import "vue3-colorpicker/style.css";
</style>
