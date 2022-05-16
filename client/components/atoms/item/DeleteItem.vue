<template>
  <div>
    <span @click="delete_modal = !delete_modal">{{ $t('削除') }}</span>
    <ReModal v-if="delete_modal" @close="delete_modal = !delete_modal">
      <template slot="header">コースの削除</template>
      <div class="w-full flex flex-col justify-center">
        <div v-if="isUser" class="main-body-content py-0">
          <form @click="clear(item.id)">
            <ReButton class="re-button">
              <button type="submit" class="re-button-primary bg-danger ml-auto">
                {{ $t('削除') }}
              </button>
            </ReButton>
          </form>
        </div>
      </div>
    </ReModal>
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
      delete_modal: false,
    }
  },
  computed: {
    ...mapGetters({
      isUser: 'user/auth',
    }),
  },
  methods: {
    async clear(id) {
      await this.$store
        .dispatch('product/delete', id)
        .then(() => {
          this.delete_modal = false
        })
        .catch((error) => {
          if (error.response.status == '401') {
            this.$router.push('/auth/login')
          } else if (error.response.status == '404') {
            this.$router.push('/error/404')
          } else if (error.response.status == '500') {
            this.$router.push('/error/500')
          } else {
            alert(error)
            console.log(error)
          }
        })
    },
  },
}
</script>
