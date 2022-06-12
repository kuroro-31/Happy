import axios from 'axios'

export default {
  async getPosts ({ commit }) {
    let response = await axios.get("api/posts")

    if (response.data.articles){
      commit('PUSH_POSTS', response.data.articles)
    } else {
      commit('PUSH_POSTS', response.data.likeRankings)
    }

    // commit('likes/PUSH_LIKES', response.data.meta.likes, { root: true })
    // commit('retweets/PUSH_RETWEETS', response.data.meta.retweets, { root: true })

    return response
  },

  // async quoteTweet (_, { tweet, data }) {
  //   await axios.post(`/api/tweets/${tweet.id}/quotes`, data)
  // },

  // async replyToTweet (_, { tweet, data }) {
  //   await axios.post(`/api/tweets/${tweet.id}/replies`, data)
  // }
}