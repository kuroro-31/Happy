<template>
    <div @click.self="open = false">
        <svg
            @click="open = true"
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 cursor-pointer hover:text-primary"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
            />
        </svg>
        <transition name="modal" appear>
            <div v-show="open" class="overlay" @click.self="open = false">
                <div class="window">
                    <slot></slot>
                </div>
            </div>
        </transition>
    </div>
</template>
<script>
export default {
    data() {
        return {
            open: false,
            errors: {},
            success: false,
            loaded: true,
        };
    },
    props: {
        articleId: {
            type: Object,
            default: {},
        },
    },
    methods: {
        edit() {
            window.location = `/articles/${this.articleId}/edit`;
        },
        destroy() {
            if (this.loaded) {
                axios.delete(`/articles/${this.articleId}`).then(() => {
                    alert("成功！");
                });
            }
        },
    },
};
</script>
