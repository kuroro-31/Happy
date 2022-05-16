require('dotenv').config()

import webpack from 'webpack'
import i18n from './nuxt-i18n.config'
export default {
  ssr: true,
  head: {
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { 'http-equiv': 'X-UA-Compatible', content: 'IE=edge' },
      { hid: 'og:site_name', property: 'og:site_name', content: 'Reshelf' },
      { hid: 'og:type', property: 'og:type', content: 'website' },
      { hid: 'og:url', property: 'og:url', content: 'http://www.reshelf.jp/' },
      {
        hid: 'og:image',
        property: 'og:image',
        content:
          'https://res.cloudinary.com/Reshelf/image/upload/v1619870944/ogp_rzf3q1.png',
      },
      { name: 'twitter:card', content: 'summary_large_image' },
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
    script: [],
  },

  components: {
    dirs: [
      '@/components',
      '@/components/atoms',
      '@/components/atoms/item',
      '@/components/layout',
      '@/components/layout/header',
      '@/components/layout/sidebar',
      '@/components/pages',
      '@/components/pages/name',
    ],
  },

  loading: {
    color: '#3f85fc',
  },

  router: {
    extendRoutes(routes, resolve) {
      routes.push({
        name: '404error',
        path: '*',
        component: resolve('@/pages/error/404.vue'),
      })
      routes.push({
        name: '500error',
        path: '*',
        component: resolve('@/pages/error/500.vue'),
      })
    },
  },

  css: [
    'ress',
    { src: '@/assets/sass/app.scss', lang: 'scss' },
    'boxicons/css/boxicons.min.css',
    {
      src: '~/node_modules/highlight.js/styles/tomorrow-night-bright.css',
      lang: 'css',
    },
  ],

  styleResources: {
    scss: [
      '~/assets/sass/foundation/_variables.scss',
      '~/assets/sass/foundation/_mixin.scss',
    ],
  },

  plugins: [
    '@/plugins/vue-highlightjs',
    { src: '@/plugins/persistedstate.js', mode: 'client' },
    { src: '@/plugins/vuelidate.js', mode: 'client' },
    // mixins
    '@/plugins/mixins/validation.js',
    // util
    '@/plugins/util/comma.js',
    '@/plugins/util/moneyFormat.js',
    '@/plugins/util/numberFormat.js',
  ],

  build: {
    // 保存時にESlintの実行
    extend(config, ctx) {
      // Run ESLint on save
      if (ctx.isDev && ctx.isClient) {
        config.module.rules.push({
          enforce: 'pre',
          test: /\.(js|vue)$/,
          loader: 'eslint-loader',
          exclude: /(node_modules)/,
        })
      }
    },
    cache: true,
    parallel: true,
    hardSource: true,
    standalone: true,
    // analyze: true,

    plugins: [
      new webpack.ProvidePlugin({
        _: 'lodash',
      }),
    ],
  },

  // ngrok: {
  //   authtoken: process.env.NGROK_AUTHTOKEN,
  //   addr: 3000,
  //   region: 'jp',
  // },

  buildModules: [
    '@nuxtjs/eslint-module',
    '@nuxtjs/tailwindcss',
    '@nuxtjs/style-resources',
    // '@nuxtjs/color-mode',
    // '@nuxtjs/ngrok',
  ],
  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/proxy',
    '@nuxtjs/auth',
    '@nuxtjs/pwa',
    'nuxt-client-init-module',
    ['nuxt-i18n', i18n],
    '@nuxtjs/sitemap',
  ],
  axios: {
    proxy: true,
  },
  proxy: {
    '/api': {
      target: process.env.ROOT_URL,
      changeOrigin: true,
    },
    '/sanctum': {
      target: process.env.ROOT_URL,
      changeOrigin: true,
    },
  },
}
