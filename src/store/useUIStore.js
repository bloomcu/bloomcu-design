import { defineStore, acceptHMRUpdate } from 'pinia'

export const useUIStore = defineStore('UIStore', {
  state: () => ({
    activeMenu: '',
    activeStyleGuide: false,
    mode: 'view',
    collapsed: false,
  }),

  actions: {
    init(mode = 'view', collapsed = false) {
      this.mode = mode
      this.collapsed = collapsed
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
