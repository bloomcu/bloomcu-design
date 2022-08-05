import {reactive, computed} from 'vue'

export default function () {
  const state = reactive({
    colorPrimary: '#003865',
    colorAccent: '#EF5B0C',
    colorContrastHigh: '#000000',
    colorContrastHigher: '#000000',
    colorBackground: '#D4F6CC',
  })
  
  return { state }
}
  
// import { withState } from './helper'
// 
// const state = reactive({
//   colorPrimary: '#003865',
//   colorAccent: '#EF5B0C',
//   colorContrastHigh: '#000000',
//   colorContrastHigher: '#000000',
//   colorBackground: '#D4F6CC',
// })
// 
// export default () => withState({}, state)
