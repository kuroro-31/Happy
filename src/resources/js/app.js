import { createApp } from 'vue'
import './bootstrap'
import ArticleLike from './components/ArticleLike'
import ArticleTagsInput from './components/ArticleTagsInput'
import FollowButton from './components/FollowButton'

createApp({
    components: {
        'example-component': ExampleComponent,
        'ArticleLike': ArticleLike,
        'ArticleTagsInput': ArticleTagsInput,
        'FollowButton': FollowButton,
    },
}).mount('#app')
