import { defineStore, acceptHMRUpdate } from 'pinia'
import { designApi as DesignApi } from '../api/designApi'
// import { useUIStore } from './store/useUIStore'
// import { useUserStore } from './store/useUserStore'

export const useDesignStore = defineStore('designStore', {
  state: () => ({
    designs: null,
    design: null,
    loading: false,
  }),

  getters: {
    variables: (state) => state.design.variables,
    
    filterDesignsBy: (state) => (filter, value) => {
      if (filter) {
        return state.designs.filter((design) => {
          return design[filter] === value
        })
      } else {
        return state.designs
      }
    }
  },

  actions: {
    index(params) {
      this.loading = true
      this.designs = null

      DesignApi.index('bloomcu', params)
        .then(response => {
          this.designs = response.data.data
          this.loading = false
        }).catch(error => {
          console.log('Error', error.response.data)
        })
    },

    async store(user) {
      this.loading = true
    
      await DesignApi.store('bloomcu', {
        designer_name: user.name,
        designer_email: user.email,
      })
        .then(response => {
          this.designs.unshift(response.data.data)
          this.show(response.data.data.uuid)
          document.cookie = `design_plugin_design=${response.data.data.uuid}; path=/;`          
          this.loading = false
        }).catch(error => {
          console.log('Error', error.response.data)
        })
    },

    async show(uuid) {
      this.loading = true
      
      // const ui = useUIStore()
      // const user = useUserStore()

      await DesignApi.show('bloomcu', uuid)
        .then(response => {
          this.design = response.data.data
          document.cookie = `design_plugin_design=${uuid}; path=/;`
          // localStorage.setItem('design_plugin_design', uuid)
          
          setTimeout(() => {  
            this.loading = false
          }, 500)
        })
        .catch(error => {
          this.design = null
          document.cookie = 'design_plugin_design=""; expires=Sat, 20 Jan 1980 12:00:00 UTC; path=/;';
          console.log('Error', error.response)
        })
    },

    update() {
      this.loading = true

      DesignApi.update('bloomcu', this.design.uuid, this.design)
        .then(response => {
          console.log('Design successfully updated')

          setTimeout(() => {
            this.loading = false
          }, 1000)
        })
        .catch(error => {
          console.log('Error', error.response.data)
        })
    },

    destroy(uuid) {
      this.loading = true
    
      DesignApi.destroy('bloomcu', uuid)
        .then(response => {
          this.designs = this.designs.filter((design) => design.uuid !== uuid)
          
          if (this.design && this.design.uuid === uuid) {
            this.design = null
          }
          
          this.loading = false
        })
        .catch(error => {
          console.log('Error', error.response.data)
        })
    },
    
    async duplicate(uuid, user) {
      this.loading = true

      await DesignApi.duplicate('bloomcu', uuid, {
        designer_name: user.name,
        designer_email: user.email,
      })
        .then(response => {
          this.designs.unshift(response.data.data)
          this.show(response.data.data.uuid)
          document.cookie = `design_plugin_design=${response.data.data.uuid}; path=/;`          
          this.loading = false
        }).catch(error => {
          console.log('Error', error.response.data)
        })
    },
    
    async storeMedia(file, collection, tags) {
      return await DesignApi.storeMedia('bloomcu', this.design.uuid, file, collection, tags)
        .then(response => {
          return response.data.data
        }).catch(error => {
          console.log('Error', error.response.data)
        })
    },
  }
})

/**
 * Enable hot reload on store updates
 * https://pinia.vuejs.org/cookbook/hot-module-replacement.html
 */
if (import.meta.hot) {
  import.meta.hot.accept(acceptHMRUpdate(useDesignStore, import.meta.hot))
}
