import { defineStore, acceptHMRUpdate } from 'pinia'

export const useUIStore = defineStore('UIStore', {
  state: () => ({
    activeMenu: '',
    activeStyleGuide: false,
    canEdit: false,
    mode: localStorage.getItem('design_plugin_mode'),
    collapsed: localStorage.getItem('design_plugin_sidebar_collapsed') || 'false',
  }),

  actions: {}
})

/**
 * Enable hot reload on store updates
 * https://pinia.vuejs.org/cookbook/hot-module-replacement.html
 */
if (import.meta.hot) {
  import.meta.hot.accept(acceptHMRUpdate(useUIStore, import.meta.hot))
}
