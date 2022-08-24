import { httpClient as HttpClient } from './httpClient'

const designApi = {
    /**
     * List designs
     *
     * @param Object params [Key/value params to query by]
     * @return promise
     */
    index(organization, params) {
        return HttpClient.get(`/${organization}/designs`, { params: params })
    },
    
    /**
     * Store a design
     *
     * @param Object design [Properties to create design from]
     * @return promise
     */
    store(organization, design) {
        return HttpClient.post(`/${organization}/designs`, design)
    },
    
    /**
     * Show a design
     *
     * @param Integer id [Slug of the design you want to show]
     * @return promise
     */
    show(organization, uuid) {
      return HttpClient.get(`/${organization}/designs/${uuid}`)
    },
    
    /**
     * Update a design
     *
     * @param Integer id [Id of the design you want to update]
     * @param Object  design [Properties to update design with]
     * @return promise
     */
    update(organization, uuid, design) {
      return HttpClient.put(`/${organization}/designs/${uuid}`, design)
    },
    
    /**
     * Destroy a design
     *
     * @param Integer id [Id of the file you want to destroy]
     * @return promise
     */
    destroy(organization, uuid) {
        return HttpClient.delete(`/${organization}/designs/${uuid}`)
    },
}

export { designApi }
