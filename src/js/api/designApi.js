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
    
    // /**
    //  * Store a design
    //  *
    //  * @param Object design [Properties to create design from]
    //  * @return promise
    //  */
    // store(organization, design) {
    //     return HttpClient.post(`/${organization}/designs`, design)
    // },
    
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
    
    /**
     * Duplicate a design
     *
     * @param String uuid [Uuid of the design to be duplicated]
     * @param Object designer [Designer personal information]
     * @param String designer.designer_name [Designer first and last name]
     * @param String designer.designer_email [Designer email]
     * @return promise
     */
    duplicate(organization, uuid, designer) {
        return HttpClient.post(`/${organization}/designs/${uuid}/duplicate`, designer)
    },
    
    /**
     * Store design media
     *
     * @param String organization [Slug of the organization]
     * @param String design [UUID of the design]
     * @param Object file [Object to create file from]
     * @param String collection [Collection to associate media with]
     * @param String tags [Tags to attach to media]
     * @return promise
     */
    storeMedia(organization_slug, design_uuid, file, collection, tags) {
        return HttpClient.post(`/${organization_slug}/designs/${design_uuid}/media`, file)
    },
}

export { designApi }
