<template>
    <div @click.self="open = false">
        <span @click="open = true" class="btn-border">ログイン</span>
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
