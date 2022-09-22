<template>
  <div class="siderail-menu">
    <header class="siderail-menu__header flex justify-between items-center width-auto">
      <p class="font-bold">Fonts</p>
      <div class="flex align-center">
        <button 
          @click="activeFontsSource = 'google-font'"
          class="reset text-sm border radius-full padding-y-xxs padding-x-sm cursor-pointer margin-right-xs"
          :class="activeFontsSource === 'google-font' ? 'border-opacity-0 color-white bg-black' : ''"
        >
          Google Fonts
        </button>
        <button 
          @click="activeFontsSource = 'upload'"
          class="reset text-sm border radius-full padding-y-xxs padding-x-sm cursor-pointer"
          :class="activeFontsSource === 'upload' ? 'border-opacity-0 color-white bg-black' : ''"
        >
          Upload
        </button>
      </div>
    </header>
    
    <div class="siderail-menu__body">
      
      <!-- Primary font -->
      <div class="siderail-menu__section">
        <p class="margin-bottom-xs">Heading font</p>
        <div v-if="activeFontsSource === 'google-font'">
          <!-- Primary Google font -->
          <div class="select margin-bottom-xxs">
            <select @change="onSelectPrimaryFont($event)" name="heading" id="heading" class="select_input form-control width-100%">
              <option value="" selected disabled hidden>Select a Google Font</option>
              <option 
                v-for="font in googleFonts" 
                :key="font.name" 
                :value="font.name" 
                :selected="store.variables.font_primary.name === font.name"
              >
                {{ font.name }}
              </option>
            </select>
            <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
          </div>
          <div v-if="store.variables.font_primary.source === 'google-font'" class="select">
            <!-- Primary Google font weight -->
            <select v-model="store.variables.font_primary.weight" name="heading" id="heading" class="select_input form-control width-100%">
              <option 
                v-for="weight in getGoogleFontByName(store.variables.font_primary.name).variants" 
                :key="weight" 
                :value="weight" 
                :selected="store.variables.font_primary.weight === weight"
              >
                {{ weight }}
              </option>
            </select>
            <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
          </div>
        </div>
        
        <!-- Primary font upload -->
        <div v-if="activeFontsSource === 'upload'">
          <AppUploadPrimaryFont/>
        </div>
      </div>

      <!-- Secondary font -->
      <div class="siderail-menu__section">
        <p class="margin-bottom-xs">Body font</p>
        <div v-if="activeFontsSource === 'google-font'">
          <div class="select margin-bottom-xxs">
            <!-- Secondary Google font -->
            <select @change="onSelectSecondaryFont($event)"  name="body" id="body" class="select_input form-control width-100%">
              <option value="" selected disabled hidden>Select a Google Font</option>
              <option 
                v-for="font in googleFonts" 
                :key="font.name" 
                :value="font.name" 
                :selected="store.variables.font_secondary.name === font.name"
              >
                {{ font.name }}
              </option>
            </select>
            <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
          </div>
          <div v-if="store.variables.font_secondary.source === 'google-font'" class="select">
            <!-- Secondary Google font weight -->
            <select v-model="store.variables.font_secondary.weight" name="heading" id="heading" class="select_input form-control width-100%">
              <option 
                v-for="weight in getGoogleFontByName(store.variables.font_secondary.name).variants" 
                :key="weight" 
                :value="weight" 
                :selected="store.variables.font_secondary.weight === weight"
              >
                {{ weight }}
              </option>
            </select>
            <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
          </div>
        </div>
        
        <!-- Secondary font upload -->
        <div v-if="activeFontsSource === 'upload'">
          <AppUploadSecondaryFont/>
        </div>
      </div>

      <!-- Buttons font -->
      <div class="siderail-menu__section">
        <p class="margin-bottom-xs">Buttons font</p>  
        <div v-if="activeFontsSource === 'google-font'">
          <div class="select margin-bottom-xxs">
            <!-- Buttons Google font -->
            <select @change="onSelectButtonsFont($event)"  name="body" id="body" class="select_input form-control width-100%">
              <option value="" selected disabled hidden>Select a Google Font</option>
              <option 
                v-for="font in googleFonts" 
                :key="font.name" 
                :value="font.name" 
                :selected="store.variables.font_buttons.name === font.name"
              >
                {{ font.name }}
              </option>
            </select>
            <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
          </div>
          <div v-if="store.variables.font_buttons.source === 'google-font'" class="select">
            <!-- Buttons Google font weight -->
            <select v-model="store.variables.font_buttons.weight" name="heading" id="heading" class="select_input form-control width-100%">
              <option 
                v-for="weight in getGoogleFontByName(store.variables.font_buttons.name).variants" 
                :key="weight" 
                :value="weight" 
                :selected="store.variables.font_buttons.weight === weight"
              >
                {{ weight }}
              </option>
            </select>
            <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
          </div>
        </div>
        
        <!-- Buttons font upload -->
        <div v-if="activeFontsSource === 'upload'">
          <AppUploadButtonsFont/>
        </div>
      </div>

      <!-- Text base size -->
      <div class="siderail-menu__section">
          <p class="margin-bottom-xs">Text base size</p>
          
          <fieldset>
            <div class="slider slider--input gap-sm margin-bottom-sm">
              <div class="slider__range margin-right-sm">
                <input v-model="store.variables.text_base_size" class="slider__input" type="range" name="sliderValue" min="1" max="1.8" step="0.01">
              </div>
              <div class="slider__value">
                <input v-model="store.variables.text_base_size" class="form-control text-sm text-center width-xl" type="text">
              </div>
            </div>
            <small>Most sites use between 1 - 1.5. Default is 1.3.</small>
          </fieldset>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useDesignStore } from '@/store/useDesignStore'
import { googleFonts, getGoogleFontByName } from '@/store/useGoogleFonts'

import AppUploadPrimaryFont from '@/components/AppUploadPrimaryFont.vue'
import AppUploadSecondaryFont from '@/components/AppUploadSecondaryFont.vue'
import AppUploadButtonsFont from '@/components/AppUploadButtonsFont.vue'

const store = useDesignStore()
const activeFontsSource = ref('google-font')

function onSelectPrimaryFont(e) {
  let font = getGoogleFontByName(e.target.value)
  
  store.variables.font_primary = {
    source: 'google-font',
    name: font.name,
    url: null,
    weight: '400',
  }
}

function onSelectSecondaryFont(e) {
  let font = getGoogleFontByName(e.target.value)
  
  store.variables.font_secondary = {
    source: 'google-font',
    name: font.name,
    url: null,
    weight: '400',
  }
}

function onSelectButtonsFont(e) {
  let font = getGoogleFontByName(e.target.value)
  
  store.variables.font_buttons = {
    source: 'google-font',
    name: font.name,
    url: null,
    weight: '400',
  }
}
</script>
