<template>
    <div class="relative" @mouseleave="open = false">
        <button
            @mouseover="open = true"
            class="flex items-center justify-between w-full pl-3 pr-4 font-medium md:p-0 md:w-auto"
        >
            <img
                class="w-10 h-10 shadow rounded-full"
                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                alt="Bordered avatar"
            />
        </button>
        <transition>
            <div
                v-show="open"
                class="absolute right-0 top-10 w-48 z-50 rounded-lg shadow p-2 bg-white dark:bg-dark"
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
