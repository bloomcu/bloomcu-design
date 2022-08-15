import useDebouncedRef from '../composables/useDebouncedRef'

const colorWhite = useDebouncedRef('#ffffff', 100)
const colorPrimary = useDebouncedRef('#003865', 100)
const colorAccent = useDebouncedRef('#ef5b0c', 100)
const colorContrastHigh = useDebouncedRef('#000000', 100)
const colorContrastHigher = useDebouncedRef('#000000', 100)
const colorBackground = useDebouncedRef('#ffffff', 100)
// const colorBackgroundMedium = useDebouncedRef(colorPrimary + '0D', 100) // 5% of primary

export default function useColors() {
    return {
        colorWhite,
        colorPrimary,
        colorAccent,
        colorContrastHigh,
        colorContrastHigher,
        colorBackground,
        // colorBackgroundMedium,
    }
}
