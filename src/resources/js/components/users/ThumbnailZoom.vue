<template>
    <div>
        <div @click="open = true" class="cursor-pointer">
            <slot name="thumbnail"></slot>
        </div>

        <transition name="modal" appear>
            <div v-show="open" class="overlay" @click.self="open = false">
                <div class="window-avatar">
                    <img
                        :src="`/img/users/thumbnail/${thumbnail}`"
                        alt="user image"
                    />
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
        };
    },
    props: {
        thumbnail: {
            type: String,
        },
    },
};
</script>
