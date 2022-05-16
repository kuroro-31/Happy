<template>
  <div>
    <div
      v-for="item in carts"
      :key="item.id"
      class="cart-content-products scroll-none"
    >
      <!-- 商品１ -->
      <div class="w-full flex py-4">
        <img
          v-if="item.thumbnail"
          :src="item.thumbnail"
          alt="text image"
          class="cart-content-img"
          :value="item"
        />
        <img
          v-else
          src="@/assets/images/noimage.svg"
          alt="cource image"
          class="cart-content-img"
          :value="item"
        />
        <div class="cart-content-box">
          <div class="w-full flex flex-col items-start">
            <p class="cart-content-title">
              {{ item.title }}
            </p>
            <p class="cart-content-author">{{ item.name }}</p>
          </div>
          <div class="cart-content-price">
            {{ $moneyFormat(item.price) }}
          </div>
        </div>
      </div>
      <p class="divider"></p>
    </div>

    <div class="flex text-lg font-bold">
      <span class="mr-4">{{ $t('合計') }}:</span>
      <span>{{ $moneyFormat(totalPrice) }}</span>
    </div>
  </div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
  computed: {
    ...mapGetters({
      carts: 'cart/carts',
    }),
    totalPrice() {
      let carts = this.carts
      let totalPrice = null

      for (let post of carts) {
        totalPrice += post.price
      }

      return totalPrice
    },
  },
}
</script>
<style lang="scss" scoped>
.dropdown {
  @apply px-3 relative;
  height: 60px;
  &-icon {
    // @apply flex-shrink-0 inline-block cursor-pointer;
  }
  &-img {
    @apply object-cover rounded-full shadow-lg cursor-pointer;
    width: 40px;
    height: 40px;
  }
  &-contents {
    @apply absolute top-0 right-0 z-50 rounded-lg shadow-lg overflow-y-auto cursor-default;
    background-color: var(--bg-secondary);
    @screen lg {
      margin-top: 60px;
      width: 300px;
      max-height: calc(100vh - 120px);
    }
  }
}
.cart-content {
  @apply overflow-auto flex flex-col p-4 items-start;
  &-name {
    @apply pb-2 text-lg font-bold;
  }
  &-img {
    @apply object-cover shadow-lg cursor-pointer;
    width: 100px;
    max-width: 100px;
  }
  &-box {
    @apply w-full flex flex-col items-start pl-4;
    width: 228px;
  }
  &-products {
    @apply overflow-y-auto;
    max-height: 300px;
  }
  &-title {
    @apply w-full font-bold break-words text-left;
  }
  &-author {
    @apply w-full truncate text-sm text-grey text-left pt-2;
  }
  &-price {
    @apply pl-2 whitespace-nowrap;
  }
}
</style>
