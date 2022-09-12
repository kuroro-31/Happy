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

        class Carousel {
            // 初期化
            constructor(query) {
                this.$elm = document.querySelector(query);

                this.maxIndex = Math.round(
                    this.$elm.scrollHeight / this.$elm.clientHeight
                );
            }

            // 今の index を取得
            get index() {
                var index = Math.round(
                    this.$elm.scrollHeight / this.$elm.clientHeight
                );
                return index;
            }

            // 指定した場所に移動
            goto(index) {
                var i = (index + this.maxIndex) % this.maxIndex;
                this.$elm.children[i].scrollIntoView();
            }

            // 次へ
            next() {
                this.goto(this.index + 1);
            }

            // 前へ
            prev() {
                this.goto(this.index - 1);
            }
        }

        window.onload = function () {
            // カルーセルを生成
            var carousel = new Carousel(".screen");

            // ボタンのセットアップ
            var $btnPrev = document.querySelector(".btn-prev");
            var $btnNext = document.querySelector(".btn-next");

            $btnPrev.onclick = () => {
                carousel.prev();
            };
            $btnNext.onclick = () => {
                carousel.next();
            };
        };
    },
};
</script>
<style lang="scss" scoped>
.screen {
    @apply bg-pink snap-y snap-mandatory max-h-[80vh] flex flex-col scroll-auto overflow-scroll;
    -webkit-overflow-scrolling: touch !important;
}
.images {
    @apply bg-dark-1 snap-always snap-start h-full flex flex-row-reverse w-full justify-center;
}
.image {
    @apply h-[80vh] object-contain;
    // &-right {
    //     @apply mr-auto;
    // }
    // &-left {
    //     @apply ml-auto;
    // }
}
</style>
