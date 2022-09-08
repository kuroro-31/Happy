<template>
    <div>
        <transition name="modal" appear>
            <div v-show="open" class="overlay" @click.self="close">
                <div class="window p-6">
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
            open: true,
        };
    },
    props: {
        userName: {
            type: String,
        },
    },
    methods: {
        close() {
            this.open = false;
            window.history.back();
        },
    },
};
</script>
