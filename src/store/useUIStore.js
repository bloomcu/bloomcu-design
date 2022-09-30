import { defineStore, acceptHMRUpdate } from 'pinia'

export const useUIStore = defineStore('UIStore', {
  state: () => ({
    activeMenu: '',
    activeStyleGuide: false,
    mode: localStorage.getItem('design_plugin_mode') || 'view',
    collapsed: localStorage.getItem('design_plugin_sidebar_collapsed') || 'false',
  }),

  actions: {
    init(mode = 'view') {
      this.mode = mode
    }
  }
})

/**
 * Enable hot reload on store updates
 * https://pinia.vuejs.org/cookbook/hot-module-replacement.html
 */
if (import.meta.hot) {
  import.meta.hot.accept(acceptHMRUpdate(useUIStore, import.meta.hot))
}
