<template>
  <button class="dropdown" @mouseover="show = true" @mouseleave="show = false">
    <div class="language">
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
          d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"
        />
      </svg>
      <span class="ml-2 mr-1">Language</span>
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-4 w-4"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M19 9l-7 7-7-7"
        />
      </svg>
    </div>
    <transition>
      <div v-if="show">
        <div
          class="dropdown-contents"
          @mouseover="show = true"
          @mouseleave="show = false"
        >
          <div class="menu">
            <!-- <div v-if="user" class="menu-name">
              <img
                width="50px"
                height="50px"
                src="https://i.gyazo.com/ea69860bb5555cb60c4860a3bd7b3e70.png"
              />
              <span class="menu-name-person">
                {{ user.name }}
              </span>
            </div> -->
            <div class="menu-me">
              <span
                v-for="locale in availableLocales"
                :key="locale.code"
                class="menu-me-link"
                @click="() => changeLocale(locale.code)"
              >
                {{ locale.name }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </button>
</template>
<script>
export default {
  data() {
    return {
      show: false,
    }
  },
  computed: {
    availableLocales() {
      return this.$i18n.locales.filter((i) => i.code !== this.$i18n.locale)
    },
  },
  methods: {
    search() {
      this.$router.push({
        path: `/user/${this.user.id}/cart`,
      })
    },
    /**
     * リロードあり
     * クッキーへ言語設定。リロード後、言語切替
     */
    // async changeLocale(locale) {
    //   await this.$i18n.setLocaleCookie(locale)
    //   this.$router.go(0)
    // },
    /**
     * リロードなし
     * クッキーと、$i18n独自ストアのlocaleに言語を設定する
     * 直接storeを書き換えるためリロードは不要
     */
    async changeLocale(locale) {
      await this.$i18n.setLocale(locale)
    },
  },
}
</script>
<style lang="scss" scoped>
.language {
  @apply relative flex items-center px-2 py-2 rounded;
  border: 1px solid #ccc;
}
.dropdown {
  @apply px-3 relative;
  height: 60px;
  &-icon {
    // @apply flex-shrink-0 inline-block cursor-pointer;
  }
  &-img {
    @apply object-cover rounded-full shadow cursor-pointer;
    width: 40px;
    height: 40px;
  }
  &-contents {
    @apply absolute top-0 right-0 z-50 rounded-lg shadow-lg overflow-y-auto cursor-default;
    background-color: var(--bg-secondary);
    @screen lg {
      margin-top: 60px;
      min-width: 100px;
      max-height: calc(100vh - 120px);
    }
  }
}
.menu {
  &-name {
    @apply flex items-center p-4;
    border-bottom: 1px solid #ccc;
    &-person {
      @apply ml-2;
      max-width: 140px;
    }
  }
  &-me {
    @apply flex flex-col items-start p-2;
    border-bottom: 1px solid #ccc;
    &-title {
      @apply text-sm font-bold pt-2;
      color: var(--sub-color);
    }
    &-link {
      @apply w-full text-center rounded-lg text-left p-2 duration-200;
      &:hover {
        @apply cursor-pointer;
        background: #f0f2f6;
        border-radius: 6px;
      }
    }
  }
}
</style>
