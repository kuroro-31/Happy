export default {
  strategy: 'no_prefix',

  detectBrowserLanguage: {
    useCookie: true,
    cookieKey: 'i18n_redirected',
    redirectOn: 'root',
    alwaysRedirect: true,
    cookieCrossOrigin: true,
  },

  defaultLocale: 'en',

  vueI18n: {
    fallbackLocale: 'en',
    formatFallbackMessages: true,
  },

  langDir: 'assets/locales/',

  locales: [
    {
      code: 'ja',
      name: '日本語',
      iso: 'ja-JP',
      file: 'ja.js',
      description: 'Japanese',
    },
    {
      code: 'en',
      name: 'English',
      iso: 'en-US',
      file: 'en.js',
      description: 'English',
    },
  ],

  vueI18nLoader: true,

  lazy: true,

  seo: true,
}
