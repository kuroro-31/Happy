import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'

export const store = () => {
  return new Vuex.Store({
    modules: {
      user: {
        name: 'user',
        namespaced: true,
      },
      product: {
        name: 'product',
        namespaced: true,
      },
      cart: {
        name: 'cart',
        namespaced: true,
      },
    },
    plugins: [
      createPersistedState({
        key: 'reshelf-api-session',
        storage: window.sessionStorage,
      }),
    ],
  })
}
