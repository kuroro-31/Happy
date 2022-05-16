<template>
  <div>
    <Nuxt />
  </div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
  head() {
    const i18nHead = this.$nuxtI18nHead({ addSeoAttributes: true })
    return {
      title: this.$t('head.title'),
      ...i18nHead.title,
      htmlAttrs: {
        lang: this.$i18n.locale,
        ...i18nHead.htmlAttrs,
      },
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: this.$t('head.content'),
        },
        {
          hid: 'og:title',
          property: 'og:title',
          content: this.$t('head.title'),
        },
        {
          hid: 'og:description',
          property: 'og:description',
          content: this.$t('head.content'),
        },
        ...i18nHead.meta,
      ],
      link: [
        {
          hid: 'apple-touch-icon',
          rel: 'apple-touch-icon',
          sizes: '180x180',
          href: '/apple-touch-icon.png',
        },
        ...i18nHead.link,
      ],
    }
  },
  computed: {
    // TODO Storeチェックが終わったら最後消す
    ...mapGetters({
      isUser: 'user/auth',
      user: 'user/user',
      currentUser: 'user/currentUser',
      product: 'product/allProduct',
      carts: 'cart/carts',
    }),
  },
  mounted() {
    this.setDefaultLang()
  },
  methods: {
    // NOTE ブラウザ言語がjp以外はサイト言語をenで返す
    async setDefaultLang() {
      let result = null
      const brawserLang = window.navigator.language

      if (brawserLang == 'ja' || brawserLang == 'ja-JP') {
        result = 'ja'
      } else {
        result = 'en'
      }

      await this.$i18n.setLocale(result)
    },
  },
}
</script>
