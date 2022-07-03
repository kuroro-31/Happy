// prettier-ignore
module.exports = {
    mode: 'jit',
    darkMode: 'class',
    important: true,
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
      extend: {
        colors: {
            'transparent': 'transparent',
            'current': 'currentColor',
            // 'primary': '#3AA2FF',
            'primary': '#0079d8',
            // 'primary': '#08a698',
            // 'primary': '#1F51C5',
            // 'primary': '#009FFF',
            'primary-light': '#9cc4ff',
            'gray': '#B0B3B8',
            'gray-2': '#E3E6EA',
            'gray-3': '#cacccf',
            // white
            'white': '#ffffff',
            'white-1': '#F2F1F7',
            'white-2': '#f6f6f6',
            'f5': '#F5F5F5',
            // dark
            'dark': '#000',
            'dark-1': '#1C1C1F',
            'dark-2': '#3A393D',
            'dark-3': '#2c62f6',
            'dark-blue': '#022f61',
            //color
            't-color': '#3c4043',
            // 't-color': '#455078',
            't-d-color': '#b1b8ca',
            't-d-color-2': '#96969B',
            'red': '#F9197F',
            'blue': '#4e86ff',
            'yellow': '#FFBD64',
            'purple': '#3f3cbb',
            'green': '#08a698',
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
