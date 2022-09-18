<template>
    <div class="absolute right-0 top-0" @mouseleave="open = false">
        <div @mouseover="open = true" class="">
            <slot name="avatar"></slot>
        </div>
        <transition>
            <div v-show="open" class="dropdown">
                <slot></slot>
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
};
</script>
<style lang="scss" scoped>
.dropdown {
    @apply absolute p-4 shadow-lg right-0 top-0 rounded bg-white dark:bg-dark-1;
}
</style>
