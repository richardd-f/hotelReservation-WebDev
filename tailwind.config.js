/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./php/**/*.php"
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          DEFAULT: '#1E40AF',     // brand = bg-brand
          light: '#3B82F6',       // brand-light = bg-brand-light
          dark: '#1E3A8A'         // brand-dark = bg-brand-dark
        },
        gold: '#FFD700',          // use bg-gold, text-gold, etc.
      },
    },
  },
  plugins: [],
}