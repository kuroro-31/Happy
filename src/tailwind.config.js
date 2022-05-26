module.exports = {
    mode: 'jit',
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
      extend: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            'primary': '#1966D2',
            'gray': '#B0B3B8',

            'white': '#ffffff',
            'purple': '#3f3cbb',
            'midnight': '#121063',
            'metal': '#565584',
            'tahiti': '#3ab7bf',
            'silver': '#ecebff',
            'bubble-gum': '#ff77e9',
            'bermuda': '#78dcca',
        },
      },
    },
    plugins: []
}

