<template>
    <div
        class="w-full inline-block p-4 border-b border-gray-800 hover:bg-gray-800"
    >
        <!-- <component :is="`app-tweet-variant-${tweet.type}`" :tweet="tweet" /> -->
        <div class="flex w-full">
            <a
                :href="`/users/${tweet.user.username}`"
                class="inline-block mr-3"
            >
                <img
                    :src="avatar"
                    alt="user avatar"
                    class="w-12 rounded-full"
                />
            </a>
            <div>
                <app-tweet-username :user="tweet.user" />
                <p class="text-gray-300 whitespace-pre-wrap">
                    {{ tweet.body }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import AppTweetUsername from "./AppTweetUsername.vue";

export default {
    components: {
        AppTweetUsername,
    },
    props: {
        tweet: {
            required: true,
            type: Object,
        },
    },
    computed: {
        avatar() {
            if (this.tweet.user.avatar) {
                return this.tweet.user.avatar;
            } else {
                return "./img/avatar.jpeg";
            }
        },
    },
};
</script>
