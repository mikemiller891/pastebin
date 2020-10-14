module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
    defaultLineHeights: true,
    standardFontWeights: true
  },
  purge: [
      './resources/views/**/*.blade.php'
  ],
  theme: {
    extend: {}
  },
  variants: {},
  plugins: []
}
