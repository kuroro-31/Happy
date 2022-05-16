import { mapActions } from 'vuex'

export const create = {
  data() {
    return {
      success: false,
      // create_error: false,
      error: '',
    }
  },
  methods: {
    ...mapActions({
      stateLogout: 'user/logout',
    }),
    async create() {
      try {
        await this.$axios.$post('/api/posts').then(({ data }) => {
          this.$router.push({
            path: `/item/edit/${data.id}`,
            params: { success: true },
          })
        })
      } catch (error) {
        if (error.response.status == '401') {
          this.stateLogout()
          this.$router.push('/auth/login')
        } else if (error.response.status == '404') {
          this.$router.push('/error/404')
        } else if (error.response.status == '500') {
          this.$router.push('/error/500')
        }
      }
    },
  },
}
