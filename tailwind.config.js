/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./php/**/*.php"
  ],
  theme: {
    extend: {
      colors: {
        'brand-black': 'var(--brand-black)',
        'brand-gold-dark': 'var(--brand-gold-dark)',
        'brand-gold': 'var(--brand-gold)',
        'brand-gold-light': 'var(--brand-gold-light)',
        'brand-purple': 'var(--brand-purple)',
      },
    },
  },
  plugins: [],
}