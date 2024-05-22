/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    './resources/js/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        'green-instilla': '#08C6C0',
        'black-tag-product': '#23242A',
        'fondo-instilla': '#F6F7FC',
      },
    },
  },
  plugins: [],
}

