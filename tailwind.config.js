const colors = require('tailwindcss/colors')
const palette = require('./palette')

module.exports = {
  mode: 'jit',
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: palette
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
