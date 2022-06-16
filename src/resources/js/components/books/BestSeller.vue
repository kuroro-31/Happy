<!-- https://ismail9k.github.io/vue3-carousel/examples.html#basic-example -->
<template>
    <Carousel
        :settings="settings"
        :breakpoints="breakpoints"
        :wrap-around="true"
    >
        <Slide v-for="slide in slides" :key="slide">
            <div class="carousel__item">
                <img :src="slide" alt="" class="thumbnail" />
                <a href="/" class="title"
                    >キングダムキングダムキングダムキングダム</a
                >
            </div>
        </Slide>

        <template #addons>
            <Navigation />
        </template>
    </Carousel>
</template>

<script>
import { defineComponent } from "vue";
import { Carousel, Navigation, Slide } from "vue3-carousel";
import "vue3-carousel/dist/carousel.css";

export default defineComponent({
    name: "WrapAround",
    components: {
        Carousel,
        Slide,
        Navigation,
    },
    data() {
        return {
            settings: {
                snapAlign: "center",
            },
            breakpoints: {
                // 700px and up
                700: {
                    itemsToShow: 3,
                },
                // 1024 and up
                1024: {
                    itemsToShow: 5,
                    snapAlign: "start",
                },
            },
            slides: [
                "https://i.gyazo.com/2937170ce6807fe65d5f035f76023ad6.jpg",
                "https://i.gyazo.com/2937170ce6807fe65d5f035f76023ad6.jpg",
                "https://i.gyazo.com/2937170ce6807fe65d5f035f76023ad6.jpg",
                "https://i.gyazo.com/2937170ce6807fe65d5f035f76023ad6.jpg",
                "https://i.gyazo.com/2937170ce6807fe65d5f035f76023ad6.jpg",
                "https://i.gyazo.com/2937170ce6807fe65d5f035f76023ad6.jpg",
                "https://i.gyazo.com/2937170ce6807fe65d5f035f76023ad6.jpg",
                "https://i.gyazo.com/2937170ce6807fe65d5f035f76023ad6.jpg",
                "https://i.gyazo.com/2937170ce6807fe65d5f035f76023ad6.jpg",
                "https://i.gyazo.com/2937170ce6807fe65d5f035f76023ad6.jpg",
                "https://i.gyazo.com/2937170ce6807fe65d5f035f76023ad6.jpg",
                "https://i.gyazo.com/2937170ce6807fe65d5f035f76023ad6.jpg",
            ],
        };
    },
});
</script>
<style lang="scss" scoped>
$img-h: 250px;
$img-w: calc($img-h * 0.7);

.title {
    @apply block mt-2 text-left text-base cursor-pointer hover:text-primary;
    width: $img-w;
}
</style>
