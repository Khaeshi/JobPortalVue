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
        // removed custom colors, now defined in app.css
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
