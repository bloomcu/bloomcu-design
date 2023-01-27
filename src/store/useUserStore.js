import { defineStore, acceptHMRUpdate } from 'pinia'

export const useUserStore = defineStore('userStore', {
  state: () => ({
    name: '',
    email: '',
    role: '',
  }),
  
  getters: {
    isAdmin: (state) => state.role === 'administrator',
  },
    
  actions: {
    init(user_name, user_email, user_role) {
      console.log('init', user_role)
      this.name = user_name
      this.email = user_email
      this.role = user_role
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
