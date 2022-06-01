<template>
    <div>
        <button :class="buttonColor" @click="clickFollow">
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
            return this.isFollowedBy ? "btn-primary" : "btn-border";
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
