import Vue from 'vue'
import './bootstrap'
import ArticleLike from './components/ArticleLike'
import ArticleTagsInput from './components/ArticleTagsInput'
import FollowButton from './components/FollowButton'

const app = new Vue({
  el: '#app',
  components: {
    ArticleLike,
    ArticleTagsInput,
    FollowButton,
  }
})
