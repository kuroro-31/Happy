<template>
  <div class="flex flex-col">
    <div class="sidebar-search scroll-none">
      <span class="text-xs">{{ $t('合計') }}</span>
      <span class="text-4xl font-bold mb-4 text-black">
        <!-- {{ $moneyFormat(totalPrice) }} -->
        <AnimatedNumber :value="$moneyFormat(totalPrice)" />
      </span>
    </div>

    <div class="sidebar-search-btn">
      <re-button class="re-button re-button-extra-large no-shadow w-full">
        <button
          type="submit"
          class="re-button-primary bg-primary w-full"
          @click="checkout"
        >
          <!-- Search -->
          {{ $t('購入する') }}
        </button>
      </re-button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    carts: {
      type: Array,
      default: () => [],
    },
  },
  data() {
    return {
      isDisabled: false,
    }
  },
  computed: {
    totalPrice() {
      let carts = this.carts
      let totalPrice = null

      for (let post of carts) {
        totalPrice += post.price
      }

      return totalPrice
    },
  },
  methods: {
    checkout(products) {
      this.$store.dispatch('cart/checkout', products)
    },
  },
}
</script>

<style lang="scss" scoped>
.sidebar-search {
  @apply flex flex-col w-full;
  color: var(--sub-color);
}
</style>
