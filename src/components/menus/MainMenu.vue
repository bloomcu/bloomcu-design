<template>
  <div class="siderail-menu siderail-menu-main">
    <header class="siderail-menu__header">
      <div v-if="user.name && user.email">
        <p class="font-bold margin-bottom-xs">{{ user.name }}</p>
        <p class="text-sm">{{ user.email }}</p>
      </div>
      
      <div v-else>
        <p class="font-bold margin-bottom-xs">Viewer</p>
        <p class="text-sm">
          <a href="/wp-admin">Log in</a>
          to edit styles
        </p>
      </div>
    </header>
    
    <div v-if="store.designs" class="siderail-menu__body">
      
      <div class="siderail-menu__section">
        <p class="font-bold margin-bottom-sm">Styles</p>
        <div
          v-for="design in store.designs"
          :key="design.id"
          @click="showDesign(design.uuid)"
          :class="(store.design !== null && store.design.uuid === design.uuid) ? 'card' : 'card card--dark'"
          class="flex items-center justify-between margin-bottom-xs text-sm cursor-pointer"
        >
          {{ design.title }}
          <div v-if="user.name && user.email" class="flex items-center gap-xxs">
            <button @click.stop="duplicateDesign(design.uuid)" class="action-icon reset" type="button" name="button">
              <svg class="icon" height="24" width="24" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="2" fill="none" stroke="#000000" stroke-linejoin="round"><polyline points=" 16,8 22,8 22,22 8,22 8,16 "></polyline><rect x="2" y="2" width="14" height="14"></rect></g></svg>
            </button>
            
            <button @click.stop="destroyDesign(design.uuid)" class="action-icon reset" type="button" name="button">
              <svg class="icon" height="24" width="24" viewBox="0 0 24 24"><g stroke-linecap="round" stroke-width="2" fill="none" stroke="#000000" stroke-linejoin="round"><path d="M20,9l-.867,12.142A2,2,0,0,1,17.138,23H6.862a2,2,0,0,1-1.995-1.858L4,9"></path><line x1="1" y1="5" x2="23" y2="5" stroke="#000000"></line><path data-cap="butt" d="M8,5V1h8V5" stroke="#000000"></path></g></svg>
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

const destroyDesign = (uuid) => {
  store.destroy(uuid)
}

const duplicateDesign = (uuid) => {
  store.duplicate(uuid, {
    name: user.name,
    email: user.email,
  })
}

onMounted(() => {
  if (!store.designs) {
    store.index()
  }
})
</script>
