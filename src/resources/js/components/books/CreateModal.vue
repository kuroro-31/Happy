<template>
    <div @click.self="open = false" class="list-item">
        <div @click="open = true" class="flex flex-col cursor-pointer">
            <svg
                width="200"
                height="200"
                viewBox="0 0 200 200"
                fill="none"
                class="list-item-img rounded-sm border-2 border-eee hover:border-ddd"
            >
                <rect width="200" height="200" fill="white" />
                <rect x="95" y="70" width="10" height="60" fill="#DDDDDD" />
                <rect
                    x="70"
                    y="105"
                    width="10"
                    height="60"
                    transform="rotate(-90 70 105)"
                    fill="#D9D9D9"
                />
            </svg>
            <span class="mt-2">新しく作品を追加する</span>
        </div>
        <transition name="modal" appear>
            <div v-show="open" class="overlay" @click.self="open = false">
                <div class="window">
                    <div class="header">
                        <button class="close" @click="open = false">
                            <svg
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="#333"
                            >
                                <path
                                    d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"
                                ></path>
                            </svg>
                        </button>
                        <div class="title"><slot name="header"></slot></div>
                    </div>
                    <div class="p-6 max-h-[60vh] overflow-y-scroll scroll-none">
                        <slot></slot>
                    </div>
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
};
</script>
<style lang="scss" scoped>
.header {
    @apply relative min-h-[30px] bg-[#F2F2F2] dark:bg-dark text-left rounded-t text-lg font-semibold py-3 pl-3 pr-8;
}
.title {
    @apply text-[#5A5777];
    animation: slide-in 0.3s;
}
@keyframes bounce-in {
    // 0% {
    //   transform: scale(0);
    // }
    // 50% {
    //   transform: scale(1.1);
    // }
    // 100% {
    //   transform: scale(1);
    // }
    0% {
        transform: translateY(30px);
        opacity: 0;
    }
    100% {
        transform: translateY(0px);
        opacity: 1;
    }
}
@keyframes slide-in {
    0% {
        transform: translateX(-30px);
        opacity: 0;
    }
    100% {
        transform: translateX(0px);
        opacity: 1;
    }
}
</style>
