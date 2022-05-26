<template>
  <div class="relative">
    <svg
      data-modal-toggle="defaultModal"
      xmlns="http://www.w3.org/2000/svg"
      class="h-6 w-6 cursor-pointer"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
      stroke-width="2"
      @click="open = !open"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
      />
    </svg>
    <div
      v-show="open"
      class="absolute top-0 right-0 w-48"
      @click.self="open = false"
    >
      <div class="">
        <span class="cursor-pointer" @click="edit">
          <i class="fas fa-pen mr-1"></i>
          記事を更新する
        </span>
        <div class="dropdown-divider"></div>
        <a class="cursor-pointer" @click="destroy">
          <i class="fas fa-trash-alt mr-1"></i>
          記事を削除する
        </a>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      open: false,
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
      window.location = `/articles/${this.articleId}`
    },
  },
}
</script>
<style lang="scss" scoped></style>
