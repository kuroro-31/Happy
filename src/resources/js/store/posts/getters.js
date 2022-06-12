export default {
  posts (state) {
    return state.posts
      .sort((a, b) => b.created_at - a.created_at)
  },

  post (state) {
    return id => state.posts.find(t => t.id === id)
  }
}
