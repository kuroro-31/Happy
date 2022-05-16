<template>
  <div>
    <template v-if="!likes.length">
      {{ $t('お気に入りのコースはありません') }}
    </template>
    <template v-else>
      <div v-for="item in likes" :key="item.id" class="item flex">
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
    </template>
  </div>
</template>
<script>
export default {
  props: {
    likes: {
      type: Array,
      default: () => [],
    },
  },
}
</script>
<style lang="scss" scoped>
// 商品画像
.img {
  @apply object-cover cursor-pointer;
  height: 165px;
  min-height: 165px;
  max-height: 165px;
  width: 290px;
  min-width: 290px;
  max-width: 290px;
}
</style>
