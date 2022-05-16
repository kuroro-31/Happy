<template>
  <div class="w-full mx-auto flex flex-col scroll-none">
    <HeaderNav />

    <FooterNav />
  </div>
</template>
<script>
export default {
  head: {
    title: 'ヘルプとサポート | Reshelf',
    meta: [
      {
        hid: 'ヘルプとサポート',
        name: 'ヘルプとサポート',
        content:
          'Reshelfのヘルプとサポートページです。Reshelfご利用時のお客様のトラブルや質問についてお答えします。',
      },
    ],
  },
}
</script>
<style lang="scss" scoped>
main {
  @apply w-full h-full mx-auto flex flex-col items-center;
  max-width: 1000px;
}
ul {
  li,
  ul li,
  ul ul li {
    @apply my-2;
  }
}
</style>
