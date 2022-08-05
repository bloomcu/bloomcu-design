import { ref } from 'vue'

const fontPrimary = ref('Roboto')
const fontSecondary = ref('Poppins')

export default function useTypography() {
    return {
        fontPrimary,
        fontSecondary,
    }
}
