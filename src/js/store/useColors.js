import { ref, computed } from 'vue'

const colorPrimary = ref('#003865')
const colorAccent = ref('#ef5b0c')
const colorContrastHigh = ref('#000000')
const colorContrastHigher = ref('#000000')
const colorBackground = ref('#ffffff')

export default function useColors() {
    return {
        colorPrimary,
        colorAccent,
        colorContrastHigh,
        colorContrastHigher,
        colorBackground,
    }
}
