<template>
  <div class="siderail-menu" style="margin-right: 70px;">
    <div class="siderail-menu__inner" style="height: 90vh; padding-bottom: 60px;">
      <div class="siderail-menu__section" style="width: auto;">
        <p style="font-size: 18px;" class="font-bold">Button styles</p>
      </div>
         
      <!-- Primary button text color -->
      <div class="siderail-menu__section" style="width: 100%;">
        <div style="width: 100%;">
          <p class="margin-bottom-sm" style="font-size: 18px;">Primary button text color</p>
          <div class="flex gap-sm items-center">
            <div class="select" style="width: 300px;">
              <select v-model="store.variables.btn_primary_text_color" name="heading" id="heading" class="select_input form-control" style="width: 300px;">
                <option 
                  v-for="color in [
                    { name: 'Primary', hex: store.variables.color_primary },
                    { name: 'Accent', hex: store.variables.color_accent },
                    { name: 'Text', hex: store.variables.color_contrast_higher },
                    { name: 'Background (Default)', hex: store.variables.color_white },
                  ]" 
                  :key="color.name" 
                  :value="color.hex" 
                  :selected="store.variables.btn_primary_text_color === color.hex"
                >
                  {{ color.name }}
                </option>
              </select>
              <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
            </div>
            <a href="#" class="btn btn--primary" style="width: 200px;">Primary</a>
          </div>
        </div>
      </div>
      
      <!-- Secondary button text color -->
      <div class="siderail-menu__section" style="width: 100%;">
        <div style="width: 100%;">
          <p class="margin-bottom-sm" style="font-size: 18px;">Secondary button text color</p>
          <div class="flex gap-sm items-center">
            <div class="select" style="width: 300px;">
              <select v-model="store.variables.btn_secondary_text_color" name="heading" id="heading" class="select_input form-control" style="width: 300px;">
                <option 
                  v-for="color in [
                    { name: 'Primary', hex: store.variables.color_primary },
                    { name: 'Accent', hex: store.variables.color_accent },
                    { name: 'Text', hex: store.variables.color_contrast_higher },
                    { name: 'Background (Default)', hex: store.variables.color_white },
                  ]" 
                  :key="color.name" 
                  :value="color.hex" 
                  :selected="store.variables.btn_secondary_text_color === color.hex"
                >
                  {{ color.name }}
                </option>
              </select>
              <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
            </div>
            <a href="#" class="btn btn--secondary" style="width: 200px;">Secondary</a>
          </div>
        </div>
      </div>
      
      <!-- Tertiary button text color -->
      <div class="siderail-menu__section" style="width: 100%;">
        <div style="width: 100%;">
          <p class="margin-bottom-sm" style="font-size: 18px;">Tertiary button text color</p>
          <div class="flex gap-sm items-center">
            <div class="select" style="width: 300px;">
              <select v-model="store.variables.btn_tertiary_text_color" name="heading" id="heading" class="select_input form-control" style="width: 300px;">
                <option 
                  v-for="color in [
                    { name: 'Primary', hex: store.variables.color_primary },
                    { name: 'Accent', hex: store.variables.color_accent },
                    { name: 'Text (Default)', hex: store.variables.color_contrast_higher },
                    { name: 'Background', hex: store.variables.color_white },
                  ]" 
                  :key="color.name" 
                  :value="color.hex" 
                  :selected="store.variables.btn_tertiary_text_color === color.hex"
                >
                  {{ color.name }}
                </option>
              </select>
              <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
            </div>
            <a href="#" class="btn btn--tertiary" style="width: 200px;">Tertiary</a>
          </div>
        </div>
      </div>

      <!-- Buttons radius -->
      <div class="siderail-menu__section" style="width: 100%;">
        <p style="width: 260px; margin-right: 20px; font-size: 18px;">Radius</p>
        <fieldset style="width: 100%;">
          <div class="slider slider--input gap-sm">
            <div class="slider__range">
              <input v-model="store.variables.btn_radius" class="slider__input" type="range" name="sliderValue" min="0" max="3" step="0.05">
            </div>
            <div class="slider__value">
              <input v-model="store.variables.btn_radius" class="form-control text-sm text-center width-xl" type="text">
            </div>
          </div>
        </fieldset>
      </div>
      
      <!-- Buttons y padding -->
      <div class="siderail-menu__section" style="width: 100%;">
        <p style="width: 260px; margin-right: 20px; font-size: 18px;">Vertical padding</p>
        <fieldset style="width: 100%;">
          <div class="slider slider--input gap-sm">
            <div class="slider__range">
              <input v-model="store.variables.btn_padding_y" class="slider__input" type="range" name="sliderValue" min="0.2" max="2" step="0.02">
            </div>
            <div class="slider__value">
              <input v-model="store.variables.btn_padding_y" class="form-control text-sm text-center width-xl" type="text">
            </div>
          </div>
        </fieldset>
      </div>
      
      <!-- Buttons x padding -->
      <div class="siderail-menu__section" style="width: 100%;">
        <p style="width: 260px; margin-right: 20px; font-size: 18px;">Horizontal padding</p>
        <fieldset style="width: 100%;">
          <div class="slider slider--input gap-sm">
            <div class="slider__range">
              <input v-model="store.variables.btn_padding_x" class="slider__input" type="range" name="sliderValue" min="0.5" max="3" step="0.02">
            </div>
            <div class="slider__value">
              <input v-model="store.variables.btn_padding_x" class="form-control text-sm text-center width-xl" type="text">
            </div>
          </div>
        </fieldset>
      </div>
      
      <!-- Buttons text transform -->
      <div class="siderail-menu__section" style="width: 100%;">
        <p style="width: 260px; margin-right: 20px; font-size: 18px;">Text transform</p>
        <div class="select">
          <select v-model="store.variables.btn_text_transform" name="heading" id="heading" class="select_input form-control width-100%">
            <option 
              v-for="transform in [
                {label: 'None', value: 'none'},
                {label: 'Uppercase', value: 'uppercase'}
              ]" 
              :key="transform.value" 
              :value="transform.value" 
              :selected="store.variables.btn_text_transform === transform.value"
            >
              {{ transform.label }}
            </option>
          </select>
          <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useDesignStore } from '@/store/useDesignStore'

const store = useDesignStore()
</script>
