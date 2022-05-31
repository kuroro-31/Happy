import { createApp } from 'vue'
import './bootstrap'
import ArticleLike from './components/ArticleLike'
import EditModal from './components/articles/EditModal'
import ArticleTagsInput from './components/ArticleTagsInput'
import Login from './components/auth/Login'
import Register from './components/auth/Register'
import FollowButton from './components/FollowButton'
import HeaderNav from './components/HeaderNav'
import Modal from './components/Modal'
import ThemeToggle from './components/ThemeToggle'
createApp({
    components: {
        ThemeToggle,
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
