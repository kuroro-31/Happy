<template>
    <div>
        <button
            class="text-sm shadow-none border border-primary rounded-xl py-2 px-6"
            :class="buttonColor"
            @click="clickFollow"
        >
            {{ buttonText }}
        </button>
    </div>
</template>
<script>
export default {
    props: {
        initialIsFollowedBy: {
            type: Boolean,
            default: false,
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
            isFollowedBy: this.initialIsFollowedBy,
        };
    },
    computed: {
        buttonColor() {
            return this.isFollowedBy ? "bg-primary text-white shadow shadow-primary" : "bg-white text-primary";
        },
        buttonText() {
            return this.isFollowedBy ? "フォロー中" : "フォロー";
        },
    },
    methods: {
        clickFollow() {
            if (!this.authorized) {
                alert("フォロー機能はログイン中のみ使用できます");
                return;
            }

            this.isFollowedBy ? this.unfollow() : this.follow();
        },
        async follow() {
            const response = await axios.put(this.endpoint);

            this.isFollowedBy = true;
        },
        async unfollow() {
            const response = await axios.delete(this.endpoint);

            this.isFollowedBy = false;
        },
    },
};
</script>
