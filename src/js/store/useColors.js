import useDebouncedRef from '../composables/useDebouncedRef'

const colorWhite = useDebouncedRef('#ffffff', 100)
const colorBlack = useDebouncedRef('#000000', 100)
const colorPrimary = useDebouncedRef('#003865', 100)
const colorAccent = useDebouncedRef('#ef5b0c', 100)
const colorContrastHigh = useDebouncedRef('#000000', 100)
const colorContrastHigher = useDebouncedRef('#000000', 100)
const colorBackground = useDebouncedRef('#ffffff', 100)

export default function useColors() {
    return {
        colorWhite,
        colorBlack,
        colorPrimary,
        colorAccent,
        colorContrastHigh,
        colorContrastHigher,
        colorBackground,
    }
}
