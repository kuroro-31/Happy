<template>
    <form id="submit-form" @submit.prevent="addChapter">
        <button id="submit-btn" type="submit" class="inline-block btn">
            エピソードを追加する
        </button>
    </form>
</template>
<script>
export default {
    data() {
        return {
            form: {
                book_id: this.book.id,
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
