/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./php/**/*.php"
  ],
  theme: {
    extend: {
      colors: {
        'brand-black': ({ opacityValue }) =>
          opacityValue === undefined
            ? 'var(--brand-black)'
            : `rgba(5, 0, 22, ${opacityValue})`,
        'brand-gold-dark': 'var(--brand-gold-dark)',
        'brand-gold': 'var(--brand-gold)',
        'brand-gold-light': 'var(--brand-gold-light)',
        'brand-purple': 'var(--brand-purple)',
      },
    },
  },
  plugins: [],
}