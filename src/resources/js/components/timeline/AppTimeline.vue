<template>
    <div>
        <!-- <div class="border-b-8 border-gray-800 p-4 w-full">
            <app-tweet-compose />
        </div> -->

        <app-tweet v-for="tweet in posts" :key="tweet.id" :tweet="tweet" />

        <!-- <div
      v-if="tweets.length"
      v-observe-visibility="{
        callback: handleScrolledToBottomOfTimeline
      }"
    > -->
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
            // page: 1,
            // lastPage: 1
            // posts: [],
            // likeRankings: [],
        };
    },

    computed: {
        ...mapGetters({
            posts: "posts/posts",
            // likeRankings: "posts/likeRankings",
        }),
        // urlWithPage () {
        //   return `/api/timeline?page=${this.page}`
        // }
        // post() {
        //     if (this.posts) return this.posts;
        //     if (this.likeRankings) return this.likeRankings;
        // },
    },

    methods: {
        ...mapActions({
            getPosts: "posts/getPosts",
        }),
        ...mapMutations({
            PUSH_TWEETS: "posts/PUSH_TWEETS",
            // PUSH_RANKINGS: "posts/PUSH_RANKINGS",
        }),
        // loadTweets () {
        //   this.getPosts(this.urlWithPage).then((response) => {
        //     this.lastPage = response.data.meta.last_page
        //   })
        // },
        // handleScrolledToBottomOfTimeline (isVisible) {
        //   if (!isVisible) {
        //     return
        //   }
        //   if (this.lastPage === this.page) {
        //     return
        //   }
        //   this.page++
        //   this.loadTweets()
        // }
    },

    mounted() {
        this.getPosts();
        // this.loadTweets()
        // Echo.private(`timeline.${this.$user.id}`)
        //   .listen('.TweetWasCreated', (e) => {
        //     this.PUSH_TWEETS([e])
        //   })
    },
};
</script>
