<template>
    <form id="submit-form" @submit.prevent="addEpisode">
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
        async addEpisode() {
            await axios
                .post(`/api/books/${this.book.code}/episode`, this.form)
                .then(({ data }) => {
                    window.location = `/books/${this.book.code}/${data.episode_code}/edit`;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
