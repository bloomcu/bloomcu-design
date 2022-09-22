import { defineStore, acceptHMRUpdate } from 'pinia'

export const useUserStore = defineStore('userStore', {
  state: () => ({
    name: '',
    email: ''
  }),

  actions: {
    init(user_name, user_email) {
      this.name = user_name
      this.email = user_email
    }
  }
})

/**
 * Enable hot reload on store updates
 * https://pinia.vuejs.org/cookbook/hot-module-replacement.html
 */
if (import.meta.hot) {
  import.meta.hot.accept(acceptHMRUpdate(useUserStore, import.meta.hot))
}
