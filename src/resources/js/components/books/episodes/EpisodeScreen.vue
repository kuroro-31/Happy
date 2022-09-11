<template>
    <div class="w-screen h-screen bg-dark">
        <div
            class="w-screen overflow-x-auto h-[800px] bg-dark-2 flex flex-row-reverse justify-start"
        >
            <img
                v-for="img in images"
                :key="img"
                class="episode-img"
                :src="img"
                alt="1"
            />
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
        };
    },
};
</script>
<style lang="scss" scoped>
.episode-img {
    @apply w-full h-full object-contain;
}
.episode-img:nth-child(odd) {
    @apply mr-auto;
}
.episode-img:nth-child(even) {
    @apply ml-auto;
}
</style>
