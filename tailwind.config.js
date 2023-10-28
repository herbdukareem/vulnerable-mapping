/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
],
darkMode:false,
  theme: {
    extend: {
      colors: {
        primary: '#0099FF',
        secondary: '#FFD700',
        accent: '#191919',
        neutral: '#FAFAFA',
        info: '#007BFF',
        success: '#28A745',
        warning: '#FFC107',
        error: '#DC3545',
      },
    },
  },
  plugins: [
    require('daisyui'),
  ],
  daisyui: {
    themes: ["light"],
  },
}

