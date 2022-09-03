<template>
    <div class="relative" @mouseleave="open = false">
        <button
            @mouseover="open = true"
            class="flex items-center justify-between w-full pl-3 pr-4 font-medium md:p-0 md:w-auto shadow"
        >
            <slot name="avatar"></slot>
        </button>
        <transition>
            <div
                v-show="open"
                class="dropdown absolute right-0 top-10 z-50 rounded p-2 bg-white dark:bg-dark-1"
            >
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
<style lang="scss">
.dropdown {
    width: 250px;
}
</style>
