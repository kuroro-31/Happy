<template>
    <div class="toast-wrapper">
        <transition name="toast">
            <div
                :class="[
                    success || error
                        ? 'block toast-enter-active'
                        : 'toast-leave-to toast-leave-active',
                ]"
            >
                <div class="toast">
                    <div
                        class="check"
                        :class="{
                            'check-success': success,
                            'check-danger': error,
                        }"
                    >
                        <template v-if="success">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                />
                            </svg>
                        </template>
                        <template v-else>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </template>
                    </div>
                    <div class="mr-4 font-bold text-sm">
                        <template v-if="success">保存しました</template>
                        <template v-else-if="error">失敗しました</template>
                    </div>
                    <div class="cursor-pointer" @click="show = !show">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
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
            show: false,
        };
    },
    props: {
        error: {
            type: Boolean,
        },
        success: {
            type: Boolean,
        },
    },
    // watch: {
    //     idSaved: {
    //         handler: _.debounce(function () {
    //             this.show = this.idSaved;
    //         }, 0),
    //         deep: true,
    //     },
    // },
};
</script>
<style lang="scss" scoped>
.toast {
    @apply rounded ml-auto shadow flex items-center w-full justify-between p-4;
    max-width: 300px;
    background: #fff;
    &-wrapper {
        @apply fixed w-full;
        bottom: 20px;
        right: 20px;
    }
    &-idSaved {
        color: white;
        background: #01bfa5;
    }
    &-danger {
        color: white;
        background: #ff0062;
    }
}

/* enter transitions */
.toast-enter-active {
    animation: wobble 0.2s ease;
}
/* leave transitions */
.toast-leave-to {
    opacity: 0;
    transform: translateY(60px) !important;
}
.toast-leave-active {
    transition: all 0.1s ease !important;
}

@keyframes wobble {
    0% {
        transform: translateY(50px);
        opacity: 0;
    }
    50% {
        transform: translateY(0px);
        opacity: 1;
    }
    60% {
        transform: translateY(8px);
        opacity: 1;
    }
    70% {
        transform: translateY(-8px);
        opacity: 1;
    }
    80% {
        transform: translateY(4px);
        opacity: 1;
    }
    90% {
        transform: translateY(-4px);
        opacity: 1;
    }
    100% {
        transform: translateY(0px);
        opacity: 1;
    }
}

.check {
    @apply rounded-full flex items-center justify-center;
    width: 20px;
    height: 20px;
    &-success {
        background: #02875a;
    }
    &-danger {
        background: #de290e;
    }
    svg {
        color: #fff;
    }
}
</style>
