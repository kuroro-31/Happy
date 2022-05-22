import { createApp } from 'vue'
import './bootstrap'
import ArticleLike from './components/ArticleLike'
import ArticleTagsInput from './components/ArticleTagsInput'
import FollowButton from './components/FollowButton'
import HeaderNav from './components/HeaderNav'


createApp({
    components: {
        ArticleLike,
        ArticleTagsInput,
        FollowButton,
        HeaderNav
    },
}).mount('#app')
