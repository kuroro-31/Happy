<template>
    <div class="relative flex flex-col">
        <div id="screen" class="screen scroll-none">
            <div v-for="i in setImages" :key="i" class="images">
                <img class="image image-right" :src="i[0]" alt="image" />
                <img class="image image-left" :src="i[1]" alt="image" />
            </div>
        </div>
        <button
            class="btn-prev"
            @click="scroll_prev"
            v-on:keydown="scroll_prev"
        >
            <svg
                width="40"
                height="40"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002"
                    stroke="#eee"
                    stroke-width="1.5"
                    stroke-miterlimit="10"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        </button>
        <button
            class="btn-next"
            @click="scroll_next"
            v-on:keydown="scroll_next"
        >
            <svg
                width="40"
                height="40"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M8.91003 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.91003 4.08002"
                    stroke="#eee"
                    stroke-width="1.5"
                    stroke-miterlimit="10"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        </button>
    </div>
</template>
<script>
export default {
    data() {
        return {
            images: [
                "https://i.gyazo.com/8f09d3a49ac2859925f2e3cc508bddf9.jpg",
                "https://i.gyazo.com/8be5e2098af7f554c905003c669ff617.png",
                "https://i.gyazo.com/545296f7a88023de63abb4332e7e5567.png",
                "https://i.gyazo.com/394b2dbecef90d3ed892027c1a9df2e3.png",
                "https://i.gyazo.com/b705669423a7e5e25c2863c3faac91b9.png",
                "https://i.gyazo.com/6d00f984bfc1eac46703025e9326a87d.png",
                "https://i.gyazo.com/f92517979cc882f378b8cf0401227376.png",
                "https://i.gyazo.com/dbb827098b5674d00c391abb52a53625.png",
                "https://i.gyazo.com/f5e93a58dff702d86e4870daabeb0da6.png",
                "https://i.gyazo.com/a9a6209ffbe12907eebb4475ee739fae.png",
                "https://i.gyazo.com/d9d95c3998c3203a32c51e1f2239d83a.png",
                "https://i.gyazo.com/441e33b93602b12d2d5408c7e7dae36d.png",
                "https://i.gyazo.com/407daa9b6f6ad104279e082f7dd73c23.png",
                "https://i.gyazo.com/1e03ad7f6934a35224f5ad78f9bf0f45.png",
            ],
            setImages: [],
        };
    },
    methods: {
        scroll_prev() {
            let window_width = window.innerWidth;
            let content = document.querySelector(".screen");
            content.scrollLeft -= window_width;
        },
        scroll_next() {
            let window_width = window.innerWidth;
            let content = document.querySelector(".screen");
            content.scrollLeft += window_width;
        },
    },
    mounted() {
        let all = this.images;
        let window_width = window.innerWidth;
        let content = document.querySelector(".screen");

        // 2枚ずつに分け、スライド用の配列を作成
        const sliceByNumber = (all, number) => {
            const length = Math.ceil(all.length / number);
            return new Array(length)
                .fill()
                .map((_, i) => all.slice(i * number, (i + 1) * number));
        };
        this.setImages = sliceByNumber(all, 2);

        // キーボードキーでスライド移動
        document.onkeydown = function (e) {
            var keyCode = false;
            if (e) event = e;
            if (event) {
                if (event.keyCode == 37) {
                    content.scrollLeft -= window_width;
                }
                if (event.keyCode == 39) {
                    content.scrollLeft += window_width;
                }
            }
        };
    },
};
</script>
<style lang="scss" scoped>
.screen {
    @apply max-h-[100vh] flex flex-row-reverse overflow-hidden duration-300;
    -webkit-overflow-scrolling: touch !important;
}
.images {
    @apply bg-dark-1 min-w-[100vw] max-w-[100vw] h-full flex justify-center flex-row-reverse duration-300;
}
.image {
    @apply max-w-[50vw] max-h-[100vh] object-contain duration-300;
}
.btn-prev {
    @apply absolute left-0 top-0 bottom-0 h-full flex items-center pl-12 pr-48 duration-300;
}
.btn-next {
    @apply absolute right-0 top-0 bottom-0 h-full flex items-center pr-12 pl-48 duration-300;
}
</style>
