<template>
  <div class="siderail-menu siderail-menu-main">
    <header class="siderail-menu__header flex justify-between items-center">
      <!-- Logged in -->
      <div v-if="user.name && user.email">
        <p class="font-bold margin-bottom-xxs">{{ user.name }}</p>
        <div class="text-sm">
          <p v-if="user.isAdmin" class="margin-bottom-xxxs">Role: Administrator</p>
          <p>{{ user.email }}</p>  
        </div>
      </div>
      
      <!-- Viewer -->
      <div v-else>
        <!-- <p class="font-bold margin-bottom-xs">Viewer</p> -->
        <p class="text-sm">
          <a @click.prevent="redirectToLogin()" href="#">Log in</a>
          to edit styles
        </p>
      </div>
      
      <!-- Disable plugin -->
      <button @click="disablePlugin()" class="action-icon reset">
        <svg width="22" height="22" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" stroke-linejoin="round"><path d="M17,4.3c3,1.7,5,5,5,8.7 c0,5.5-4.5,10-10,10S2,18.5,2,13c0-3.7,2-6.9,5-8.7"></path><line x1="12" y1="1" x2="12" y2="8"></line></g></svg>
      </button>
    </header>
    
    <div v-if="store.designs" class="siderail-menu__body">
      <div class="siderail-menu__section">

        <!-- Styles filter -->
        <div v-if="user.email" class="flex justify-between align-center margin-bottom-sm">
          <div>
            <button 
              @click="designsFilter = 'designer_email'"
              class="reset text-sm border radius-full padding-y-xxs padding-x-sm cursor-pointer margin-right-xxs"
              :class="designsFilter === 'designer_email' ? 'border-opacity-0 color-white bg-black' : ''"
            >
              My styles
            </button>
            <button 
              @click="designsFilter = null"
              class="reset text-sm border radius-full padding-y-xxs padding-x-sm cursor-pointer"
              :class="designsFilter === null ? 'border-opacity-0 color-white bg-black' : ''"
            >
              All styles
            </button>
          </div>
          
          <!-- Create new design -->
          <button @click="storeNewDesign()" class="flex items-center text-sm border radius-md padding-y-xxs padding-x-xs cursor-pointer reset">
            <svg width="16" height="16" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor" stroke-linejoin="round" class="nc-icon-wrapper"><line x1="12" y1="2" x2="12" y2="22"></line> <line x1="22" y1="12" x2="2" y2="12"></line></g></svg>
            <span class="margin-left-xxxs">New design</span>
          </button>
        </div>
        
        <!-- List designs -->
        <div
          v-for="design in store.filterDesignsBy(designsFilter, user.email)"
          :key="design.id"
          @click="showDesign(design.uuid)"
          :class="(store.design !== null && store.design.uuid === design.uuid) ? 'card card--dark' : 'card'"
          class="flex items-center justify-between margin-bottom-xs text-sm cursor-pointer"
        >
          <div>
            <p class="text-bold margin-bottom-xxs">{{ design.title }}</p>
            <span v-if="user.email === design.designer_email" class="text-sm radius-full padding-x-sm padding-y-xxxs" style="color: #96f; background: #eee5ff; border: 1px solid #fff;">
              {{ design.designer_name }}
            </span>
            <span v-else-if="user.isAdmin" class="text-sm radius-full padding-x-sm padding-y-xxxs" style="border: 1px solid #e1e1e1;">
              {{ design.designer_name }}
            </span>
          </div>
          
          <div class="flex items-center gap-xxs">
            <!-- Disable -->
            <button v-if="store.design !== null && store.design.uuid === design.uuid" @click.stop="disableDesign()" class="action-icon reset">
              <svg height="18" width="18" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="2" fill="none" stroke="#000000" stroke-linejoin="round"><path d="M1.373,13.183a2.064,2.064,0,0,1,0-2.366C2.946,8.59,6.819,4,12,4s9.054,4.59,10.627,6.817a2.064,2.064,0,0,1,0,2.366C21.054,15.41,17.181,20,12,20S2.946,15.41,1.373,13.183Z"></path><circle cx="12" cy="12" r="4"></circle><line x1="2" y1="22" x2="22" y2="2"></line></g></svg>
            </button>
            
            <!-- Destroy -->
            <button v-if="user.email === design.designer_email" @click.stop="destroyDesign(design.uuid)" class="action-icon reset">
              <svg height="18" width="18" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="2" fill="none" stroke="#000000" stroke-linejoin="round"><path d="M20,9l-.867,12.142A2,2,0,0,1,17.138,23H6.862a2,2,0,0,1-1.995-1.858L4,9"></path><line x1="1" y1="5" x2="23" y2="5" stroke="#000000"></line><path data-cap="butt" d="M8,5V1h8V5" stroke="#000000"></path></g></svg>
            </button>
            
            <!-- Duplicate -->
            <button v-if="user.email" @click.stop="duplicateDesign(design.uuid)" class="action-icon reset">
              <svg height="18" width="18" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="2" fill="none" stroke="#000000" stroke-linejoin="round"><polyline points=" 16,8 22,8 22,22 8,22 8,16 "></polyline><rect x="2" y="2" width="14" height="14"></rect></g></svg>
            </button>
            
            <!-- Share -->
            <button @click.stop="copyDesignUrl(design.uuid)" class="action-icon reset">
              <svg height="18" width="18" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="2" fill="none" stroke="#000000" stroke-linejoin="round"><line data-cap="butt" x1="11" y1="13" x2="22" y2="2"></line><polyline points="14 2 22 2 22 10"></polyline><path d="M9,4H4A2,2,0,0,0,2,6V20a2,2,0,0,0,2,2H18a2,2,0,0,0,2-2V15"></path></g></svg>
            </button>
            
            <transition name="fade">
              <div v-if="copiedDesign === design.uuid" class="share-overlay">
                <p>Url copied</p>
              </div>
            </transition>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useDesignStore } from '@/store/useDesignStore'
import { useUserStore } from '@/store/useUserStore'

const designsFilter = ref(null)
const store = useDesignStore()
const user = useUserStore()

const showDesign = (uuid) => {
  store.show(uuid)
    // TODO: Clean this up
    // .then(() => {
      // document.cookie = `design_plugin_mode=${store.mode}; path=/;`
      
      // if (store.variables.font_primary.source === 'upload') {
      //   activeFontsSource.value = 'upload'
      // }
    // })
}

const disableDesign = () => {
  store.design = null
  document.cookie = 'design_plugin_design=""; expires=Sat, 20 Jan 1980 12:00:00 UTC; path=/;';
}

const storeNewDesign = () => {
  store.store(user)
}

const duplicateDesign = (uuid) => {
  store.duplicate(uuid, user)
}

const destroyDesign = (uuid) => {
  store.destroy(uuid)
}

const disablePlugin = () => {
  document.cookie = 'design_plugin_enabled=""; expires=Sat, 20 Jan 1980 12:00:00 UTC; path=/;';
  let path = window.location.href.split('?')[0]
  window.location = path
}

const redirectToLogin = () => {
  let path = window.location.href.split('?')[0]
  window.location = `/wp-admin?redirect_to=${path}`
}

const copiedDesign = ref(null)
const copyDesignUrl = (designUuid) => {
  let path = window.location.href.split('?')[0]
  copyToClipboard(path + `?design=${designUuid}&mode=view`)
  
  copiedDesign.value = designUuid
  setTimeout(() => {  
    copiedDesign.value = null
  }, 2000)
}

// TODO: Make this a composable
// Ref: https://codepen.io/PJCHENder/pen/jamJpj?editors=1010
const copyToClipboard = (value) => {
  var tempInput = document.createElement("input");
  tempInput.value = value;
  document.body.appendChild(tempInput);
  tempInput.select();
  
  document.execCommand("copy");
  document.body.removeChild(tempInput);
}

onMounted(() => {
  if (!store.designs) {
    store.index()
  }
  
  if (user.email) {
    designsFilter.value = 'designer_email'
  }
})
</script>

<style lang="scss">
.bloomcu-design {
  /* --------------------------------
  Card
  -------------------------------- */
  .card {
    position: relative;
    border: 1px solid #dadadc;
    border-radius: .5em;
    padding: 1.125rem;
    background: #ffffff;
    
    transition-property: box-shadow;
    transition-duration: .15s;
    
    &:hover {
      box-shadow: var(--shadow-sm);
    }
    
    &--dark {
      border-color: transparent;
      background-color: #eee5ff;
      
      .action-icon {
        &:hover {
          background-color: #fff;
        }
      }
    }
  }

  .card-header {
    border-radius: .5em;
  }
  
  .share-overlay {
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background-color: #000;
    color: var(--color-white);
    
    display: flex;
    align-items: center;
    justify-content: center;
  }
}
</style>
