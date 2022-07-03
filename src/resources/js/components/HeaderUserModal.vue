<template>
    <div class="relative" @mouseleave="open = false">
        <button
            @mouseover="open = true"
            class="flex items-center justify-between w-full pl-3 pr-4 font-medium md:p-0 md:w-auto"
        >
            <slot name="avatar"></slot>
        </button>
        <transition>
            <div
                v-show="open"
                class="absolute right-0 top-10 w-48 z-50 rounded-lg p-2 bg-white dark:bg-dark"
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
