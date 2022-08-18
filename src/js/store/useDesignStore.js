import { defineStore, acceptHMRUpdate } from 'pinia'
import { designApi as DesignApi } from '../api/designApi'

export const useDesignStore = defineStore('designStore', {
    state: () => ({
        designs: null,
        design: null,
        isLoading: true,
    }),
    
    getters: {
      variables: (state) => state.design.variables
    },
    
    actions: {
        index(params) {
          this.isLoading = true
          this.designs = null
          
          DesignApi.index('bloomcu', params)
            .then(response => {
              this.designs = response.data.data
              this.isLoading = false
            }).catch(error => {
              console.log('Error', error.response.data)
            })
        },
        
        async store(design) {
          this.isLoading = true
          
          await DesignApi.store('bloomcu', design)
            .then(response => {
              this.designs.push(response.data.data)
            }).catch(error => {
              console.log('Error', error.response.data)
            })
        },
        
        show(id) {
          this.isLoading = true
          
          DesignApi.show('bloomcu', id)
            .then(response => {
              this.design = response.data.data
              this.isLoading = false
            })
        },
        
        update() {
          this.isLoading = true
          
          DesignApi.update('bloomcu', this.design.id, this.design)
            .then(response => {
              console.log('Design successfully updated')
              this.isLoading = false
            })
        },
        
        destroy(id) {
          this.isLoading = true
          
          DesignApi.destroy('bloomcu', id)
            .then(response => {
              this.designs = this.designs.filter((design) => design.id !== id)
              this.isLoading = false
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
