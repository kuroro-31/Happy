<!-- https://ismail9k.github.io/vue3-carousel/getting-started.html -->
<template>
    <Carousel
        :settings="settings"
        :autoplay="10000"
        :wrap-around="true"
        :breakpoints="breakpoints"
    >
        <Slide v-for="slide in slides" :key="slide">
            <div class="carousel__item">
                <img :src="slide" alt="" />
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
                itemsToShow: 1,
                snapAlign: "center",
            },
            breakpoints: {
                // 700px and up
                700: {
                    itemsToShow: 3.5,
                    snapAlign: "center",
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
$img-w: 266px;
$img-h: calc($img-w * 0.7);

img {
    height: $img-w;
    width: $img-h;
}
</style>
