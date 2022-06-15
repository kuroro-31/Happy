<template>
    <div @click="clickLike" class="btn">
        <svg
            :class="{ clicked: isLikedBy }"
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mr-2"
            viewBox="0 0 20 20"
            fill="currentColor"
        >
            <path
                fill-rule="evenodd"
                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                clip-rule="evenodd"
            />
        </svg>
        <count-animation
            :value="countLikes"
            :isLikedBy="isLikedBy"
        ></count-animation>
    </div>
</template>
<script>
import CountAnimation from "./CountAnimation.vue";
export default {
    components: { CountAnimation },
    props: {
        initialIsLikedBy: {
            type: Boolean,
            default: false,
        },
        initialCountLikes: {
            type: Number,
            default: 0,
        },
        authorized: {
            type: Boolean,
            default: false,
        },
        endpoint: {
            type: String,
        },
    },
    data() {
        return {
            isLikedBy: this.initialIsLikedBy,
            countLikes: this.initialCountLikes,
            gotToLike: false,
        };
    },
    methods: {
        clickLike() {
            if (!this.authorized) {
                alert("いいね機能はログイン中のみ使用できます");
                return;
            }

            this.isLikedBy ? this.unlike() : this.like();
        },
        async like() {
            const response = await axios.put(this.endpoint);

            this.isLikedBy = true;
            this.countLikes = response.data.countLikes;
            this.gotToLike = true;
        },
        async unlike() {
            const response = await axios.delete(this.endpoint);

            this.isLikedBy = false;
            this.countLikes = response.data.countLikes;
            this.gotToLike = false;
        },
    },
};
</script>
<style lang="scss" scoped>
.btn {
    @apply flex items-center cursor-pointer text-gray;
}

.clicked {
    @apply text-red;
}
</style>
