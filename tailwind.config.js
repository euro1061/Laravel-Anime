module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'netflix': '#e50914',
        'bg_nf': '#141414',
        'header': '#182444',
        'header_bg': '#0F1A34',
        'menu':'#081533'
      }
    },
    fontFamily:{
      body: ['Prompt', 'sans-serif']
    }
  },
  variants: {
    extend: {
      scale: ['active', 'group-hover'],
      zIndex: ['hover', 'active','group-hover'],
    },
  },
  plugins: [
    require('@tailwindcss/line-clamp')
  ],
}
