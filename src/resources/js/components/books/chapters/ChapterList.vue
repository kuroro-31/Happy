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
            class="w-full p-2 mr-4 rounded-[3px] border border-ccc"
        />
        <button id="submit-btn" type="submit" class="inline-block btn">
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
    },
    methods: {
        async addChapter() {
            await axios
                .post(`/api/books/${this.book.code}/chapter`, this.form)
                .then(({ data }) => {
                    window.location = `/books/${this.book.code}/${data.chapter_code}/edit`;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
