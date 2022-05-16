<template>
  <div class="relative">
    <div id="login" class="login">
      <div class="w-full h-full flex items-center justify-center">
        <div class="login-title flex flex-col z-20">
          <h1 class="logo">Reshelf</h1>
          <h2>ログインまたはアカウントを作成</h2>
        </div>
        <div class="login-content">
          <div class="shadow w-full divide-y divide-gray-200">
            <form class="px-5 py-7" @submit.prevent="login">
              <!-- メールアドレス -->
              <label class="font-semibold text-xs text-gray-600 pb-1 block">
                E-mail
              </label>
              <input
                v-model.trim="form.email"
                type="email"
                placeholder="Enter email"
                autofocus
                class="border rounded px-3 py-2 mt-1 mb-5 text-xs w-full"
              />
              <!-- <small v-if="errors.email" class="form-text text-danger">
                {{ errors.email[0] }}
              </small> -->

              <!-- パスワード -->
              <label class="font-semibold text-xs text-gray-600 pb-1 block">
                Password
              </label>
              <input
                v-model.trim="form.password"
                type="password"
                placeholder="Password"
                class="border rounded px-3 py-2 mt-1 mb-5 text-xs w-full"
              />
              <!-- <small v-if="errors.password" class="form-text text-danger">
                {{ errors.password[0] }}
              </small> -->

              <!-- ログインボタン -->
              <re-button class="re-button re-button-small">
                <button
                  type="submit"
                  class="re-button-primary-filled bg-primary"
                >
                  Login
                </button>
              </re-button>
            </form>

            <div class="py-5">
              <div class="grid grid-cols-2 gap-1">
                <div class="text-center sm:text-left whitespace-nowrap">
                  <button
                    class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-xs rounded text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      class="w-4 h-4 inline-block align-text-top"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"
                      />
                    </svg>
                    <span class="inline-block ml-1">Forgot Password</span>
                  </button>
                </div>
                <div class="text-center sm:text-right whitespace-nowrap">
                  <button
                    class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-xs rounded text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      class="w-4 h-4 inline-block align-text-bottom"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"
                      />
                    </svg>
                    <span class="inline-block ml-1">Help</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="py-5">
            <div class="grid grid-cols-2 gap-1">
              <div class="text-center sm:text-left whitespace-nowrap">
                <nuxt-link
                  class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-xs rounded text-gray-500 hover:bg-gray-200 focus:outline-none focus:bg-gray-300 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset"
                  to="/"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    class="w-4 h-4 inline-block align-text-top"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10 19l-7-7m0 0l7-7m-7 7h18"
                    />
                  </svg>
                  <span class="inline-block ml-1">Back to your-app.com</span>
                </nuxt-link>
              </div>
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
.logo {
  @apply text-6xl font-bold mt-6 text-white;
  font-family: 'Julius Sans One', sans-serif;
}
.login {
  @apply h-screen w-screen overflow-hidden flex justify-center;
  // background-image: url('https://source.unsplash.com/3000x3000?stylish');
  // background-position: center !important;
  // background-repeat: no-repeat !important;
  background: rgb(69, 200, 171);
  background: linear-gradient(
    138deg,
    rgba(69, 200, 171, 1) 0%,
    rgba(51, 153, 228, 1) 100%
  );
  height: 100vh;
  width: 100vw;
  // background: #16afaf;
  // background: rgba(var(--primary));

  object-fit: cover !important;
  &-title {
    h2 {
      @apply text-2xl font-bold mt-4;
      color: var(--fff);
    }
  }
  &-content {
    @apply md:ml-28 rounded-lg;
    background: #fff;
    z-index: 9999;
  }
}
.bg {
  @apply absolute w-screen h-screen top-0 right-0 left-0 bottom-0 m-0 p-0 z-10;
  background: rgba(#000000, 0.3);
}
</style>
