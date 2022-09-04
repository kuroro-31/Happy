<template>
    <div @click.self="open = false">
        <div @click="open = true" class="flex flex-col cursor-pointer">
            <svg
                width="200"
                height="200"
                viewBox="0 0 200 200"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="rounded-sm border-2 border-eee hover:border-ddd"
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
        };
    },
};
</script>
