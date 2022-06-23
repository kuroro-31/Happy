<template>
    <div class="mx-auto max-w-md">
        <div class="">Chapter</div>
        <form id="submit-form" @submit.prevent="addChapter">
            <input type="text" placeholder="チャプター名" v-model="form.name" />
            <button
                id="submit-btn"
                type="submit"
                class="inline-block btn-primary"
            >
                追加する
            </button>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            form: {
                book_id: this.book.id,
                name: "",
            },
        };
    },
    props: {
        book: {
            type: Object,
            defalut: {},
        },
        chapters: {
            type: Object,
            defalut: {},
        },
    },
    methods: {
        async addChapter() {
            await axios
                .post(`/api/books/${this.book.id}/chapter`, this.form)
                .then((response) => {
                    window.location = `/books/${this.book.id}`;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
<style lang="scss" scoped></style>
