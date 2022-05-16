<template>
  <div v-if="isUser" class="w-full h-screen mx-auto flex flex-col scroll-none">
    <HeaderNav />
    <div class="main scroll-none">
      <span class="title">{{ $t('ショッピングカート') }}</span>

      <div v-if="carts != null" class="lg:flex w-full">
        <div class="main-body min-h-(screen-16) scroll-none">
          <CartItem :carts="carts" />
          <!-- <FooterNav /> -->
        </div>
        <nav class="side-nav lg:max-h-(screen-22) pin-22 scroll-none">
          <SidebarCart :carts="carts" />
        </nav>
      </div>
      <div v-else class="p-8">{{ $t('カートに商品がありません') }}</div>
    </div>
    <!-- <FooterNav /> -->
  </div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
  computed: {
    ...mapGetters({
      isUser: 'user/auth',
      carts: 'cart/carts',
    }),
  },
  created() {
    this.$store.dispatch('cart/get')
  },
}
</script>
<style lang="scss" scoped>
.main {
  @apply w-full flex flex-col max-w-screen-lg mx-auto container mt-10;
}
.title {
  @apply font-bold cursor-pointer text-3xl mb-4 pb-2;
  border-bottom: 1px var(--thin-gray) solid;
}
.side-nav {
  @apply hidden w-full lg:block lg:w-1/4 pl-6 z-10 lg:sticky overflow-y-auto;
  // @screen lg {
  //   border-right: 1px var(--thin-gray) solid;
  // }
}
.main-body {
  // @apply w-full lg:w-3/4 xl:w-3/5 pt-10 px-6 lg:px-12;
  // @apply w-full lg:w-3/4 xl:w-3/5 p-6;
  @apply w-full lg:w-3/4 px-6 lg:pl-0;
}
</style>
