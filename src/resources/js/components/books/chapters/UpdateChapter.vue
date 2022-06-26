<template>
    <div>
        <div class="flex items-center">
            <input
                type="text"
                v-model.trim="chapterName"
                class="text-3xl my-8 bg-white p-2 rounded"
                maxlength="30"
                minlength="5"
            />
            <p v-if="chapterName" class="flex items-center">
                <svg
                    v-if="chapterName.length <= 30 && chapterName.length >= 5"
                    xmlns="http://www.w3.org/2000/svg"
                    class="slide-animation h-5 w-5 text-primary mr-1"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                    />
                </svg>
                <span>{{ chapterName.length }}/30</span>
            </p>
        </div>

        <div class="flex items-center">
            <textarea
                type="text"
                minlength="1000"
                v-model.trim="chapterBody"
                class="p-4 bg-white whitespace-pre-line rounded w-full h-full text-lg leading-9"
            ></textarea>
            <p v-if="chapterBody" class="flex items-center">
                <svg
                    v-if="chapterBody.length >= 1000"
                    xmlns="http://www.w3.org/2000/svg"
                    class="slide-animation h-5 w-5 text-primary mr-1"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                    />
                </svg>
                <span>1000/{{ chapterBody.length }}</span>
            </p>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            form: [],
        };
    },
    props: {
        chapterName: {
            type: String,
        },
        chapterBody: {
            type: Text,
        },
    },
    watch: {
        // form: {
        //     // eslint-disable-next-line
        //     handler: _.debounce(function () {
        //         this.update();
        //     }, 2000), // 更新されたら保存処理
        //     deep: true,
        // },
    },
    methods: {
        async update() {
            await axios.patch(`/api/users/${this.user.id}`, this.user);
            this.$store
                .dispatch("user/update", this.user)
                .then(() => {
                    this.success = true;
                    setTimeout(() => (this.success = false), 3000);
                })
                .catch(() => {
                    this.error = true;
                    setTimeout(() => (this.error = false), 3000);
                });
        },
    },
};
</script>
<style lang="scss" scoped>
.slide-animation {
    animation: slide 0.2s ease;
}
</style>
