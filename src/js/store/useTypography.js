import { ref } from 'vue'
import googleFonts from "./googleFonts.json"; //https://jsonformatter.org/e0f20a

const fontPrimary = ref('Roboto')
const fontSecondary = ref('Poppins')

export default function useTypography() {
    return {
        googleFonts,
        fontPrimary,
        fontSecondary,
    }
}
