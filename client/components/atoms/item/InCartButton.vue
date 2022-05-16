<template>
  <div class="">
    <ReButton class="re-button re-button-small">
      <button
        :disabled="isClick"
        class="w-full"
        :class="
          isClick != true
            ? 're-button-primary-filled bg-primary'
            : 're-button-primary-border cursor-disabled'
        "
        @click="addCart(item)"
      >
        <template v-if="!isClick">
          {{ $t('カートに入れる') }}
        </template>
        <template v-else>
          <nuxt-link
            :to="{ name: 'name-cart', params: { name: item.user.name } }"
          >
            {{ $t('レジに進む') }}
          </nuxt-link>
        </template>
        <!-- <template>
      {{ $t('コースを受講する') }}
    </template> -->
      </button>
    </ReButton>
    <Toast :success="success" :error="error">
      <template v-if="success">
        {{ $t('カートに追加しました') }}
      </template>
      <template v-else-if="error">
        {{ $t('カートの追加に失敗しました') }}
      </template>
    </Toast>
  </div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
  props: {
    item: {
      type: Object,
      default: () => {},
    },
  },
  data() {
    return {
      isClick: false,
      success: false,
      error: false,
    }
  },
  computed: {
    ...mapGetters({
      user: 'user/user',
    }),
  },
  methods: {
    async addCart(item) {
      // try {
      await this.$store
        .dispatch('cart/add', item)
        .then((value) => {
          this.isClick = true
          this.success = true
          setTimeout(() => (this.success = false), 3000)
        })
        .catch((error) => {
          this.error = true
          setTimeout(() => (this.error = false), 3000)
        })
    },
  },
}
</script>
<style lang="scss" scoped></style>
