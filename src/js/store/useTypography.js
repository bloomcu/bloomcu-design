import { ref } from 'vue'
import googleFonts from "./googleFonts.json"; //https://jsonformatter.org/e0f20a

const fontPrimary = ref('Roboto')
const fontPrimaryWeight = ref('400')
const fontSecondary = ref('Poppins')
const fontSecondaryWeight = ref('400')

function getFontByFamily(family) {
  return googleFonts.find((font) => {
    return font.family == family
  })  
}

export default function useTypography() {
    return {
        googleFonts,
        fontPrimary,
        fontPrimaryWeight,
        fontSecondary,
        fontSecondaryWeight,
        getFontByFamily,
    }
}
