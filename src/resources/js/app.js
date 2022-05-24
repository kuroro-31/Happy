import { createApp } from 'vue'
import './bootstrap'
import ArticleLike from './components/ArticleLike'
import ArticleTagsInput from './components/ArticleTagsInput'
import Login from './components/auth/Login'
import Register from './components/auth/Register'
import FollowButton from './components/FollowButton'
import HeaderNav from './components/HeaderNav'
import Modal from './components/Modal'

createApp({
    components: {
        ArticleLike,
        ArticleTagsInput,
        FollowButton,
        HeaderNav,
        Register,
        Login,
        Modal

    },
}).mount('#app')
