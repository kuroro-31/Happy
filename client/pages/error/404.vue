<template>
  <div class="relative">
    <div id="login" class="login">
      <div class="w-full h-full flex flex-col items-center justify-center">
        <div class="login-title flex flex-col items-center z-20">
          <h1>404</h1>
          <h2 class="mt-4 text-white font-bold text-3xl">
            {{ $t('ページが見つかりませんでした。') }}
          </h2>
        </div>
        <div class="login-content">
          <div class="py-5">
            <div class="text-center sm:text-left whitespace-nowrap">
              <nuxt-link
                class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-xs rounded text-gray-500 bg-gray-200 focus:outline-none focus:bg-gray-300 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset"
                to="/"
              >
                <span class="inline-block ml-1">{{ $t('ホームへ戻る') }}</span>
              </nuxt-link>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg"></div>
  </div>
</template>
<script>
export default {
  data: () => ({
    form: {
      email: '',
      password: '',
    },
  }),
  methods: {
    async login() {
      await this.$store.dispatch('user/login', this.form)
    },
  },
}
</script>
<style lang="scss" scoped>
.login {
  @apply h-screen w-screen overflow-hidden flex justify-center;
  // background-image: url('https://source.unsplash.com/1920x1080/?happy');
  // background-position: center !important;
  // background-repeat: no-repeat !important;
  // background: #16afaf;
  // background: rgba(var(--primary));
  background: rgb(69, 200, 171);
  background: linear-gradient(
    138deg,
    rgba(69, 200, 171, 1) 0%,
    rgba(51, 153, 228, 1) 100%
  );
  height: 100vh;
  width: 100vw;
  // object-fit: cover !important;
  &-title {
    h1 {
      @apply text-9xl font-bold mt-4;
      color: var(--fff);
    }
  }
  &-content {
    @apply z-20 mt-8 rounded-lg;
  }
}
.bg {
  @apply absolute w-screen h-screen top-0 right-0 left-0 bottom-0 m-0 p-0 z-10;
  background: rgba(#000000, 0.6);
}
</style>
