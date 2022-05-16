<template>
  <div>
    <button
      v-if="isUser"
      class="dropdown"
      @mouseover="dropdown = true"
      @mouseleave="dropdown = false"
    >
      <img
        v-if="user.icon"
        :src="user.icon"
        :alt="user.name + ' icon image'"
        class="dropdown-img"
      />
      <img
        src="https://source.unsplash.com/40x40?woman"
        :alt="user.name + ' icon image'"
        class="dropdown-img"
      />
      <transition>
        <div
          v-if="dropdown"
          class="dropdown-contents scroll-none"
          @mouseover="dropdown = true"
          @mouseleave="dropdown = false"
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
              <nuxt-link
                class="menu-me-link"
                :to="{ name: 'name', params: { name: user.name } }"
              >
                {{ $t('マイページ') }}
              </nuxt-link>
            </div>
            <div class="menu-me">
              <div class="">
                <select v-model="$colorMode.preference">
                  <option value="system">System</option>
                  <option value="light">Light</option>
                  <option value="dark">Dark</option>
                </select>
              </div>
              <button class="menu-me-link" @click="logout">
                {{ $t('ログアウト') }}
              </button>
            </div>
          </div>
        </div>
      </transition>
    </button>

    <div v-if="!isUser" class="py-2.5 ml-4">
      <nuxt-link to="/auth/login">
        <re-button class="re-button">
          <button type="submit" class="re-button-primary-filled bg-primary">
            {{ $t('新規登録・ログイン') }}
          </button>
        </re-button>
      </nuxt-link>
    </div>
  </div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
  data() {
    return {
      dropdown: false,
      // alert: '',
    }
  },
  computed: {
    ...mapGetters({
      isUser: 'user/auth',
      user: 'user/user',
      carts: 'cart/carts',
    }),
  },
  methods: {
    async login() {
      this.modal = false
      await this.$store.dispatch('user/login', this.form)
    },
    async logout() {
      await this.$store.dispatch('user/logout', this.auth)
    },
  },
}
</script>
<style lang="scss" scoped>
.dropdown {
  @apply px-3 relative;
  height: 60px;
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
      min-width: 200px;
      max-height: calc(100vh - 120px);
    }
  }
}
.menu {
  &-me {
    @apply flex flex-col items-start p-2;
    border-bottom: 1px solid #ccc;
    &-title {
      @apply text-sm font-bold pt-2;
      color: var(--sub-color);
    }
    &-link {
      @apply p-3 w-full rounded-lg text-left duration-200;
      &:hover {
        @apply cursor-pointer;
        background: #f0f2f6;
        border-radius: 6px;
      }
    }
  }
}
</style>
