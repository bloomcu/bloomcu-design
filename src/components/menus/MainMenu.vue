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
            <button class="btn btn--sm btn--subtle" @click.stop="duplicateDesign(design.uuid)">Duplicate</button>
            <button class="btn btn--sm btn--subtle" @click.stop="destroyDesign(design.uuid)">Archive</button>
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
