<template>
  <div>
    <div class="user-cover">
      <img
        v-if="currentUser.cover"
        :src="currentUser.cover"
        :alt="currentUser.name + ' cover image'"
        class="img"
        :value="item"
      />
      <img
        v-else
        src="https://source.unsplash.com/1024x300?white"
        :alt="currentUser.name + ' cover image'"
      />
      <template v-if="user.id == currentUser.id">
        <div class="user-cover-edit" @click="modal = !modal">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
            />
          </svg>
          <span class="ml-2">
            {{ $t('プロフィールを編集') }}
          </span>
        </div>
        <ReModal v-if="modal" @close=";(modal = !modal), (loading = false)">
          <template slot="header">
            {{ $t('プロフィールを編集') }}
          </template>
          <!-- default -->
          <div class="w-full flex flex-col justify-center">
            <!-- タイトル -->
            <label class="font-semibold text-xs text-gray-600 pb-1 block">
              {{ $t('名前') }}
            </label>
            <input
              v-model="user.name"
              type="text"
              autofocus
              class="border rounded px-3 py-2 mt-1 mb-5 text-xs w-full"
            />

            <ReButton class="re-button w-auto">
              <button
                :class="{ button_loading: loading == true }"
                class="re-button-primary-filled bg-primary relative"
                @click="update, (loading = true)"
              >
                <span class="button_text">{{ $t('保存') }}</span>
              </button>
            </ReButton>
          </div>
        </ReModal>
      </template>
    </div>
    <Toast :success="success" :error="error">
      <template v-if="success">
        {{ $t('更新しました') }}
      </template>
      <template v-else-if="error">
        {{ $t('更新に失敗しました') }}
      </template>
    </Toast>
  </div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
  data() {
    return {
      number: 32000,
      modal: false,
      loading: false,
      success: false,
      error: false,
    }
  },
  computed: {
    ...mapGetters({
      currentUser: 'user/currentUser',
    }),
    user: {
      get() {
        return Object.assign({}, this.$store.getters['user/user'])
      },
      set(value) {
        this.$store.dispatch('user/update', value)
      },
    },
  },
  methods: {
    async create() {
      await this.$store.dispatch('product/create')
    },
  },
}
</script>
<style lang="scss" scoped>
.user {
  &-cover {
    @apply relative;
    &-edit {
      @apply absolute flex items-center rounded py-2 px-4 font-bold cursor-pointer;
      background: var(--bg-secondary);
      right: 1.5rem;
      bottom: 1.5rem;
      &:hover {
        background: #f0f2f6;
      }
    }
    img {
      @apply rounded-lg object-cover;
      @screen lg {
        min-width: 1024px;
        max-width: 1024px;
        min-height: 300px;
        max-height: 300px;
      }
      // @media screen and (min-width: 1200px) and (max-width: 1440px) {
      //   min-height: 250px;
      //   max-height: 250px;
      // }
    }
  }
}
</style>
