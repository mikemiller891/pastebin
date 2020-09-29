module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: [
    './resources/views/**/*.blade.php',
    './app/View/Components/*.php',
  ],
  theme: {
    extend: {
      screens: {
        'dark': {'raw': '(prefers-color-scheme: dark)'},
      },
    },
  },
  variants: {},
  plugins: [],
}
