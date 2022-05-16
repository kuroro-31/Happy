<template>
  <div class="item">
    <nuxt-link class="item-link" to="/user/setting">設定</nuxt-link>
    <nuxt-link class="item-link" to="/user/learning">受講中のコース</nuxt-link>
    <nuxt-link class="item-link" to="/user/like">お気に入り</nuxt-link>
    <nuxt-link class="item-link" to="/user/bought">購入履歴</nuxt-link>
    <nuxt-link class="item-link" to="/teacher/course">あなたのコース</nuxt-link>
    <nuxt-link class="item-link" to="/teacher/qa">あなたへのQ＆A</nuxt-link>
    <nuxt-link class="item-link" to="/teacher/review">
      コースへのレビュー
    </nuxt-link>
    <nuxt-link class="item-link" to="/teacher/sales">コース売上</nuxt-link>
    <nuxt-link to="/item/new" class="mt-4">
      <re-button class="re-button re-button-small">
        <button
          type="button"
          class="re-button-primary-filled bg-primary w-full"
        >
          コースを作成
        </button>
      </re-button>
    </nuxt-link>
  </div>
</template>
<style lang="scss" scoped>
.item {
  @apply duration-200 flex flex-col;
  &-title {
    @apply text-xs font-bold pt-2;
    color: var(--sub-color);
  }
  &-link {
    @apply duration-200 px-4 py-2 w-full h-full;
    color: var(--color);
    &:hover {
      @apply cursor-pointer;
      transform: translateX(5px);
      background: #f0f2f6;
      border-radius: 6px;
    }
  }
}
.title {
  color: var(--color);
}
</style>
