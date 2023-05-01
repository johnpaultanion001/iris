/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      height: {
        '7.5': '1.875rem',
      },
      width: {
        '15': '3.75rem',
      },
      minWidth: {
        '412': '412px',
      },
      colors: {
        'blue-grey': '#525F7F',
        'blue': '#1267E5',
        'light': '#CED4DA',
        'lighter': '#F2F7FF',
        'green': '#12B2B2',
        'dark': '#333333',
        'darker': '#0C0C0C',
        'white-60': '#ffffff99',
        'white-25': '#ffffff40'
      },
      fontSize: {
        xxs: '0.75rem',
        xs: ['0.8125rem', '1rem'],
      },
      boxShadow: {
        'main': '0px 4px 6px rgba(50, 50, 93, 0.11), 0px 1px 3px rgba(0, 0, 0, 0.08);',
        'secondary': '0px 15px 35px rgba(50, 50, 93, 0.1), 0px 5px 15px rgba(0, 0, 0, 0.07);',
      },
      fontFamily: {
        'exo-300': 'exo-300',
        'exo-400': 'exo-400',
        'exo-600': 'exo-600',
        'exo-700': 'exo-700',
        'inter-300': 'inter-300',
        'inter-400': 'inter-400',
        'inter-700': 'inter-700',
        'opensans-600': 'opensans-600',
        'opensans-800': 'opensans-800',
      },
      margin: {
        '4.5': '1.125rem',
        '23': '5.5rem',
      },
      padding: {
        '4.5': '1.125rem',
      },
      screens: {
        'xs': '450px',
      },
    },
  },
  plugins: [],
}

