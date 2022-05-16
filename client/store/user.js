export const state = () => ({
  auth: false,
  user: null,
  currentUser: null,
})

export const getters = {
  auth(state) {
    return state.auth
  },
  user(state) {
    return state.user
  },
  currentUser(state) {
    return state.currentUser
  },
}

export const mutations = {
  setAuthed(state, value) {
    state.auth = value
  },
  setUser(state, value) {
    state.user = value
  },
  setCurrentUser(state, value) {
    state.currentUser = value
  },
}

export const actions = {
  async register({ commit }, data) {
    await this.$axios
      .$post('/api/auth/register', data)
      .then((response) => {
        commit('setUser', response)
      })
      .catch((error) => {
        alert(error)
      })
  },
  async login({ commit }, data) {
    await this.$axios
      .$post('/api/auth/login', data)
      .then(() => {
        this.$axios.$get('/api/user').then(({ data }) => {
          commit('setUser', data)
          commit('setAuthed', true)
          // this.$router.back()
          this.$router.push({ path: '/' })
        })
      })
      .catch((error) => {
        commit('setUser', {})
        commit('setAuthed', false)
        console.log(error)

        if (error.response.status == '401') {
          this.logout()
          this.$router.push('/auth/login')
        } else if (error.response.status == '404') {
          this.$router.push('/error/404')
        } else if (error.response.status == '500') {
          this.$router.push('/error/500')
        }
      })
  },
  async logout({ commit }) {
    // await this.$axios.$post('/api/logout')
    commit('setUser', null)
    commit('setAuthed', false)
    this.$router.push({ path: '/' })
  },
  async update({ commit }, data) {
    try {
      commit('setUser', data)
    } catch (error) {
      alert(error)
      console.log(error)
    }
  },
  async getCurrentUser({ commit }, name) {
    await this.$axios
      .$get(`/api/users/${name}`)
      .then((response) => {
        commit('setCurrentUser', response.data)
      })
      .catch((error) => {
        alert(error)
        console.log(error)
      })
  },
  nuxtServerInit({ commit }) {
    commit('setAuthed')
    commit('setUser')
    commit('setCurrentUser')
  },
}
