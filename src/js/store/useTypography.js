import { ref } from 'vue'
import googleFonts from "./googleFonts.json"; //https://jsonformatter.org/e0f20a

const fontPrimary = ref('Roboto Slab')
const fontSecondary = ref('Poppins')
const fontPrimaryWeight = ref('400')
const fontSecondaryWeight = ref('400')
const textBaseSize = ref('1.3')

function getFontByFamily(family) {
  return googleFonts.find((font) => {
    return font.family == family
  })  
}

export default function useTypography() {
    return {
        googleFonts,
        fontPrimary,
        fontSecondary,
        fontPrimaryWeight,
        fontSecondaryWeight,
        textBaseSize,
        getFontByFamily,
    }
}
