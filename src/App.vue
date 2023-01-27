<template>
  <div>
    <div class="bloomcu-design">
      <div class="siderail" v-if="ui.collapsed === 'false'">
        <div class="siderail-top">
          <div v-if="store.loading" class="siderail-item">
            <IconLoading/>
          </div>
          
          <!-- Main menu -->
          <div v-else class="siderail-item">
            <button 
              @click="toggleMenu('MainMenu')" 
              class="siderail-item__button" 
              :class="ui.activeMenu === 'MainMenu' ? 'siderail-item__button--active' : ''"
            >
              <svg width="24" height="24" viewBox="0 0 24 24"><g stroke-linecap="round" fill="none" stroke="currentColor" stroke-linejoin="round"><line x1="1" y1="12" x2="23" y2="12"></line><line x1="1" y1="5" x2="23" y2="5"></line><line x1="1" y1="19" x2="23" y2="19"></line></g></svg>
              <span style="font-size: 13px;">Menu</span>
            </button>
          </div>
          
          <!-- Style guide -->
          <div v-if="store.design" class="siderail-item">
            <button 
              @click="toggleStyleGuide()" 
              class="siderail-item__button" 
              :class="ui.activeStyleGuide ? 'siderail-item__button--active' : ''"
            >
              <svg width="24" height="24" viewBox="0 0 24 24">
                <g stroke-linecap="round" fill="none" stroke="currentColor" stroke-linejoin="round">
                  <line x1="12" y1="1" x2="12" y2="3"></line><line data-cap="butt" x1="8" y1="17" x2="6" y2="23"></line><line data-cap="butt" x1="18" y1="23" x2="16" y2="17"></line><line data-cap="butt" x1="7" y1="20" x2="17" y2="20"></line><rect x="4" y="3" width="16" height="14"></rect>
                </g>
              </svg>
              <span style="font-size: 13px;">Style</span>
            </button>
          </div>
        </div>
        
        <div v-if="store.design" class="siderail-middle">
          <div v-if="ui.mode === 'edit'">
            <!-- Colors -->
            <div class="siderail-item">
              <button @click="toggleMenu('ColorsMenu')" type="button" class="siderail-item__button" :class="ui.activeMenu === 'ColorsMenu' ? 'siderail-item__button--active' : ''">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round">
                    <path data-cap="butt" d="M3.41,12.017l10.607,7.778 c0.781,0.781,3.155-0.327,5.303-2.475s3.256-4.522,2.475-5.303L14.017,1.41"></path><ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -2.195 8.1276)" cx="8.713" cy="6.713" rx="7.5" ry="3"></ellipse><path d="M1,20 c0-1.105,2-4,2-4s2,2.895,2,4s-0.895,2-2,2S1,21.105,1,20z"></path><path d="M14,11h4 c2.209,0,4-1.791,4-4c0-2.209-1.791-4-4-4h-2.817"></path>
                  </g>
                </svg>
                <span style="font-size: 13px;">Color</span>
              </button>
            </div>
            
            <!-- Fonts -->
            <div class="siderail-item">
              <button @click="toggleMenu('TypographyMenu')" type="button" class="siderail-item__button" :class="ui.activeMenu === 'TypographyMenu' ? 'siderail-item__button--active' : ''">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round">
                    <polyline points="1,5 1,3 17,3 17,5 "></polyline><line x1="9" y1="3" x2="9" y2="20"></line><line x1="5" y1="20" x2="12" y2="20"></line><polyline points=" 13,11 13,10 23,10 23,11 "></polyline><line x1="18" y1="10" x2="18" y2="20"></line><line x1="16" y1="20" x2="20" y2="20"></line>
                  </g>
                </svg>
                <span style="font-size: 13px;">Font</span>
              </button>
            </div>
            
            <!-- Buttons -->
            <div class="siderail-item">
              <button @click="toggleMenu('ButtonsMenu')" type="button" class="siderail-item__button" :class="ui.activeMenu === 'ButtonsMenu' ? 'siderail-item__button--active' : ''">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round"><polyline data-cap="butt" points="8.333,14 1,14 1,1 23,1 23,14 20,14 "></polyline><line data-cap="butt" x1="13" y1="14" x2="19" y2="20"></line><polygon points=" 6,7 10,19 13,14 18,11 "></polygon>
                  </g>
                </svg>
                <span style="font-size: 13px;">Button</span>
              </button>
            </div>
          </div>
        </div>
        <div class="siderail-bottom" style="display: flex; flex-direction: column; align-items: center;"> 
          <div class="siderail-item padding-bottom-xs">
            <ToggleMode/>
          </div>
          
          <!-- Collapse sidebar -->
          <div class="siderail-item">
            <button @click="collapseSidebar()" :disabled="ui.activeMenu !== ''" class="siderail-item__button">
              <svg width="24" height="24" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="1.5" fill="none" stroke="currentColor" stroke-linejoin="round"><polyline points="7,2 17,12 7,22 " transform="translate(0, 0)"></polyline></g></svg>
            </button>
          </div>
        </div>
      </div>
      <component :is="ui.activeMenu"/>
    </div>
    
    <!-- Styleguide -->
    <StyleGuide v-if="ui.activeStyleGuide"/>
    
    <!-- Toggle sidebar -->
    <div v-if="ui.collapsed === 'true'" class="sidebar-toggle" style="position: fixed; bottom: 30px; right: 0; z-index: 100;">
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

import MainMenu from './components/menus/MainMenu.vue'
import ColorsMenu from './components/menus/ColorsMenu.vue'
import TypographyMenu from './components/menus/TypographyMenu.vue'
import ButtonsMenu from './components/menus/ButtonsMenu.vue'

export default defineComponent({
    components: {
      MainMenu,
      ColorsMenu,
      TypographyMenu,
      ButtonsMenu,
    }
})    
</script>

<script setup>
import { onMounted } from 'vue'
import { debounce } from './composables/useDebounce'
import { useDesignStore } from './store/useDesignStore'
import { useUIStore } from './store/useUIStore'
import { useUserStore } from './store/useUserStore'

import IconLoading from './components/IconLoading.vue'
import DesignFonts from './components/DesignFonts.vue'
import DesignStyles from './components/DesignStyles.vue'
import StyleGuide from './components/menus/StyleGuide.vue'
import ToggleMode from './components/toggles/ToggleMode.vue'

const props = defineProps({
  endpoint: { 
    type: String,
  },
  organization: { 
    type: String,
  },
  design: { 
    type: String,
  },
  mode: {
    type: String,
  },
  user_name: {
    type: String,
  },
  user_email: {
    type: String,
  },
  user_role: {
    type: String,
    default: 'designer',
  }
})

const store = useDesignStore()
const ui = useUIStore()
const user = useUserStore()

function toggleMenu(menu) {
  ui.activeMenu = ui.activeMenu === menu ? '' : menu
}

function toggleStyleGuide() {
  ui.activeStyleGuide = !ui.activeStyleGuide
  document.body.classList.toggle('overflow-hidden')
}

const collapseSidebar = () => {
  ui.collapsed = 'true'
  localStorage.setItem('design_plugin_sidebar_collapsed', 'true')
  document.body.classList.remove('design-plugin-enabled')
}

const expandSidebar = () => {
  ui.collapsed = 'false'
  localStorage.setItem('design_plugin_sidebar_collapsed', 'false')
  document.body.classList.add('design-plugin-enabled')
}

const updateDesign = debounce(() => {
  store.update()
}, 3000)

store.$subscribe((mutation, state) => {
  if (!['loading', 'design', 'designs', 'organization'].includes(mutation.events.key)) {
    updateDesign()
  }
})

onMounted(() => {
  // Init api endpoint and organization
  if (props.endpoint && props.organization) {
    store.init(
      props.endpoint, 
      props.organization
    )
  }
  
  // Init user
  if (props.user_name && props.user_email && props.user_role) {
    console.log('prop', props.user_role)
    user.init(
      props.user_name, 
      props.user_email,
      props.user_role
    )
  }
  
  // Init mode
  if (props.mode) {
    ui.mode = props.mode
  }
  
  // Init design
  if (props.design) {
    store.show(props.design)
  }
  
  // Init plugin collapsed or not
  if (ui.collapsed === 'false') {
    document.body.classList.add('design-plugin-enabled')
  }
  if (window.screen.width <= 1024) {
    sidebarCollapse()
  }
})
</script>

<style lang="scss">
@import './styles/app.scss';
</style>
