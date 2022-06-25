<template>
    <div>
        <div class="my-8 text-3xl">
            <input type="text" :value="chapterName" />
        </div>
        <div class="p-8 bg-white rounded shadow whitespace-pre-line">
            <textarea
                name=""
                id=""
                cols="30"
                rows="10"
                :value="chapterBody"
            ></textarea>
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
        chapterName: {
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
<style lang="scss" scoped></style>
