<template>
  <div>
    <div class="siderail">
      <div class="siderail__inner" style="padding-top: 80px;">
        <!-- Colors -->
        <div class="siderail-item">
          <button @click="activeMenu = 'colors'" type="button" class="siderail-item__button" :class="activeMenu === 'colors' ? 'siderail-item__button--active' : ''">
            <svg width="24" height="24" viewBox="0 0 24 24">
              <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round">
                <path data-cap="butt" d="M3.41,12.017l10.607,7.778 c0.781,0.781,3.155-0.327,5.303-2.475s3.256-4.522,2.475-5.303L14.017,1.41"></path><ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -2.195 8.1276)" cx="8.713" cy="6.713" rx="7.5" ry="3"></ellipse><path d="M1,20 c0-1.105,2-4,2-4s2,2.895,2,4s-0.895,2-2,2S1,21.105,1,20z"></path><path d="M14,11h4 c2.209,0,4-1.791,4-4c0-2.209-1.791-4-4-4h-2.817"></path>
              </g>
            </svg>
          </button>
          <div v-if="activeMenu === 'colors'" class="siderail-menu">
            <div class="siderail-menu__section">
              <p style="font-size: 18px; width: 200px;" class="font-bold">Primary</p>
              <div class="input-group">
                <input v-model="colorPrimary" class="form-control" style="width: 160px;" type="text">
                <div class="input-group__tag">
                  <!-- <div :style="{'background-color': colorPrimary}" style="width: 20px; height: 20px; border-radius: 100px; cursor: pointer;"></div> -->
                  <color-picker 
                    v-model:pureColor="colorPrimary"
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
              <p style="font-size: 18px; width: 200px;" class="font-bold">Accent</p>
              <div class="input-group">
                <input v-model="colorAccent" class="form-control" style="width: 160px;" type="text">
                <div class="input-group__tag">
                  <color-picker 
                    v-model:pureColor="colorAccent"
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
              <p style="font-size: 18px; width: 200px;" class="font-bold">Text</p>
              <div class="input-group">
                <input v-model="colorContrastHigher" class="form-control" style="width: 160px;" type="text">
                <div class="input-group__tag">
                  <color-picker 
                    v-model:pureColor="colorContrastHigher"
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
              <p style="font-size: 18px; width: 200px;" class="font-bold">Background</p>
              <div class="input-group">
                <input v-model="colorBackground" class="form-control" style="width: 160px;" type="text">
                <div class="input-group__tag">
                  <color-picker 
                    v-model:pureColor="colorBackground"
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
            
            <!-- <div class="siderail-menu__section">
              <p style="font-size: 18px; width: 200px;" class="font-bold">Background Medium</p>
              <div class="input-group">
                <input v-model="colorBackground" class="form-control" style="width: 160px;" type="text">
                <div class="input-group__tag">
                  <div :style="{'background-color': colorBackground}" style="width: 20px; height: 20px; border-radius: 100px; cursor: pointer;"></div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
        
        <!-- Typography -->
        <div class="siderail-item">
          <button @click="activeMenu = 'typography'" type="button" class="siderail-item__button" :class="activeMenu === 'typography' ? 'siderail-item__button--active' : ''">
            <svg width="24" height="24" viewBox="0 0 24 24">
              <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round">
                <polyline points="1,5 1,3 17,3 17,5 "></polyline><line x1="9" y1="3" x2="9" y2="20"></line><line x1="5" y1="20" x2="12" y2="20"></line><polyline points=" 13,11 13,10 23,10 23,11 "></polyline><line x1="18" y1="10" x2="18" y2="20"></line><line x1="16" y1="20" x2="20" y2="20"></line>
              </g>
            </svg>
          </button>
          <div v-if="activeMenu === 'typography'" class="siderail-menu">
            <div class="siderail-menu__section">
              <div style="width: 140px;">
                <p style="font-size: 18px;" class="font-bold">Heading Font</p>  
              </div>
              <div style="width: 400px;">
                <!-- <div class="flex align-center margin-bottom-xs">
                  <button class="reset text-sm padding-xxs margin-right-xs border radius-md text-decoration-none">Google Fonts</button>
                  <button class="reset text-sm padding-xxs cursor-pointer">Upload</button>
                </div> -->
                <!-- Primary font -->
                <div class="select margin-bottom-xxs">
                    <select v-model="fontPrimary" name="heading" id="heading" class="select_input form-control width-100%">
                      <option 
                        v-for="font in googleFonts" 
                        :key="font.family" 
                        :value="font.family" 
                        :selected="fontPrimary === font.family"
                      >
                        {{ font.family }}
                      </option>
                    </select>
                    <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                </div>
                <!-- Primary font weight -->
                <div class="select">
                    <select v-model="fontPrimaryWeight" name="heading" id="heading" class="select_input form-control width-100%">
                      <option 
                        v-for="weight in getFontByFamily(fontPrimary).variants" 
                        :key="weight" 
                        :value="weight" 
                        :selected="fontPrimaryWeight === weight"
                      >
                        {{ weight }}
                      </option>
                    </select>
                    <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                </div>
              </div>
            </div>
            
            <div class="siderail-menu__section">
              <div style="width: 140px;">
                <p style="font-size: 18px;" class="font-bold">Body Font</p>  
              </div>
              <div style="width: 400px;">
                <!-- <div class="flex align-center margin-bottom-xs">
                  <button class="reset text-sm padding-xxs margin-right-xs border radius-md text-decoration-none">Google Fonts</button>
                  <button class="reset text-sm padding-xxs cursor-pointer">Upload</button>
                </div> -->
                <!-- Secondary font -->
                <div class="select margin-bottom-xxs">
                    <select v-model="fontSecondary" name="body" id="body" class="select_input form-control width-100%">
                      <option 
                        v-for="font in googleFonts" 
                        :key="font.family" 
                        :value="font.family" 
                        :selected="fontPrimary === font.family"
                      >
                        {{ font.family }}
                      </option>
                    </select>
                    <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                </div>
                <!-- Secondary font weight -->
                <div class="select">
                    <select v-model="fontSecondaryWeight" name="heading" id="heading" class="select_input form-control width-100%">
                      <option 
                        v-for="weight in getFontByFamily(fontSecondary).variants" 
                        :key="weight" 
                        :value="weight" 
                        :selected="fontSecondaryWeight === weight"
                      >
                        {{ weight }}
                      </option>
                    </select>
                    <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Buttons -->
        <div class="siderail-item">
          <button @click="activeMenu = 'buttons'" type="button" class="siderail-item__button" :class="activeMenu === 'buttons' ? 'siderail-item__button--active' : ''">
            <svg width="24" height="24" viewBox="0 0 24 24">
              <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round"><polyline data-cap="butt" points="8.333,14 1,14 1,1 23,1 23,14 20,14 "></polyline><line data-cap="butt" x1="13" y1="14" x2="19" y2="20"></line><polygon points=" 6,7 10,19 13,14 18,11 "></polygon>
              </g>
            </svg>
          </button>
          <div v-if="activeMenu === 'buttons'" class="siderail-menu">
            <div class="siderail-menu__section">
              <div class="margin-right-lg">
                <p style="font-size: 18px; width: 260px;" class="font-bold">Button radius</p>
                
                <fieldset>
                  <div class="slider slider--input gap-sm">
                    <div class="slider__range">
                      <input v-model="buttonRadius" class="slider__input" type="range" name="sliderValue" min="0" max="2" step="0.05">
                    </div>
                    <div class="slider__value">
                      <input v-model="buttonRadius" class="form-control text-sm text-center width-xl" type="text">
                      <span class="text-sm margin-left-xxxs">em</span>
                    </div>
                  </div>
                </fieldset>
              </div>
              
              <div class="flex flex-column gap-sm">
                <a href="#" class="btn btn--primary">Primary Button</a>
                <a href="#" class="btn btn--accent">Secondary Button</a>
                <a href="#" class="btn btn--tertiray">Tertiary Button</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Backgrounds -->
        <div class="siderail-item">
          <button @click="activeMenu = 'backgrounds'" type="button" class="siderail-item__button" :class="activeMenu === 'backgrounds' ? 'siderail-item__button--active' : ''">
            <svg width="24" height="24" viewBox="0 0 24 24">
              <g stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" stroke-linejoin="round">
                <polyline data-cap="butt" points="1 20 6 14 10 18 17 10 23 17"></polyline><rect x="1" y="3" width="22" height="18"></rect><circle cx="9" cy="8" r="2"></circle>
              </g>
            </svg>
          </button>
          <div v-if="activeMenu === 'backgrounds'" class="siderail-menu">
            <div class="siderail-menu__section">
              <p style="font-size: 18px; width: 200px;" class="font-bold">Default Background</p>
              <div :style="{'background-color': colorBackground}"  class="border radius-md width-xxxl height-xxl">
              </div>
            </div>
            
            <div class="siderail-menu__section">
              <p style="font-size: 18px; width: 200px;" class="font-bold">Medium Background</p>
              <div :style="{'background-color': colorPrimary}" style="opacity: 0.05;" class="radius-md width-xxxl height-xxl"></div>
            </div>
            
            <div class="siderail-menu__section">
              <p style="font-size: 18px; width: 200px;" class="font-bold">Dark Background</p>
              <div :style="{'background-color': colorPrimary}" class="radius-md width-xxxl height-xxl"></div>
            </div>
            
            <!-- <div class="siderail-menu__section">
              <p style="font-size: 18px; width: 200px;" class="font-bold">Custom Background 1</p>
            </div>
            
            <div class="siderail-menu__section">
              <p style="font-size: 18px; width: 200px;" class="font-bold">Custom Background 2</p>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    
    <component :is="'style'">
      <!-- Root & Default theme -->
      :root, [data-theme="default"] {
        --color-white:           {{ colorWhite }};
        --color-black:           {{ colorBlack }};
        --color-primary:         {{ colorPrimary }};
        --color-accent:          {{ colorAccent }};
        --color-contrast-high:   {{ colorContrastHigher }};
        --color-contrast-higher: {{ colorContrastHigher }};
        --color-bg:              {{ colorBackground }};
        --font-primary:          {{ fontPrimary }};
        --font-secondary:        {{ fontSecondary }};
        --btn-radius:            {{ buttonRadius + 'em' }};
      }
      
      <!-- Theme 1 -->
      [data-theme="bg-1"] {        
        --color-bg: {{ colorPrimary + '0D' }};
      }
      
      <!-- Theme 2 -->
      [data-theme="bg-2"] {        
        --color-bg:              {{ colorPrimary }};
        --color-primary:         {{ colorWhite }};
        --color-contrast-lower:  {{ colorPrimary }};
        --color-contrast-high:   {{ colorWhite }};
        --color-contrast-higher: {{ colorWhite }};
      }
    </component>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link :href="`https://fonts.googleapis.com/css2?family=${fontPrimary}:wght@${fontPrimaryWeight}`" rel="stylesheet" />
    <link :href="`https://fonts.googleapis.com/css2?family=${fontSecondary}:wght@${fontSecondaryWeight}`" rel="stylesheet" />

  </div>
</template>

<script setup>
import { ref } from 'vue'
import { ColorPicker } from "vue3-colorpicker"
import useColors from "./store/useColors.js";
import useButtons from "./store/useButtons.js";
import useTypography from "./store/useTypography.js";

const { 
  colorWhite,
  colorBlack,
  colorPrimary, 
  colorAccent, 
  colorContrastHigh, 
  colorContrastHigher, 
  colorBackground,
  colorBackgroundMedium,
} = useColors()

const { 
  buttonRadius
} = useButtons()

const { 
  googleFonts, 
  fontPrimary,
  fontPrimaryWeight,
  fontSecondary,
  fontSecondaryWeight,
  getFontByFamily,
} = useTypography()

const activeMenu = ref('')
</script>

<style lang="scss">
@import "vue3-colorpicker/style.css";

/* --------------------------------
Base Theme Overrides
-------------------------------- */
h1, .h1, h2, .h2, h3, .h3, h4, .h4 {
  font-family: var(--font-primary);
  font-weight: unset;
}

body {
  font-family: var(--font-secondary);
}

.btn--primary, .btn--secondary, .btn--tertiary {
    border: 2px solid transparent;
}

.btn--tertiary {
  background-color: var(--color-accent);
  color: var(--color-white);
}

[data-theme="bg-2"] {
  .btn--primary {
    color: var(--color-contrast-lower);
  }
  
  .pre-title {
    color: var(--color-primary);
  }
}

// .btn--tertiary {
//   background-color: transparent;
//   border-color: var(--color-accent);
//   color: var(--color-accent);
// }

/* --------------------------------
Vue Colorpicker
-------------------------------- */
.vc-color-wrap {
  margin: 0 !important;
}

/* --------------------------------
Siderail
-------------------------------- */
.siderail {
  position: fixed;
  left: 0;
  top: 0;
  bottom: 0;
  z-index: 99;
  
  width: 64px;
  height: 100vh;
  padding-top: 30px;
  border-right: 1px solid #eaeaeb;
  background: #fff;
  
  &__inner {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    padding: 12px;
  }
}

.siderail-item {
  display: inline-flex;
  position: relative;
  margin-bottom: 8px;
}

.siderail-item__button {
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  width: 40px;
  height: 40px;
  border: 0;
  background: none;
  cursor: pointer;
  
  svg {
    display: block;
    stroke: #000;
    z-index: 1;
  }
  
  &:before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    opacity: 0;
    background-color: #9f9f9f;
    border-radius: 5px;
    transform: scale(.75);
    transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
    transition-duration: .15s;
  }
  
  &--active {
    svg {
      stroke: #712aff;
    }
    
    &:before {
      transform: scale(1);
      opacity: .17;
      background-color: #96f;
    }
    
    &:hover {
      &:before {
        opacity: .32 !important;
      }
    }
  }
  
  &:hover {
    &:before {
      transform: scale(1);
      opacity: .17;
    }
  }
}

.siderail-menu {
  position: absolute;
  margin-left: 60px;
  border-radius: 7px;
  background: #fff;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  z-index: 100;
  
  &__section {
    display: flex; 
    align-items: center; 
    gap: 10px 10px;
    width: max-content;
    padding: 20px;
    border-bottom: 1px solid #e3e2e9;
  }
}

/* --------------------------------
Input group
-------------------------------- */
.input-group {
  display: flex;

  > * {
    position: relative;
  }

  > *:not(:last-child):not(:first-child) {
    border-radius: 0;
  }

  > *:first-child {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;

    .select__input {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;
    }
  }

  > *:last-child {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;

    .select__input {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }
  }

  > *:focus, *:focus-within {
    z-index: 1;
  }
}

.input-group__tag {
  display: flex;
  align-items: center;

  padding: 0 var(--space-sm);
  background-color: var(--color-bg);
  border-radius: var(--radius-md);
  border: 2px solid #e3e2e9;

  white-space: nowrap;
  color: var(--color-contrast-medium);

  &:first-child {
    border-right-width: 0px;
  }

  &:last-child {
    border-left-width: 0px;
  }
}

/* --------------------------------
Select input
-------------------------------- */
.select {
  position: relative;
  width: 100%;
}

.select__icon {
  width: 16px;
  height: 16px;
  pointer-events: none;
  position: absolute;
  right: 20px;
  top: 50%;
  transform: translateY(-50%);
}

/* --------------------------------
Slider input
-------------------------------- */
:root {
  --slider-track-height: 8px;
  --slide-thumb-size: 20px;
}

.slider {
  position: relative;
  display: flex;
  align-items: center;
}

.slider__range {
  width: 100%;
  --slider-fill-value: 0%;
  --slider-empty-value: 100%;
}

.slider__input {
  display: block;
  -webkit-appearance: none;
  width: 100%;
  background: transparent;
}

.slider__input:focus {
  outline: none;
}

.slider__input::-webkit-slider-thumb {
  -webkit-appearance: none;
  width: var(--slide-thumb-size);
  height: var(--slide-thumb-size);
  border-radius: 50%;
  border: none;
  background-color: var(--color-primary);
  box-shadow: var(--shadow-xs), var(--shadow-sm);
  cursor: -webkit-grab;
  cursor: grab;
  margin-top: calc((var(--slider-track-height) - var(--slide-thumb-size)) * 0.5);
}

.slider__input:active::-webkit-slider-thumb {
  cursor: -webkit-grabbing;
  cursor: grabbing;
}

.slider__input::-moz-range-thumb {
  width: var(--slide-thumb-size);
  height: var(--slide-thumb-size);
  border-radius: 50%;
  border: none;
  background-color: var(--color-primary);
  box-shadow: var(--shadow-xs), var(--shadow-sm);
  cursor: grab;
}

.slider__input:active::-moz-range-thumb {
  cursor: grabbing;
}

.slider__input:active::-ms-thumb {
  cursor: grabbing;
}

.slider__input:focus::-webkit-slider-thumb {
  box-shadow: var(--shadow-xs), var(--shadow-sm), 0 0 0 3px hsla(var(--color-primary-h), var(--color-primary-s), var(--color-primary-l), 0.2), var(--shadow-md);
}

.slider__input:focus::-moz-range-thumb {
  box-shadow: var(--shadow-xs), var(--shadow-sm), 0 0 0 3px hsla(var(--color-primary-h), var(--color-primary-s), var(--color-primary-l), 0.2), var(--shadow-md);
}

.slider__input::-webkit-slider-runnable-track {
  height: var(--slider-track-height);
  border-radius: 50em;
  background-image: linear-gradient(to right, var(--color-primary) var(--slider-fill-value), var(--color-contrast-low) var(--slider-fill-value), var(--color-contrast-low) var(--slider-empty-value));
  margin-top: calc((var(--slide-thumb-size) - var(--slider-track-height)) * 0.5);
}

.slider__input::-moz-range-track {
  height: var(--slider-track-height);
  border-radius: 50em;
  background-image: linear-gradient(to right, var(--color-primary) var(--slider-fill-value), var(--color-contrast-low) var(--slider-fill-value), var(--color-contrast-low) var(--slider-empty-value));
}

.slider__input::-moz-focus-outer {
  border: 0;
}

.slider__input::-ms-tooltip {
  display: none;
}

.slider__input::-ms-thumb {
  width: var(--slide-thumb-size);
  height: var(--slide-thumb-size);
  border-radius: 50%;
  border: none;
  background-color: var(--color-white);
  box-shadow: var(--shadow-xs), var(--shadow-sm);
  cursor: grab;
  transform: translateY(0);
  background-color: white !important;
  box-shadow: inset 0 0 0 2px rgba(0, 0, 0, 0.1);
  height: 20px;
  width: 20px;
}

.slider__input:focus::-ms-thumb {
  box-shadow: inset 0 0 0 2px hsla(220deg, 90%, 56%, 0.2);
}

.slider__input::-ms-track {
  height: var(--slider-track-height);
  border-radius: 50em;
  background-image: linear-gradient(to right, var(--color-primary) var(--slider-fill-value), var(--color-contrast-low) var(--slider-fill-value), var(--color-contrast-low) var(--slider-empty-value));
  background-color: hsl(240deg, 1%, 60%);
  color: transparent;
  height: 8px;
}

.slider__value {
  display: flex;
  align-items: center;  
}
</style>
