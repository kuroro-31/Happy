<template>
    <div
        class="w-full inline-block p-4 border-b border-gray-800 hover:bg-gray-800"
    >
        <!-- <component :is="`app-tweet-variant-${tweet.type}`" :tweet="tweet" /> -->
        <div class="flex w-full">
            <a :href="`/users/${post.user.username}`" class="inline-block mr-3">
                <img
                    :src="avatar"
                    alt="user avatar"
                    class="w-12 rounded-full"
                />
            </a>
            <div>
                <app-tweet-username :user="post.user" />
                <p class="text-gray-300 whitespace-pre-wrap">
                    {{ post.body }}
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
        post: {
            required: true,
            type: Object,
        },
    },
    computed: {
        avatar() {
            if (this.post.user.avatar) {
                return this.post.user.avatar;
            } else {
                return "./img/avatar.jpeg";
            }
        },
    },
};
</script>
