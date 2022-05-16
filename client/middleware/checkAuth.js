export default function ({ redirect, store, route }) {
  const user = store.state.user.auth
  if (!user && route.path !== '/auth/login') {
    redirect('/auth/login')
  }
}
