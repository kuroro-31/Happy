<template>
    <form
        id="submit-form"
        @submit.prevent="addChapter"
        class="w-full flex mb-4"
    >
        <input
            type="text"
            placeholder="タイトル"
            v-model="form.name"
            class="w-full p-2 mr-4 rounded"
        />
        <button id="submit-btn" type="submit" class="inline-block btn-primary">
            追加する
        </button>
    </form>
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
                .then(({ data }) => {
                    window.location = `/books/${this.book.id}/chapters/${data.id}`;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
<style lang="scss" scoped>
input {
    border: 1px solid #eee;
}
</style>
