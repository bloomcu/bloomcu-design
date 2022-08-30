import { defineStore, acceptHMRUpdate } from 'pinia'
import { designApi as DesignApi } from '../api/designApi'

export const useDesignStore = defineStore('designStore', {
  state: () => ({
    // profile: JSON.parse(localStorage.getItem('designer_profile')),
    designs: null,
    design: null,
    // design: {"id":1,"uuid":"ffa4ae2f-9dd6-4119-9b77-8ebc157b9999","title":"Design #1","designer_name":"Ryan Harmon","designer_email":"ryan@bloomcu.com","variables":{"color_white":"#fff","color_black":"#000","color_primary":"#9966FF","color_accent":"#90F1B7","color_contrast_high":"#000","color_contrast_higher":"#40067a","color_background":"#fff","text_base_size":"1.3","font_primary":"Space Grotesk","font_primary_weight":"700","font_secondary":"Inter","font_secondary_weight":"300","button_radius":"0.45"},"created_at":"2022-08-22T23:05:05.000000Z"},
    loading: false,
  }),

  getters: {
    variables: (state) => state.design.variables
  },

  actions: {
    init() {
      // this.loading = true
    },
    
    setProfile(name, email) {
      // this.profile = { name: name, email: email }
      // localStorage.setItem('designer_profile', JSON.stringify(this.profile))
    },

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

    async store(design) {
      this.loading = true

      await DesignApi.store('bloomcu', design)
        .then(response => {
          this.designs.push(response.data.data)
        }).catch(error => {
          console.log('Error', error.response.data)
        })
    },

    async show(id) {
      this.loading = true

      await DesignApi.show('bloomcu', id)
        .then(response => {
          this.design = response.data.data
          
          setTimeout(() => {
            this.loading = false
          }, 1000)
        })
    },

    update() {
      this.loading = true

      DesignApi.update('bloomcu', this.design.uuid, this.design)
        .then(response => {
          console.log('Design successfully updated')

          setTimeout(() => {
            this.loading = false
          }, 2000)
        })
    },

    destroy(id) {
      this.loading = true

      DesignApi.destroy('bloomcu', id)
        .then(response => {
          this.designs = this.designs.filter((design) => design.id !== id)
          this.loading = false
        })
    },
    
    async storeMedia(file, collection, tags) {
      console.log('from store', file)
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
