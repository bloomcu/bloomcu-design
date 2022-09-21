import { defineStore, acceptHMRUpdate } from 'pinia'
import { designApi as DesignApi } from '../api/designApi'

export const useDesignStore = defineStore('designStore', {
  state: () => ({
    // profile: JSON.parse(localStorage.getItem('designer_profile')),
    mode: localStorage.getItem('design_plugin_mode') || 'edit',
    designs: null,
    design: null,
    loading: false,
  }),

  getters: {
    variables: (state) => state.design.variables
  },

  actions: {
    // init() {
    //   this.loading = true
    // },
    
    // setProfile(name, email) {
    //   this.profile = { name: name, email: email }
    //   localStorage.setItem('designer_profile', JSON.stringify(this.profile))
    // },

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

    // async store(design) {
    //   this.loading = true
    // 
    //   await DesignApi.store('bloomcu', design)
    //     .then(response => {
    //       this.designs.push(response.data.data)
    //     }).catch(error => {
    //       console.log('Error', error.response.data)
    //     })
    // },

    async show(uuid) {
      this.loading = true

      await DesignApi.show('bloomcu', uuid)
        .then(response => {
          this.design = response.data.data
          document.cookie = `design_plugin_design=${uuid}; path=/;`
          
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
    
    async duplicate(uuid, designer) {
      this.loading = true

      await DesignApi.duplicate('bloomcu', uuid, {
        designer_name: designer.name,
        designer_email: designer.email,
      })
        .then(response => {
          this.designs.unshift(response.data.data)
          this.design = response.data.data
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
