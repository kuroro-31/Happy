<template>
  <button
    v-if="isUser"
    class="dropdown"
    @mouseover="like = true"
    @mouseleave="like = false"
  >
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
        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
      />
    </svg>
    <transition>
      <div v-if="like">
        <div
          class="dropdown-contents"
          @mouseover="like = true"
          @mouseleave="like = false"
        >
          <div class="p-4">{{ $t('ほしいものリストは空です') }}</div>
        </div>
      </div>
    </transition>
  </button>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
  data() {
    return {
      like: false,
    }
  },
  computed: {
    ...mapGetters({
      isUser: 'user/auth',
    }),
  },
}
</script>
<style lang="scss" scoped>
.dropdown {
  @apply px-3 relative;
  height: 60px;
  &-contents {
    @apply absolute top-0 right-0 z-50 rounded shadow-lg overflow-y-auto cursor-default;
    background-color: var(--bg-secondary);
    @screen lg {
      margin-top: 60px;
      width: 300px;
      max-height: calc(100vh - 120px);
    }
  }
}
</style>
