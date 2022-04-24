module.exports = {
  content: ["./templates/**/*.{html,js}"],
  theme: {
    extend: {
      colors: {
        'black-semi': 'rgba(0, 0, 0, 0.5)'
      }
    },
    maxHeight: {
      '3/4': '75%'
    },
    minHeight: {
      '48': '12rem'
    }
  },
  plugins: [],
}