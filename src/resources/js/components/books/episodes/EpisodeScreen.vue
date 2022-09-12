<template>
    <div class="flex flex-col">
        <div class="screen scroll-none">
            <div v-for="i in setImages" :key="i" class="images">
                <img class="image image-right" :src="i[0]" alt="image" />
                <img class="image image-left" :src="i[1]" alt="image" />
            </div>
        </div>
        <div class="btns">
            <button class="btn-prev">戻る</button>
            <button class="btn-next">次へ</button>
        </div>
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
    mounted() {
        let all = this.images;

        // 2枚ずつに分け、スライド用の配列を作成
        const sliceByNumber = (all, number) => {
            const length = Math.ceil(all.length / number);
            return new Array(length)
                .fill()
                .map((_, i) => all.slice(i * number, (i + 1) * number));
        };
        this.setImages = sliceByNumber(all, 2);

        window.onload = function () {
            let window_width = window.innerWidth;
            let page_half_width = window_width / 2;

            let margin = page_half_width / 10;
            let page_width = page_half_width / 9;

            let right_img = document.querySelector(".image-right");
            let left_img = document.querySelector(".image-left");

            right_img.style.marginRight = margin;
            right_img.style.width = page_width;
            left_img.style.marginLeft = margin;
            left_img.style.width = page_width;
        };
    },
};
</script>
<style lang="scss" scoped>
.screen {
    @apply snap-x snap-mandatory max-h-[80vh] flex flex-row-reverse scroll-auto overflow-scroll;
    -webkit-overflow-scrolling: touch !important;
}
.images {
    @apply snap-always snap-start bg-dark-1 min-w-[100vw] max-w-[100vw] h-full flex justify-center flex-row-reverse;
}
.image {
    @apply max-w-[50vw] max-h-[80vh] object-contain;
}
</style>
