<template>
  <div class="w-full h-screen mx-auto flex flex-col scroll-none">
    <HeaderNav />
    <div class="main scroll-none">
      <div class="lg:flex w-full">
        <DetailItem :item="item" />
        <!-- <FooterNav /> -->
      </div>
    </div>
    <!-- <FooterNav /> -->
  </div>
</template>
<script>
export default {
  async asyncData({ $axios, params }) {
    const { data } = await $axios.$get(`/api/posts/${params.id}`)
    return {
      item: data,
    }
  },
  data() {
    return {
      item: [],
    }
  },
}
</script>
<style lang="scss" scoped>
.main {
  @apply w-full flex max-w-screen-md mx-auto container;
  // margin-top: -420px;
}
.side-nav {
  @apply hidden w-full lg:block lg:w-1/4 z-10 lg:sticky overflow-y-auto;
  // @screen lg {
  //   border-right: 1px var(--thin-gray) solid;
  // }
  @screen lg {
    @apply overflow-y-auto;
    height: calc(100vh - 68px);
  }
}
.main-body {
  // @apply w-full lg:w-3/4 xl:w-3/5 pt-10 px-6 lg:px-12;
  // @apply w-full lg:w-3/4 xl:w-3/5 p-6;
  @apply w-full lg:w-3/4 pr-8;
  @screen lg {
    @apply overflow-y-auto;
    height: calc(100vh - 68px);
  }
}
</style>
