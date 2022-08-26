<template>
  <div class="bloomcu-design">
    <div v-if="mode === 'edit'" class="siderail">
      <!-- Top menu -->
      <div class="siderail__top-menu">
        <IconLoading v-if="store.loading"/>
        <svg v-else width="24" height="24" viewBox="0 0 24 24">
          <g fill="currentColor">
            <path d="M22.707,6.293l-5-5c-0.391-0.391-1.023-0.391-1.414,0l-2.291,2.291l2.706,2.71l-1.415,1.413l-2.705-2.709 l-1.586,1.586l1.709,1.709l-1.414,1.414L9.588,7.998L8.002,9.584l2.709,2.709l-1.414,1.414l-2.709-2.709l-1.586,1.586l1.709,1.709 l-1.414,1.414l-1.709-1.709l-2.295,2.295c-0.391,0.391-0.391,1.023,0,1.414l5,5C6.488,22.902,6.744,23,7,23s0.512-0.098,0.707-0.293 l15-15C23.098,7.316,23.098,6.684,22.707,6.293z"></path> <path data-color="color-2" d="M4.672,10.086l5.414-5.414L6.707,1.293c-0.391-0.391-1.023-0.391-1.414,0l-4,4 c-0.391,0.391-0.391,1.023,0,1.414L4.672,10.086z"></path><path data-color="color-2" d="M21.98,16.804c-0.039-0.193-0.134-0.371-0.273-0.511l-2.379-2.379l-5.414,5.414l2.379,2.379 c0.14,0.14,0.317,0.235,0.511,0.273l5,1C21.869,22.994,21.935,23,22,23c0.263,0,0.518-0.104,0.707-0.293 c0.236-0.236,0.339-0.575,0.273-0.903L21.98,16.804z"></path>
          </g>
        </svg>
        <!-- <button v-else @click="toggleHero()" class="siderail-item__button" :class="activeMenu === 'hero' ? 'siderail-item__button--active' : ''">
          <svg width="24" height="24" viewBox="0 0 24 24"><g stroke-linecap="round" fill="none" stroke="currentColor" stroke-linejoin="round"><line x1="1" y1="12" x2="23" y2="12"></line><line x1="1" y1="5" x2="23" y2="5"></line><line x1="1" y1="19" x2="23" y2="19"></line></g></svg>
        </button>
        <div v-if="activeMenu === 'hero'" class="siderail-menu">
          <div class="siderail-menu__section">
            <div v-if="store.designs" class="text-component">
              <p class="font-bold">My Designs</p>
              <div
                v-for="design in store.designs" 
                :key="design.id" 
                class="card padding-xs text-sm"
              >
                {{ design.title }}
              </div>
            </div>
          </div>
        </div> -->
      </div>
      
      <!-- Design controls -->
      <div v-if="store.design">
        <!-- Colors -->
        <div class="siderail-item">
          <button @click="toggleMenu('colors')" type="button" class="siderail-item__button" :class="activeMenu === 'colors' ? 'siderail-item__button--active' : ''">
            <svg width="24" height="24" viewBox="0 0 24 24">
              <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round">
                <path data-cap="butt" d="M3.41,12.017l10.607,7.778 c0.781,0.781,3.155-0.327,5.303-2.475s3.256-4.522,2.475-5.303L14.017,1.41"></path><ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -2.195 8.1276)" cx="8.713" cy="6.713" rx="7.5" ry="3"></ellipse><path d="M1,20 c0-1.105,2-4,2-4s2,2.895,2,4s-0.895,2-2,2S1,21.105,1,20z"></path><path d="M14,11h4 c2.209,0,4-1.791,4-4c0-2.209-1.791-4-4-4h-2.817"></path>
              </g>
            </svg>
          </button>
          <div v-if="activeMenu === 'colors'" class="siderail-menu">
            <div class="siderail-menu__section">
              <p style="width: 200px;" class="font-bold">Primary</p>
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
              <p style="width: 200px;" class="font-bold">Accent</p>
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
              <p style="width: 200px;" class="font-bold">Text</p>
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
              <p style="width: 200px;" class="font-bold">Background</p>
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
            
            <!-- <div class="siderail-menu__section">
              <p style="width: 200px;" class="font-bold">Background Medium</p>
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
          <button @click="toggleMenu('typography')" type="button" class="siderail-item__button" :class="activeMenu === 'typography' ? 'siderail-item__button--active' : ''">
            <svg width="24" height="24" viewBox="0 0 24 24">
              <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round">
                <polyline points="1,5 1,3 17,3 17,5 "></polyline><line x1="9" y1="3" x2="9" y2="20"></line><line x1="5" y1="20" x2="12" y2="20"></line><polyline points=" 13,11 13,10 23,10 23,11 "></polyline><line x1="18" y1="10" x2="18" y2="20"></line><line x1="16" y1="20" x2="20" y2="20"></line>
              </g>
            </svg>
          </button>
          <div v-if="activeMenu === 'typography'" class="siderail-menu">
            <!-- Primary font -->
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
                <!-- Primary font -->
                <div class="select margin-bottom-xxs">
                    <select v-model="store.variables.font_primary" name="heading" id="heading" class="select_input form-control width-100%">
                      <option 
                        v-for="font in googleFonts" 
                        :key="font.family" 
                        :value="font.family" 
                        :selected="store.variables.font_primary === font.family"
                      >
                        {{ font.family }}
                      </option>
                    </select>
                    <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                </div>
                <div class="select">
                    <select v-model="store.variables.font_primary_weight" name="heading" id="heading" class="select_input form-control width-100%">
                      <option 
                        v-for="weight in getGoogleFontByFamily(store.variables.font_primary).variants" 
                        :key="weight" 
                        :value="weight" 
                        :selected="store.variables.font_primary_weight === weight"
                      >
                        {{ weight }}
                      </option>
                    </select>
                    <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                </div>
              </div>
            </div>
            
            <!-- Secondary font -->
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
                    <select v-model="store.variables.font_secondary" name="body" id="body" class="select_input form-control width-100%">
                      <option 
                        v-for="font in googleFonts" 
                        :key="font.family" 
                        :value="font.family" 
                        :selected="store.variables.font_secondary === font.family"
                      >
                        {{ font.family }}
                      </option>
                    </select>
                    <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                </div>
                <div class="select">
                    <select v-model="store.variables.font_secondary_weight" name="heading" id="heading" class="select_input form-control width-100%">
                      <option 
                        v-for="weight in getGoogleFontByFamily(store.variables.font_secondary).variants" 
                        :key="weight" 
                        :value="weight" 
                        :selected="store.variables.font_secondary_weight === weight"
                      >
                        {{ weight }}
                      </option>
                    </select>
                    <svg class="select__icon" aria-hidden="true" viewBox="0 0 16 16"><polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                </div>
              </div>
            </div>
            
            <!-- Text base size -->
            <div class="siderail-menu__section">
                <p style="width: 140px;" class="font-bold">Text Base Size</p>
                
                <fieldset>
                  <div class="slider slider--input gap-sm">
                    <div class="slider__range">
                      <input v-model="store.variables.text_base_size" class="slider__input" type="range" name="sliderValue" min="1" max="1.8" step="0.01">
                    </div>
                    <div class="slider__value">
                      <input v-model="store.variables.text_base_size" class="form-control text-sm text-center width-xl" type="text">
                      <!-- <span class="text-sm margin-left-xxxs">rem</span> -->
                    </div>
                  </div>
                  <small>Add guidelines here. Default is 1.3. Most sites use between 1 - 1.5.</small>
                </fieldset>
            </div>
          </div>
        </div>
        <!-- Buttons -->
        <div class="siderail-item">
          <button @click="toggleMenu('buttons')" type="button" class="siderail-item__button" :class="activeMenu === 'buttons' ? 'siderail-item__button--active' : ''">
            <svg width="24" height="24" viewBox="0 0 24 24">
              <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round"><polyline data-cap="butt" points="8.333,14 1,14 1,1 23,1 23,14 20,14 "></polyline><line data-cap="butt" x1="13" y1="14" x2="19" y2="20"></line><polygon points=" 6,7 10,19 13,14 18,11 "></polygon>
              </g>
            </svg>
          </button>
          <div v-if="activeMenu === 'buttons'" class="siderail-menu">
            <div class="siderail-menu__section">
              <div class="margin-right-lg">
                <p style="width: 260px;" class="font-bold">Button radius</p>
                
                <fieldset>
                  <div class="slider slider--input gap-sm">
                    <div class="slider__range">
                      <input v-model="store.variables.button_radius" class="slider__input" type="range" name="sliderValue" min="0" max="2" step="0.05">
                    </div>
                    <div class="slider__value">
                      <input v-model="store.variables.button_radius" class="form-control text-sm text-center width-xl" type="text">
                      <!-- <span class="text-sm margin-left-xxxs">em</span> -->
                    </div>
                  </div>
                </fieldset>
              </div>
              
              <div class="flex flex-column gap-sm">
                <a href="#" class="btn btn--primary">Primary Button</a>
                <a href="#" class="btn btn--secondary">Secondary Button</a>
                <a href="#" class="btn btn--tertiray">Tertiary Button</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Backgrounds -->
        <div class="siderail-item">
          <button @click="toggleMenu('backgrounds')" type="button" class="siderail-item__button" :class="activeMenu === 'backgrounds' ? 'siderail-item__button--active' : ''">
            <svg width="24" height="24" viewBox="0 0 24 24">
              <g stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" stroke-linejoin="round">
                <polyline data-cap="butt" points="1 20 6 14 10 18 17 10 23 17"></polyline><rect x="1" y="3" width="22" height="18"></rect><circle cx="9" cy="8" r="2"></circle>
              </g>
            </svg>
          </button>
          <div v-if="activeMenu === 'backgrounds'" class="siderail-menu">
            <div class="siderail-menu__section">
              <p style="width: 200px;" class="font-bold">Default Background</p>
              <div :style="{'background-color': store.variables.color_background}"  class="border radius-md width-xxxl height-xxl">
              </div>
            </div>
            
            <div class="siderail-menu__section">
              <p style="width: 200px;" class="font-bold">Medium Background</p>
              <div :style="{'background-color': store.variables.color_primary}" style="opacity: 0.05;" class="radius-md width-xxxl height-xxl"></div>
            </div>
            
            <div class="siderail-menu__section">
              <p style="width: 200px;" class="font-bold">Dark Background</p>
              <div :style="{'background-color': store.variables.color_primary}" class="radius-md width-xxxl height-xxl"></div>
            </div>
            
            <!-- <div class="siderail-menu__section">
              <p style="width: 200px;" class="font-bold">Custom Background 1</p>
            </div>
            
            <div class="siderail-menu__section">
              <p style="width: 200px;" class="font-bold">Custom Background 2</p>
            </div> -->
          </div>
        </div>
      </div>
      
      <!-- Bottom menu -->
      <div class="siderail__bottom-menu">
        <button @click="togglePower()" class="siderail-item__button">
          <svg width="24" height="24" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round"><path d="M17,4.3c3,1.7,5,5,5,8.7 c0,5.5-4.5,10-10,10S2,18.5,2,13c0-3.7,2-6.9,5-8.7"></path><line x1="12" y1="1" x2="12" y2="8"></line></g></svg>
        </button>
      </div>
    </div>
    
    <!-- Design variables -->
    <div v-if="store.design">
      <DesignFonts :variables="store.variables"/>
      <DesignStyles :variables="store.variables"/>
    </div>
  </div>
</template>

<style lang="scss">
@import "vue3-colorpicker/style.css";

/* --------------------------------
Vue Colorpicker
-------------------------------- */
.vc-color-wrap {
  margin: 0 !important;
}

/* --------------------------------
Plugin styles
-------------------------------- */
.bloomcu-design {
  /* --------------------------------
  Resets
  -------------------------------- */
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  font-size: 20px;
  color: #313135;
  
  h1, .h1, h2, .h2, h3, .h3, h4, .h4 {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";  
    color: #1c1c21;
    line-height: 1.2;
  }

  h1, .h1 {
    font-size: 41px;
  }

  h2, .h2 {
    font-size: 34px;
  }

  h3, .h3 {
    font-size: 28px;
  }

  h4, .h4 {
    font-size: 24px;
  }
  
  // .btn--primary, .btn--secondary, .btn--tertiary {
  // 
  // }
  // 
  // .btn--primary {
  // 
  // }
  
  .form-control {
    background: #fff;
  }
  
  /* --------------------------------
  Siderail
  -------------------------------- */
  .siderail {
    position: fixed;
    right: 0;
    top: 0;
    bottom: 0;
    z-index: 99;
    
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    
    width: 64px;
    height: 100vh;
    padding: 46px 12px 20px 12px;
    border-left: 1px solid #eaeaeb;
    background: #fff;
    
    &__top-menu {
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      height: 40px;
      // margin-bottom: 30px;
    }
    
    &__bottom-menu {}
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
      transition-property: transform;
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
    top: 0;
    right: 0;
    margin-right: 60px;
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

    padding: 0 18.5px;
    background-color: #fff;
    border-radius: 5px;
    border: 2px solid #e3e2e9;

    white-space: nowrap;
    color: #68667f;

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
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: none;
    background-color: #9966ff;
    box-shadow: var(--shadow-xs), var(--shadow-sm);
    cursor: -webkit-grab;
    cursor: grab;
    margin-top: calc((8px - 20px) * 0.5);
  }

  .slider__input:active::-webkit-slider-thumb {
    cursor: -webkit-grabbing;
    cursor: grabbing;
  }

  .slider__input::-moz-range-thumb {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: none;
    background-color: #9966ff;
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
    height: 8px;
    border-radius: 50em;
    background-image: linear-gradient(to right, #9966ff var(--slider-fill-value), var(--color-contrast-low) var(--slider-fill-value), var(--color-contrast-low) var(--slider-empty-value));
    margin-top: calc((20px - 8px) * 0.5);
  }

  .slider__input::-moz-range-track {
    height: 8px;
    border-radius: 50em;
    background-image: linear-gradient(to right, #9966ff var(--slider-fill-value), var(--color-contrast-low) var(--slider-fill-value), var(--color-contrast-low) var(--slider-empty-value));
  }

  .slider__input::-moz-focus-outer {
    border: 0;
  }

  .slider__input::-ms-tooltip {
    display: none;
  }

  .slider__input::-ms-thumb {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: none;
    background-color: #fff;
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
    height: 8px;
    border-radius: 50em;
    background-image: linear-gradient(to right, #9966ff var(--slider-fill-value), var(--color-contrast-low) var(--slider-fill-value), var(--color-contrast-low) var(--slider-empty-value));
    background-color: hsl(240deg, 1%, 60%);
    color: transparent;
    height: 8px;
  }

  .slider__value {
    display: flex;
    align-items: center;  
  }  
}
</style>

<script setup>
import { ref, onMounted } from 'vue'
import { debounce } from './composables/useDebounce'
import { useDesignStore } from './store/useDesignStore'
import { googleFonts, getGoogleFontByFamily } from './store/useGoogleFonts'
import { ColorPicker } from 'vue3-colorpicker'

import IconLoading from './components/IconLoading.vue'
import DesignFonts from './components/DesignFonts.vue'
import DesignStyles from './components/DesignStyles.vue'

const props = defineProps({
  design: { 
    type: String,
    required: true,
  },
  mode: {
    type: String,
    required: true,
  }
})

const activeMenu = ref('')
const store = useDesignStore()

const toggleHero = () => {
  toggleMenu('hero')
  
  if (!store.designs) {
    store.index()
  }
}

const toggleMenu = (menu) => {
  activeMenu.value = activeMenu.value === menu ? '' : menu
}

const togglePower = () => {
  document.cookie = 'design_plugin_disabled=true; path=/;'
}

const saveDesign = debounce(() => {
  store.update()
}, 3000)

store.$subscribe((mutation, state) => {
  if (!['loading', 'design', 'designs'].includes(mutation.events.key)) {
    saveDesign()
  }
})

onMounted(() => {
  // store.init()
  store.show(props.design)
})
</script>
