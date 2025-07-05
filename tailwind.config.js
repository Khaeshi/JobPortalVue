/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './index.html',
    './resources/js/**/*.{vue,js,ts,jsx,tsx}',
    './resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        primary: { // color  light blue, main blue dark blue
          50:  '#e3f2fd',
          100: '#bbdefb',
          200: '#90caf9',
          300: '#64b5f6',
          400: '#42a5f5',
          500: '#2196f3',
          600: '#1e88e5',
          700: '#1976d2',
          800: '#1565c0',
          900: '#0d47a1',
          950: '#082a4c',
        },
        accent: { // color light yellow, orange, gold(darker)
          50:  '#fff8e1',
          100: '#ffecb3',
          200: '#ffe082',
          300: '#ffd54f',
          400: '#ffca28',
          500: '#ffc107',
          600: '#ffb300',
          700: '#ffa000',
          800: '#ff8f00',
          900: '#ff6f00',
          950: '#4c3900',
        },
      },
      fontFamily: {
        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
      borderRadius: {
        'lg': '1rem',
        'xl': '1.5rem',
      },
    },
  },
  plugins: [],
}
