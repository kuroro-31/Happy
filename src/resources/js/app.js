import { createApp } from 'vue'
import './bootstrap'
import ArticleLike from './components/ArticleLike'
import CreateModal from './components/articles/CreateModal'
import DeleteModal from './components/articles/DeleteModal'
import EditModal from './components/articles/EditModal'
import ArticleTagsInput from './components/ArticleTagsInput'
import AuthModal from './components/auth/AuthModal'
import CountAnimation from './components/CountAnimation'
import FollowButton from './components/FollowButton'
import HeaderNav from './components/HeaderNav'
import HeaderUserModal from './components/HeaderUserModal'
import Modal from './components/Modal'
import ThemeToggle from './components/ThemeToggle'

createApp({
    components: {
        AuthModal,
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
        Modal
    },
}).mount('#app')
