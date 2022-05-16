<template>
  <button class="dropdown" @mouseover="show = true" @mouseleave="show = false">
    <div class="relative">
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
          d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
        />
      </svg>
      <BadgeNormal v-if="cartsCount > 0" class="badge">
        {{ cartsCount }}
      </BadgeNormal>
    </div>
    <transition>
      <div v-if="show">
        <div
          class="dropdown-contents"
          @mouseover="show = true"
          @mouseleave="show = false"
        >
          <div v-if="cartsCount > 0" class="cart-content">
            <!-- <p class="cart-content-name">My Cart</p>
            <p class="divider"></p> -->

            <CartItem />

            <re-button class="pt-4 re-button re-button-small">
              <button
                class="re-button-primary-filled bg-primary w-full duration-500"
                @click="toCheckout"
              >
                {{ $t('レジに進む') }}
              </button>
            </re-button>
          </div>
          <div v-else class="p-4">{{ $t('カートに商品がありません') }}</div>
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
      show: false,
    }
  },
  computed: {
    ...mapGetters({
      user: 'user/user',
      carts: 'cart/carts',
    }),
    cartsCount() {
      let length = null
      // if (this.carts != null) {
      length = this.carts.length
      // }
      return length
    },
  },
  created() {
    if (this.carts == null) {
      this.$store.dispatch('cart/get')
    }
  },
  methods: {
    toCheckout() {
      this.$router.push({
        path: `/user/${this.user.id}/cart`,
      })
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
    @apply absolute top-0 right-0 z-50 rounded shadow-lg overflow-y-auto cursor-default;
    background-color: var(--bg-secondary);
    @screen lg {
      margin-top: 60px;
      min-width: 300px;
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
    height: 50px;
    width: 40px;
  }
  &-box {
    @apply w-full flex items-start pl-4;
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
