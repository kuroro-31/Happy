<template>
    <div>
        <span @click="open = true" class="cursor-pointer">
            <slot name="avatar"></slot>
        </span>

        <transition name="modal" appear>
            <div v-show="open" class="overlay" @click.self="open = false">
                <div class="window-avatar">
                    <img
                        :src="`/img/users/avatar/${avatar}`"
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
        avatar: {
            type: String,
        },
    },
};
</script>
