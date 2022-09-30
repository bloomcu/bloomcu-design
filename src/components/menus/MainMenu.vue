<template>
  <div class="siderail-menu siderail-menu-main">
    <header class="siderail-menu__header flex justify-between items-center">
      <!-- Logged in -->
      <div v-if="user.name && user.email">
        <p class="font-bold margin-bottom-xxxs">{{ user.name }}</p>
        <p class="text-sm">{{ user.email }}</p>
      </div>
      
      <!-- Viewer -->
      <div v-else>
        <p class="font-bold margin-bottom-xs">Viewer</p>
        <p class="text-sm">
          <a href="/wp-admin">Log in</a>
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
        <p class="font-bold margin-bottom-sm">Styles</p>
        <div
          v-for="design in store.designs"
          :key="design.id"
          @click="showDesign(design.uuid)"
          :class="(store.design !== null && store.design.uuid === design.uuid) ? 'card card--dark' : 'card'"
          class="flex items-center justify-between margin-bottom-xs text-sm cursor-pointer"
        >
          <div>
            <p class="text-bold margin-bottom-xxs">{{ design.title }}</p>
            <p class="text-sm">{{design.designer_name}}</p>
          </div>
          
          <div class="flex items-center gap-xxs">
            <button v-if="store.design !== null && store.design.uuid === design.uuid" @click.stop="disableDesign()" class="action-icon reset">
              <svg height="18" width="18" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="2" fill="none" stroke="#000000" stroke-linejoin="round"><path d="M1.373,13.183a2.064,2.064,0,0,1,0-2.366C2.946,8.59,6.819,4,12,4s9.054,4.59,10.627,6.817a2.064,2.064,0,0,1,0,2.366C21.054,15.41,17.181,20,12,20S2.946,15.41,1.373,13.183Z"></path><circle cx="12" cy="12" r="4"></circle><line x1="2" y1="22" x2="22" y2="2"></line></g></svg>
            </button>
            
            <button v-if="user.name === design.designer_name && user.email === design.designer_email" @click.stop="destroyDesign(design.uuid)" class="action-icon reset">
              <svg height="18" width="18" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="2" fill="none" stroke="#000000" stroke-linejoin="round"><path d="M20,9l-.867,12.142A2,2,0,0,1,17.138,23H6.862a2,2,0,0,1-1.995-1.858L4,9"></path><line x1="1" y1="5" x2="23" y2="5" stroke="#000000"></line><path data-cap="butt" d="M8,5V1h8V5" stroke="#000000"></path></g></svg>
            </button>
            
            <button v-if="user.name && user.email" @click.stop="duplicateDesign(design.uuid)" class="action-icon reset">
              <svg height="18" width="18" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="2" fill="none" stroke="#000000" stroke-linejoin="round"><polyline points=" 16,8 22,8 22,22 8,22 8,16 "></polyline><rect x="2" y="2" width="14" height="14"></rect></g></svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted } from 'vue'
import { useDesignStore } from '@/store/useDesignStore'
import { useUserStore } from '@/store/useUserStore'

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
}

const duplicateDesign = (uuid) => {
  store.duplicate(uuid, {
    name: user.name,
    email: user.email,
  })
}

const destroyDesign = (uuid) => {
  store.destroy(uuid)
}

const disablePlugin = () => {
  document.cookie = 'design_plugin_disabled=true; path=/;'
  let path = window.location.href.split('?')[0]
  window.location = path
}

onMounted(() => {
  if (!store.designs) {
    store.index()
  }
})
</script>

<style lang="scss">
.bloomcu-design {
  /* --------------------------------
  Card
  -------------------------------- */
  .card {
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
}
</style>
