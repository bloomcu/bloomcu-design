<template>
  <div class="siderail-menu" style="margin-right: 70px;">
    <div class="siderail-menu__inner" style="max-height: 90vh;">
      <!-- <AppLogin/> -->
      <div class="border-bottom" style="padding: 20px;">
        <div v-if="user_name && user_email">
          <p class="font-bold">{{ user_name }}</p>
          <p class="text-sm">{{ user_email }}</p>
        </div>
        
        <div v-else>
          <p class="font-bold">Viewer</p>
          <p class="text-sm">
            <a href="/wp-admin">Log in</a>
            to edit styles
          </p>
        </div>
      </div>
      
      <div v-if="store.designs" style="padding: 20px;">
        <p class="font-bold margin-bottom-xs">Styles</p>
        <div
          v-for="design in store.designs"
          :key="design.id"
          @click="showDesign(design.uuid)"
          :class="(store.design !== null && store.design.uuid === design.uuid) ? 'card' : 'card card--dark'"
          class="margin-bottom-xs text-sm cursor-pointer"
          style="width: 280px;"
        >
          {{ design.title }}
          <div v-if="user_name && user_email">
            <button @click.stop="duplicateDesign(design.uuid)">Duplicate</button>
            <button @click.stop="destroyDesign(design.uuid)">Archive</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted } from 'vue'
import { useDesignStore } from '@/store/useDesignStore'

const store = useDesignStore()

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

onMounted(() => {
  if (!store.designs) {
    store.index()
  }
})
</script>
