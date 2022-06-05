import { createApp } from 'vue'
import './bootstrap'
import ArticleLike from './components/ArticleLike'
import CreateModal from './components/articles/CreateModal'
import DeleteModal from './components/articles/DeleteModal'
import EditModal from './components/articles/EditModal'
import ArticleTagsInput from './components/ArticleTagsInput'
import Login from './components/auth/Login'
import Register from './components/auth/Register'
import CountAnimation from './components/CountAnimation'
import FollowButton from './components/FollowButton'
import HeaderNav from './components/HeaderNav'
import HeaderUserModal from './components/HeaderUserModal'
import Modal from './components/Modal'
import ThemeToggle from './components/ThemeToggle'

createApp({
    components: {
        DeleteModal,
        CreateModal,
        CountAnimation,
        HeaderUserModal,
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
