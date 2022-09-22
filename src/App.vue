<template>
  <div>
    <div class="bloomcu-design">
      <div v-if="!sidebarCollapsed" class="siderail">
        <!-- Top -->
        <div class="siderail-top">
          <div v-if="store.loading" class="siderail-item">
            <IconLoading/>
          </div>
          
          <div v-else class="siderail-item">
            <button 
              @click="toggleMenu('MainMenu')" 
              class="siderail-item__button" 
              :class="activeMenu === 'MainMenu' ? 'siderail-item__button--active' : ''"
              style="display: flex; flex-direction: column; align-items: center;"
            >
              <svg width="24" height="24" viewBox="0 0 24 24"><g stroke-linecap="round" fill="none" stroke="currentColor" stroke-linejoin="round"><line x1="1" y1="12" x2="23" y2="12"></line><line x1="1" y1="5" x2="23" y2="5"></line><line x1="1" y1="19" x2="23" y2="19"></line></g></svg>
              <!-- <span style="font-size: 13px;">Menu</span> -->
            </button>
          </div>
        </div>
          
        <!-- Middle -->
        <div class="siderail-middle" v-if="store.design">
          <div v-if="store.mode === 'edit'">
            <!-- Colors -->
            <div class="siderail-item">
              <button @click="toggleMenu('ColorsMenu')" type="button" class="siderail-item__button" :class="activeMenu === 'ColorsMenu' ? 'siderail-item__button--active' : ''">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round">
                    <path data-cap="butt" d="M3.41,12.017l10.607,7.778 c0.781,0.781,3.155-0.327,5.303-2.475s3.256-4.522,2.475-5.303L14.017,1.41"></path><ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -2.195 8.1276)" cx="8.713" cy="6.713" rx="7.5" ry="3"></ellipse><path d="M1,20 c0-1.105,2-4,2-4s2,2.895,2,4s-0.895,2-2,2S1,21.105,1,20z"></path><path d="M14,11h4 c2.209,0,4-1.791,4-4c0-2.209-1.791-4-4-4h-2.817"></path>
                  </g>
                </svg>
              </button>
            </div>
            
            <!-- Fonts -->
            <div class="siderail-item">
              <button @click="toggleMenu('TypographyMenu')" type="button" class="siderail-item__button" :class="activeMenu === 'TypographyMenu' ? 'siderail-item__button--active' : ''">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round">
                    <polyline points="1,5 1,3 17,3 17,5 "></polyline><line x1="9" y1="3" x2="9" y2="20"></line><line x1="5" y1="20" x2="12" y2="20"></line><polyline points=" 13,11 13,10 23,10 23,11 "></polyline><line x1="18" y1="10" x2="18" y2="20"></line><line x1="16" y1="20" x2="20" y2="20"></line>
                  </g>
                </svg>
              </button>
            </div>
            
            <!-- Buttons -->
            <div class="siderail-item">
              <button @click="toggleMenu('ButtonsMenu')" type="button" class="siderail-item__button" :class="activeMenu === 'ButtonsMenu' ? 'siderail-item__button--active' : ''">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round"><polyline data-cap="butt" points="8.333,14 1,14 1,1 23,1 23,14 20,14 "></polyline><line data-cap="butt" x1="13" y1="14" x2="19" y2="20"></line><polygon points=" 6,7 10,19 13,14 18,11 "></polygon>
                  </g>
                </svg>
              </button>
            </div>
          </div>
          
          <div v-if="store.mode === 'view' || store.mode === 'edit'" >
            <!-- Mini style guide -->
            <div class="siderail-item">
              <button @click="toggleMenu('StyleGuide')" type="button" class="siderail-item__button" :class="activeMenu === 'StyleGuide' ? 'siderail-item__button--active' : ''">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <g stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" stroke-linejoin="round">
                    <line x1="12" y1="1" x2="12" y2="3"></line><line data-cap="butt" x1="8" y1="17" x2="6" y2="23"></line><line data-cap="butt" x1="18" y1="23" x2="16" y2="17"></line><line data-cap="butt" x1="7" y1="20" x2="17" y2="20"></line><rect x="4" y="3" width="16" height="14"></rect>
                  </g>
                </svg>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Bottom -->
        <div class="siderail-bottom" style="display: flex; flex-direction: column; align-items: center;"> 
          <div class="siderail-item padding-bottom-sm">
            <ToggleMode/>
          </div>
          
          <!-- Collapse sidebar -->
          <div class="siderail-item">
            <button @click="collapseSidebar()" :disabled="activeMenu !== ''" class="siderail-item__button">
              <svg width="24" height="24" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round"><polyline points="7,2 17,12 7,22 " transform="translate(0, 0)"></polyline></g></svg>
            </button>
          </div>
              
          <!-- Disable plugin -->
          <!-- <div class="siderail-item">
            <button @click="toggleDisablePlugin()" class="siderail-item__button">
              <svg width="24" height="24" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round"><path d="M17,4.3c3,1.7,5,5,5,8.7 c0,5.5-4.5,10-10,10S2,18.5,2,13c0-3.7,2-6.9,5-8.7"></path><line x1="12" y1="1" x2="12" y2="8"></line></g></svg>
            </button>
          </div> -->
        </div>
      </div>
      
      <!-- Menus -->
      <component :is="activeMenu"/>
    </div>
    
    <!-- Toggle sidebar -->
    <div v-if="sidebarCollapsed" class="sidebar-toggle" style="position: fixed; bottom: 30px; right: 0; z-index: 100;">
      <button @click="expandSidebar()" class="reset" style="display: flex; flex-direction: row; align-items: center; background: #fff; padding: 7px 14px 7px 4px; border: 1px solid #eaeaeb; border-right: 0; border-radius: 5px 0 0 5px; cursor: pointer;">
        <svg class="flip-x" width="24" height="24" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round"><polyline points="7,2 17,12 7,22 " transform="translate(0, 0)"></polyline></g></svg>
      </button>
    </div>
    
    <!-- Variables -->
    <div v-if="store.design">
      <DesignFonts :variables="store.variables"/>
      <DesignStyles :variables="store.variables"/>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'

import MainMenu from '@/components/menus/MainMenu.vue'
import ColorsMenu from '@/components/menus/ColorsMenu.vue'
import TypographyMenu from '@/components/menus/TypographyMenu.vue'
import ButtonsMenu from '@/components/menus/ButtonsMenu.vue'
import StyleGuide from '@/components/menus/StyleGuide.vue'

export default defineComponent({
    components: {
      MainMenu,
      ColorsMenu,
      TypographyMenu,
      ButtonsMenu,
      StyleGuide,
    }
})    
</script>

<script setup>
import { ref, onMounted } from 'vue'
import { debounce } from '@/composables/useDebounce'
import { useDesignStore } from '@/store/useDesignStore'
import { useUserStore } from '@/store/useUserStore'

import IconLoading from '@/components/IconLoading.vue'
import DesignFonts from '@/components/DesignFonts.vue'
import DesignStyles from '@/components/DesignStyles.vue'
import ToggleMode from '@/components/toggles/ToggleMode.vue'

const props = defineProps({
  design: { 
    type: String,
  },
  mode: {
    type: String,
    default: 'view',
  },
  user_name: {
    type: String,
  },
  user_email: {
    type: String,
  }
})

const store = useDesignStore()
const user = useUserStore()
const activeMenu = ref('')
const sidebarCollapsed = ref(getCookie('design_plugin_sidebar_collapsed'))

const toggleMenu = (menu) => {
  activeMenu.value = activeMenu.value === menu ? '' : menu
}

const toggleDisablePlugin = () => {
  document.cookie = 'design_plugin_disabled=true; path=/;'
  let path = window.location.href.split('?')[0]
  window.location = path
}

const collapseSidebar = () => {
  document.body.classList.remove('design-plugin-enabled');
  sidebarCollapsed.value = true
  createCookie('design_plugin_sidebar_collapsed', true, 30)
}

const expandSidebar = () => {
  document.body.classList.add('design-plugin-enabled');
  sidebarCollapsed.value = false
  eraseCookie('design_plugin_sidebar_collapsed')
}

const updateDesign = debounce(() => {
  store.update()
}, 3000)

store.$subscribe((mutation, state) => {
  if (!['loading', 'design', 'designs'].includes(mutation.events.key)) {
    updateDesign()
  }
})

onMounted(() => {
  if (props.design) {
    store.show(props.design)
      // TODO: Clean this up
      .then(() => {
        if (store.variables.font_primary.source === 'upload') {
          activeFontsSource.value = 'upload'
        }
      })
  }
  
  if (props.user_name && props.user_email) {
    user.init(props.user_name, props.user_email)
  }
  
  if (window.screen.width <= 1024) {
    sidebarCollapse()
  }
})

// Cookie utilities
function createCookie(name, value, days) {
  var expires = ""
  if (days) {
    var date = new Date()
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000))
    expires = "; expires=" + date.toUTCString()
  }
  document.cookie = name + "=" + (value || "") + expires + "; path=/"
}

function getCookie(name) {
  var nameEQ = name + "="
  var ca = document.cookie.split(';')
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i]
    while (c.charAt(0) == ' ') c = c.substring(1, c.length)
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length)
  }
  return null
}

function eraseCookie(name) {
  createCookie(name,"",-1)
}
</script>

<style lang="scss">

/* --------------------------------
Body
-------------------------------- */
body.design-plugin-enabled {
  padding-right: 65px;
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
  font-weight: normal;
  color: #313135;
  
  button, input, span {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";    
    font-weight: normal;
  }
  
  h1, .h1, h2, .h2, h3, .h3, h4, .h4 {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";  
    font-weight: normal;
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
    z-index: 100;
    
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    
    width: 64px;
    height: 100vh;
    padding: 20px 12px 20px 12px;
    border-left: 1px solid #eaeaeb;
    background: #fff;
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
    width: 44px;
    height: 44px;
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
    position: fixed;
    width: 100%;
    max-width: 460px;
    max-height: 96vh;
    overflow: auto;
    
    top: 50%;
    right: 74px;
    transform: translate(0, -50%);

    border-radius: 7px;
    background: #fff;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 100;
    
    // Hide scrollbar
    // -ms-overflow-style: none; // IE and Edge
    // scrollbar-width: none; // Firefox
    // &::-webkit-scrollbar {
    //     display: none; // Chrome, Safari and Opera
    // }
    
    &__header {
      border-bottom: 1px solid #e3e2e9;
      padding: 20px;
    }
    
    &__body {
      height: 100%;
    }
    
    &__section {
      width: 100%;
      padding: 20px;
      border-bottom: 1px solid #e3e2e9;
      
      &:last-child {
        border-bottom: 0;
      }
    }
  }
  
  .siderail-menu-main {
    top: 20px;
    transform: translate(0, 0);
  }
  
  /* --------------------------------
  Card
  -------------------------------- */
  .card {
    border: 1px solid #d6d7d7;
    border-radius: .5em;
    padding: 1.125rem;
    background: #ffffff;
    
    &--dark {
      border: none;
      background-color: #f4f5f5;
      box-shadow: none;
      
      &:hover {
        box-shadow: var(--shadow-sm);
      }
    }
  }

  .card-header {
    border-radius: .5em;
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

    padding: 0 0 0 10px;
    background-color: #fff;
    border-radius: 5px;
    border: 1px solid #d7d7da;

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

/* --------------------------------
Styleguide
-------------------------------- */
.styleguide {
  position: fixed;
  top: 0;
  right: 30px;
  width: 100%;
  height: 100%;
  z-index: 90;
  
  &__content {
    background: var(--color-bg);
  }
}
</style>
