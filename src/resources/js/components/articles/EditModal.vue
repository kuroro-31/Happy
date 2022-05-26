<template>
  <div class="relative" @mouseleave="open = false">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      class="h-6 w-6 cursor-pointer"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
      stroke-width="2"
      @mouseover="open = true"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
      />
    </svg>
    <transition>
      <div
        v-show="open"
        class="absolute right-0 -top-2 w-48 z-50 rounded shadow-lg p-4 bg-white"
      >
        <div>
          <span class="cursor-pointer" @click="edit">
            <i class="fas fa-pen mr-1 hover:text-primary"></i>
            記事を更新する
          </span>
          <div class="dropdown-divider"></div>
          <span @click="destroy" class="cursor-pointer">
            <i class="fas fa-trash-alt mr-1 hover:text-primary"></i>
            記事を削除する
          </span>
        </div>
      </div>
    </transition>
  </div>
</template>
<script>
export default {
  data() {
    return {
      open: false,
      errors: {},
      success: false,
      loaded: true,
    }
  },
  props: {
    articleId: {
      type: Object,
      default: {},
    },
  },
  methods: {
    edit() {
      window.location = `/articles/${this.articleId}/edit`
    },
    destroy() {
      if (this.loaded) {
        axios.delete(`/articles/${this.articleId}`).then(() => {
          alert('成功！')
        })
      }
    },
  },
}
</script>
<style lang="scss" scoped></style>
