<template>
  <div class="w-full h-screen mx-auto flex flex-col scroll-none">
    <HeaderNav />
    <div class="box-header">
      <div class="max-w-screen-lg w-full mx-auto">
        <UserCover />
        <UserProfile />
      </div>
    </div>
    <div class="box-content">
      <div class="max-w-screen-lg w-full mx-auto">
        <div class="w-full flex">
          <div class="pl-6 pr-4 mr-4 w-1/3">
            <div class="card mb-4">
              <div class="mb-4">
                <span class="item-title">{{ $t('自己紹介') }}</span>
                <div class="mt-2 text-lg whitespace-pre-line">
                  <template v-if="currentUser.description != ''">
                    {{ currentUser.description }}
                  </template>
                  <template v-else>{{ $t('自己紹介がありません。') }}</template>
                </div>
              </div>
              <div class="sns">
                <a v-if="currentUser.own_url" :href="currentUser.own_url">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"
                    />
                  </svg>
                </a>
                <a
                  v-if="currentUser.twitter_url"
                  :href="currentUser.twitter_url"
                  class="sns-link"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    style="fill: rgba(0, 0, 0, 1); transform: ; msfilter: "
                  >
                    <path
                      d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"
                    ></path>
                  </svg>
                </a>
                <a
                  v-if="currentUser.facebook_url"
                  :href="currentUser.facebook_url"
                  class="sns-link"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    style="fill: rgba(0, 0, 0, 1); transform: ; msfilter: "
                  >
                    <path
                      d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z"
                    ></path>
                  </svg>
                </a>
                <a
                  v-if="currentUser.linked_in_url"
                  :href="currentUser.linked_in_url"
                  class="sns-link"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    style="fill: rgba(0, 0, 0, 1); transform: ; msfilter: "
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M12.026 2c-5.509 0-9.974 4.465-9.974 9.974 0 4.406 2.857 8.145 6.821 9.465.499.09.679-.217.679-.481 0-.237-.008-.865-.011-1.696-2.775.602-3.361-1.338-3.361-1.338-.452-1.152-1.107-1.459-1.107-1.459-.905-.619.069-.605.069-.605 1.002.07 1.527 1.028 1.527 1.028.89 1.524 2.336 1.084 2.902.829.091-.645.351-1.085.635-1.334-2.214-.251-4.542-1.107-4.542-4.93 0-1.087.389-1.979 1.024-2.675-.101-.253-.446-1.268.099-2.64 0 0 .837-.269 2.742 1.021a9.582 9.582 0 0 1 2.496-.336 9.554 9.554 0 0 1 2.496.336c1.906-1.291 2.742-1.021 2.742-1.021.545 1.372.203 2.387.099 2.64.64.696 1.024 1.587 1.024 2.675 0 3.833-2.33 4.675-4.552 4.922.355.308.675.916.675 1.846 0 1.334-.012 2.41-.012 2.737 0 .267.178.577.687.479C19.146 20.115 22 16.379 22 11.974 22 6.465 17.535 2 12.026 2z"
                    ></path>
                  </svg>
                </a>
              </div>
            </div>
            <!-- <div class="card">
              <div class="">
                <span class="item-title">表彰</span>
              </div>
            </div> -->
          </div>
          <div class="w-2/3 flex flex-wrap">
            <div
              v-for="item in currentUser.posts"
              :key="item.id"
              class="item flex"
            >
              <nuxt-link
                :to="{ name: 'item-id', params: { id: item.id } }"
                class="relative flex flex-col items-start"
              >
                <button class="relative">
                  <img
                    v-if="item.src"
                    :src="item.src"
                    alt="text image"
                    class="img"
                    :value="item"
                  />
                  <img
                    v-else
                    src="@/assets/images/noimage.svg"
                    alt="cource image"
                    class="img"
                    :value="item"
                  />
                </button>
                <span v-if="item.title" class="title">
                  {{ item.title }}
                </span>
                <span v-else class="title">{{ $t('無題のタイトル') }}</span>
                <!-- <div class="">{{ item.user.name }}</div> -->
                <!-- <ArticleLike /> -->
              </nuxt-link>
            </div>
          </div>
        </div>
      </div>
    </div>
    <FooterNav />
  </div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
  data() {
    return {
      items: [],
      name: this.$route.params.name,
      // saved: false,
      // currentUser: {},
      loading: false,
    }
  },
  head() {
    const i18nHead = this.$nuxtI18nHead({ addSeoAttributes: true })
    return {
      title: `${this.currentUser.name}さんのプロフィール | Reshelf`,
      ...i18nHead.title,
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: this.currentUser.description,
        },
        {
          hid: 'og:title',
          property: 'og:title',
          content: `${this.currentUser.name}のプロフィール | Reshelf`,
        },
        {
          hid: 'og:description',
          property: 'og:description',
          content: this.currentUser.description,
        },
        ...i18nHead.meta,
      ],
    }
  },
  computed: {
    ...mapGetters({
      isUser: 'user/auth',
      user: 'user/user',
      currentUser: 'user/currentUser',
      carts: 'cart/carts',
    }),
  },
  // watch: {
  //   user: {
  //     // eslint-disable-next-line
  //     handler: _.debounce(function () {
  //       this.update()
  //     }, 2000), // 更新されたら保存処理
  //     deep: true,
  //   },
  //   saved: {
  //     // 保存完了後にアラートを消す
  //     // eslint-disable-next-line
  //     handler: _.debounce(function () {
  //       this.clearAlert()
  //     }, 2000),
  //     deep: true,
  //   },
  // },
  created() {
    if (this.currentUser == null || this.currentUser.name != this.name) {
      this.getCurrentUser()
    }
  },
  methods: {
    async getCurrentUser() {
      await this.$store.dispatch('user/getCurrentUser', this.name)
    },
    async update() {
      await this.$axios.$patch(`/api/users/${this.user.id}`, this.user)
      this.$store
        .dispatch('user/update', this.user)
        .then(() => {
          this.success = true
          setTimeout(() => (this.success = false), 3000)
        })
        .catch(() => {
          this.error = true
          setTimeout(() => (this.error = false), 3000)
        })
    },
  },
}
</script>
<style lang="scss" scoped>
.side-nav {
  @apply hidden w-full lg:block my-6 lg:w-1/4 xl:w-1/5 z-10 lg:sticky overflow-y-auto;
}
.box-header {
  @apply w-full flex justify-center mx-auto;
  background: var(--bg-secondary);
}
.box-content {
  @apply w-full flex justify-center mx-auto py-8;
}
.item {
  &-title {
    @apply text-xs font-bold pt-4;
    color: var(--sub-color);
  }
}
.sns {
  @apply flex items-center justify-end;
  a {
    @apply mx-1;
  }
  &-link {
    svg {
      path {
        // stroke: rgba(var(--primary)) !important;
        fill: var(--color);
      }
    }
  }
}
// 商品画像
.img {
  @apply object-cover cursor-pointer;
  height: 165px;
  min-height: 165px;
  max-height: 165px;
  width: 290px;
  min-width: 290px;
  max-width: 290px;

  // height: 100px;
  // min-height: 100px;
  // max-height: 100px;

  // height: 200px;
  // min-height: 200px;
  // max-height: 200px;
  // width: 150px;
  // min-width: 150px;
  // max-width: 150px;
}
// .button_loading {
//   &::after {
//     content: '';
//     position: absolute;
//     width: 22px;
//     height: 22px;
//     top: 0;
//     left: 0;
//     right: 0;
//     bottom: 0;
//     margin: auto;
//     border: 2px solid transparent;
//     border-top-color: var(--bg-secondary)fff;
//     border-radius: 50%;
//     animation: button-loading-spinner 1s ease infinite;
//   }
//   .button_text {
//     @apply duration-200;
//     visibility: hidden;
//     opacity: 0;
//   }
// }

// @keyframes button-loading-spinner {
//   from {
//     transform: rotate(0turn);
//   }

//   to {
//     transform: rotate(1turn);
//   }
// }
</style>
