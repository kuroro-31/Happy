<template>
    <div>
        <!-- <div class="border-b-8 border-gray-800 p-4 w-full">
      <app-tweet-compose />
    </div> -->

        <!-- <app-tweet
      v-for="tweet in tweets"
      :key="tweet.id"
      :tweet="tweet"
    />

    <div
      v-if="tweets.length"
      v-observe-visibility="{
        callback: handleScrolledToBottomOfTimeline
      }"
    > -->
        {{ posts }}
        {{ rankingPosts }}
    </div>
</template>

<script>
// import { mapGetters, mapActions, mapMutations } from 'vuex'
import axios from "axios";

export default {
    // async asyncData() {
    //     const { data } = await axios.get(`/api/posts`);
    //     return { posts: data };
    // },
    data() {
        return {
            // page: 1,
            // lastPage: 1
            posts: [],
            rankingPosts: [],
        };
    },

    computed: {
        // ...mapGetters({
        //   tweets: 'timeline/tweets'
        // }),
        // urlWithPage () {
        //   return `/api/timeline?page=${this.page}`
        // }
    },

    methods: {
        async getPosts() {
            let response = await axios.get("api/posts");
            this.posts = response.data.articles;
            this.rankingPosts = response.data.likeRankings;
        },
        // ...mapActions({
        //   getTweets: 'timeline/getTweets'
        // }),
        // ...mapMutations({
        //   PUSH_TWEETS: 'timeline/PUSH_TWEETS'
        // }),
        // loadTweets () {
        //   this.getTweets(this.urlWithPage).then((response) => {
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
