export const state = () => ({
  allProduct: null,
})

export const getters = {
  allProduct(state) {
    return state.allProduct
  },
}

export const mutations = {
  setAllProduct(state, value) {
    state.allProduct = value
  },
}

export const actions = {
  async getAllProduct({ commit }) {
    await this.$axios
      .$get(`/api/posts`)
      .then(({ data }) => {
        commit('setAllProduct', data)
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
  async create({ commit }, user) {
    await this.$axios
      .$post('/api/posts')
      .then(({ data }) => {
        this.$router.push(`/${user.name}/${data.id}/edit`)
        commit('setAllProduct', data)
      })
      .catch((error) => {
        if (error.response.status == '401') {
          this.stateLogout()
          this.$router.push('/auth/login')
        } else if (error.response.status == '404') {
          this.$router.push('/error/404')
        } else if (error.response.status == '500') {
          this.$router.push('/error/500')
        }
      })
  },
  async delete({ commit }, id) {
    await this.$axios.$delete(`/api/posts/${id}`).then(() => {
      commit('setAllProduct', null)
    })
  },
  nuxtServerInit({ commit }) {
    commit('setAllProduct')
  },
}
