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
        '4.5': '1.125rem' //18px
      },
      minWidth: {
        '412': '412px',
        '2': '0.5rem', //8px
        '44': '2.625rem', //44px
        '52': '3.25rem', //52px
        '110': '6.875rem', //100px
        '160': '10rem' //160rem
      },
      colors: {
        'blue-grey': '#525F7F',
        'blue': '#1267E5',
        'light': '#CED4DA',
        'lighter': '#F2F7FF',
        'light-blue': '#F4F6FF',
        'green': '#12B2B2',
        'dark': '#333333',
        'darker': '#0C0C0C',
        'dark2': '#212529',
        'light-grey': '#ebebeb',
        'white-60': '#ffffff99',
        'white-25': '#ffffff40',
        'lighter-grey': '#F6F8FD',
        'grey': '#F8F9FA',
        'lighttext': '#ADB5BD'
      },
      fontSize: {
        xxxs: '0.688rem', //11px
        xxs: '0.75rem', //12px
        xs: '0.8125rem', //13px
      },
      boxShadow: {
        'main': '0px 4px 6px rgba(50, 50, 93, 0.11), 0px 1px 3px rgba(0, 0, 0, 0.08);',
        'secondary': '0px 15px 35px rgba(50, 50, 93, 0.1), 0px 5px 15px rgba(0, 0, 0, 0.07);',
        'third': '0px 50px 100px rgba(50, 50, 93, 0.1), 0px 15px 35px rgba(50, 50, 93, 0.15), 0px 5px 15px rgba(0, 0, 0, 0.1)'
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
        '4.5': '1.125rem', //18px
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

