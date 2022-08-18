import axios from 'axios'

/**
* Setup Http client
* An instance of Axios we can use for all API requests to CMS
*/
const httpClient = axios.create({
  // baseURL: import.meta.env.VITE_API_BASE_URL,
  baseURL: 'http://build-api.test/api/'
})

export { httpClient }
