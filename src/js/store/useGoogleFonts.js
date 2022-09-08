import fonts from "./googleFonts.json";

const googleFonts = fonts

function getGoogleFontByName(name) {
  return fonts.find((font) => {
    return font.name == name
  })  
}

export {
  googleFonts,
  getGoogleFontByName
}
