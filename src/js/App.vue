<template>
  <div>
    <!-- <router-view></router-view> -->
        
    <div class="siderail">
      <div class="siderail__inner" style="padding-top: 80px;">
        <div class="siderail-item">
          <button type="button" class="siderail-item__button siderail-item__button--active">
            <svg width="24" height="24" viewBox="0 0 24 24">
              <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round">
                <path data-cap="butt" d="M3.41,12.017l10.607,7.778 c0.781,0.781,3.155-0.327,5.303-2.475s3.256-4.522,2.475-5.303L14.017,1.41"></path><ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -2.195 8.1276)" cx="8.713" cy="6.713" rx="7.5" ry="3"></ellipse><path d="M1,20 c0-1.105,2-4,2-4s2,2.895,2,4s-0.895,2-2,2S1,21.105,1,20z"></path><path d="M14,11h4 c2.209,0,4-1.791,4-4c0-2.209-1.791-4-4-4h-2.817"></path>
              </g>
            </svg>
          </button>
          
          <div class="siderail-menu">
            <div class="siderail-menu__section">
              <p style="font-size: 18px; width: 200px;" class="font-bold">Primary</p>
              <div class="input-group">
                <input v-model="primary" class="form-control" style="width: 160px;" type="text">
                <div class="input-group__tag">
                  <div :style="{'background-color': primary}" style="width: 20px; height: 20px; border-radius: 100px; cursor: pointer;"></div>
                </div>
              </div>
  
            	<!-- <div style="position: relative;"> -->
                <!-- <v-swatches v-model="primary"></v-swatches> -->
                <!-- <input-color-picker  v-model="primary" /> -->
            		<!-- <chrome-picker :value="colors" @input="updateFromPicker" v-if="displayPicker" /> -->
                <!-- <color-picker :value="primary" @input="updateFromPicker" style="position: absolute; top: -14px; left: 5px;"/> -->
            	<!-- </div> -->
            </div>
            
            <div class="siderail-menu__section">
              <p style="font-size: 18px; width: 200px;" class="font-bold">Accent</p>
              <div class="input-group">
                <input v-model="accent" class="form-control" style="width: 160px;" type="text">
                <div class="input-group__tag">
                  <div :style="{'background-color': accent}" style="width: 20px; height: 20px; border-radius: 100px; cursor: pointer;"></div>
                </div>
              </div>
            </div>
            
            <div class="siderail-menu__section">
              <p style="font-size: 18px; width: 200px;" class="font-bold">Text</p>
              <div class="input-group">
                <input v-model="text" class="form-control" style="width: 160px;" type="text">
                <div class="input-group__tag">
                  <div :style="{'background-color': text}" style="width: 20px; height: 20px; border-radius: 100px; cursor: pointer;"></div>
                </div>
              </div>
            </div>
            
            <div class="siderail-menu__section">
              <p style="font-size: 18px; width: 200px;" class="font-bold">Background</p>
              <div class="input-group">
                <input v-model="background" class="form-control" style="width: 160px;" type="text">
                <div class="input-group__tag">
                  <div :style="{'background-color': background}" style="width: 20px; height: 20px; border-radius: 100px; cursor: pointer;"></div>
                </div>
              </div>
            </div>
            
            <div class="siderail-menu__section">
              <p style="font-size: 18px; width: 200px;" class="font-bold">Background Medium</p>
              <div class="input-group">
                <input v-model="backgroundMedium" class="form-control" style="width: 160px;" type="text">
                <div class="input-group__tag">
                  <div :style="{'background-color': backgroundMedium}" style="width: 20px; height: 20px; border-radius: 100px; cursor: pointer;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="siderail-item">
          <button type="button" class="siderail-item__button">
            <svg width="24" height="24" viewBox="0 0 24 24">
              <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round">
                <polyline points="1,5 1,3 17,3 17,5 "></polyline><line x1="9" y1="3" x2="9" y2="20"></line><line x1="5" y1="20" x2="12" y2="20"></line><polyline points=" 13,11 13,10 23,10 23,11 "></polyline><line x1="18" y1="10" x2="18" y2="20"></line><line x1="16" y1="20" x2="20" y2="20"></line>
              </g>
            </svg>
          </button>
        </div>
        
        <div class="siderail-item">
          <button type="button" class="siderail-item__button">
            <svg width="24" height="24" viewBox="0 0 24 24">
              <g stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" stroke-linejoin="round">
                <polyline data-cap="butt" points="1 20 6 14 10 18 17 10 23 17"></polyline><rect x="1" y="3" width="22" height="18"></rect><circle cx="9" cy="8" r="2"></circle>
              </g>
            </svg>
          </button>
        </div>
      </div>
    </div>
    
    <component :is="'style'">
      :root {
        --primary: {{ primary }}
      }
    </component>
  </div>
</template>

<script>
import VSwatches from 'vue-swatches'
import 'vue-swatches/dist/vue-swatches.css'
import { Chrome } from 'vue-color'
import InputColorPicker from "vue-native-color-picker";

export default {
    name: 'App',
    data() {
        return {
          primary: '#0065ff',
          accent: '#ff0000',
          text: '#000000',
          background: '#fafafa',
          backgroundMedium: '#d3d3d3',
        }
    },
    
    computed: {
      cssVariables() {
        return {
          '--primary': this.primary
        }
      }
    },
    
    methods: {
      updateFromPicker(color) {
        this.primary = color.hex
      }
    },
    
    mounted() {},
    
    components: {
      VSwatches,
      'color-picker': Chrome,
      InputColorPicker
    },
}
</script>

<style lang="scss">
h1 {
  color: var(--primary) !important;
}

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
    padding: 20px;
    border-bottom: 1px solid #e3e2e9;
  }
}

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

</style>
