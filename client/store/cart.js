export const state = () => ({
  carts: [],
  isCart: false,
})

export const getters = {
  carts(state) {
    return state.carts
  },
  isCart(state) {
    return state.isCart
  },
}

export const mutations = {
  setCart(state, value) {
    state.carts = value
  },
  setIsCart(state, value) {
    state.isCart = value
  },
  deleteCart(state, id) {
    // Create a new array other than to be deleted
    const afterCart = state.carts.filter((cart) => cart.id !== id)
    state.carts = afterCart
  },
}

export const actions = {
  async reset({ commit }) {
    await commit('setCart', null)
    await commit('setIsCart', null)
  },
  async add({ rootState, commit }, data) {
    await this.$axios
      .$post('/api/cart/add', {
        post_id: data.id,
      })
      .then((data) => {
        commit('setCart', data)
      })
      .catch((error) => {
        // alert(error)
        // console.log(error)
        this.$router.push('/auth/login')
      })

    // user情報をもってくる
    // let userState = {
    //   user: rootState.user.user,
    // }
    // this.$router.push({
    //   path: `/user/${userState.user.id}/cart`,
    // })
    // })
    // .catch((error) => {
    //   alert('カート追加エラー' + error)
    //   console.log(error)
    // })
  },
  async get({ commit }) {
    await this.$axios
      .$get(`/api/cart`)
      .then(({ data }) => {
        commit('setCart', data)
      })
      .catch((error) => {
        // alert('カート取得エラー' + error)
        console.log(error)
      })
  },
  async clear({ commit }, data) {
    await this.$axios
      .$post(`/api/cart/delete/${data.id}`)
      .then(() => {
        commit('deleteCart', data.id)
      })
      .catch((error) => {
        console.log(error)
      })
  },
  nuxtServerInit({ commit }) {
    commit('setCart', 'deleteCart')
  },
}
