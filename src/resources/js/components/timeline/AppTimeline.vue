<template>
    <div>
        <!-- <div class="border-b-8 border-gray-800 p-4 w-full">
            <app-tweet-compose />
        </div> -->

        <app-tweet v-for="post in posts" :key="post.id" :post="post" />

        <div
            v-if="posts.length"
            v-observe-visibility="{
                callback: handleScrolledToBottomOfTimeline,
            }"
        ></div>
    </div>
</template>

<script>
import { mapActions, mapGetters, mapMutations } from "vuex";
import AppTweet from "../tweets/AppTweet.vue";

export default {
    components: {
        AppTweet,
    },
    data() {
        return {
            page: 1,
            lastPage: 1,
        };
    },

    computed: {
        ...mapGetters({
            posts: "posts/posts",
        }),
        urlWithPage() {
            return `/api/posts?page=${this.page}`;
        },
    },

    methods: {
        ...mapActions({
            getPosts: "posts/getPosts",
        }),
        ...mapMutations({
            PUSH_TWEETS: "posts/PUSH_TWEETS",
        }),
        loadPosts() {
            this.getPosts(this.urlWithPage).then((response) => {
                let posts = [];
                if (response.data.articles) posts = response.data.articles;
                if (response.data.likeRankings)
                    posts = response.data.likeRankings;
                this.lastPage = posts.last_page;
            });
        },
        handleScrolledToBottomOfTimeline(isVisible) {
            if (!isVisible) {
                return;
            }

            // 最後のページになったらロードを止める
            if (this.lastPage === this.page) {
                return;
            }
            this.page++;
            this.loadPosts();
        },
    },

    mounted() {
        this.loadPosts();

        // Echo.private(`timeline.${this.$user.id}`)
        //   .listen('.TweetWasCreated', (e) => {
        //     this.PUSH_TWEETS([e])
        //   })
    },
};
</script>
