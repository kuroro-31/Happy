<template>
  <div class="w-full h-screen mx-auto flex flex-col scroll-none">
    <HeaderNav />
    <div class="w-full flex max-w-screen-lg mx-auto container scroll-none">
      <div class="lg:flex w-full">
        <nav
          class="card side-nav lg:max-h-(screen-22) pin-22 scroll-none mb-auto"
        >
          <SidebarSetting class="divider" />
        </nav>
        <div class="main-body scroll-none">
          <div class="main-body-content">
            <h2 class="text-3xl font-bold mb-4">プロフィール編集</h2>
            <!-- <all-item :items="items" /> -->
            <div class="">
              <!-- <div class="">{{ user.name }}</div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <FooterNav /> -->
  </div>
</template>
<script>
export default {
  async asyncData({ $axios }) {
    const { data } = await $axios.$get(`/api/user`)
    console.log(data)
    return {
      user: data,
    }
  },
  data() {
    return {
      user: [],
    }
  },
}
</script>
<style lang="scss" scoped>
.side-nav {
  @apply hidden w-full lg:block my-6 lg:w-1/4 xl:w-1/5 z-10 lg:sticky overflow-y-auto;
  // @screen lg {
  //   border-right: 1px #ddd solid;
  // }
  // @screen lg {
  //   @apply overflow-y-auto;
  //   max-height: calc(100vh - 68px - 48px);
  // }
}
.main-body {
  // @apply w-full lg:w-3/4 xl:w-3/5 pt-10 px-6 lg:px-12;
  // @apply w-full lg:w-3/4 xl:w-3/5 p-6;
  @apply w-full lg:w-3/4 xl:w-4/5 p-6 lg:pl-10;
  // @screen lg {
  //   @apply overflow-y-auto;
  //   height: calc(100vh - 68px);
  // }
}
</style>
