import { createApp } from 'vue'
import './bootstrap'
import ArticleLike from './components/ArticleLike'
import FollowButton from './components/FollowButton'
import HeaderNav from './components/HeaderNav'
import Modal from './components/Modal'
// articles
import EditModal from './components/articles/EditModal'
import ArticleTagsInput from './components/ArticleTagsInput'
// auth
import Login from './components/auth/Login'
import Register from './components/auth/Register'




createApp({
    components: {
        EditModal,
        ArticleLike,
        ArticleTagsInput,
        FollowButton,
        HeaderNav,
        Register,
        Login,
        Modal
    },
}).mount('#app')
