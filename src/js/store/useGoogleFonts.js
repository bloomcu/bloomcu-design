import fonts from "./googleFonts.json";

const googleFonts = fonts

function getGoogleFontByFamily(family) {
  return fonts.find((font) => {
    return font.family == family
  })  
}

export {
  googleFonts,
  getGoogleFontByFamily
}
