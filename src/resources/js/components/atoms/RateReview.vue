<template>
    <div class="items">
        <div class="item">
            <div class="flex items-center mt-1">
                <div class="flex items-center">
                    <!-- レート画像 -->
                    <div
                        class="rate_img"
                        :class="{
                            rate_img_zero: rate >= 0.0,
                            rate_img_one: rate >= 1.0,
                            rate_img_one_five: rate >= 1.5,
                            rate_img_two: rate >= 2.0,
                            rate_img_two_five: rate >= 2.5,
                            rate_img_three: rate >= 3.0,
                            rate_img_three_five: rate >= 3.5,
                            rate_img_four: rate >= 4.0,
                            rate_img_four_five: rate >= 4.5,
                            rate_img_four_seven: rate >= 4.7,
                            rate_img_five: rate >= 5.0,
                        }"
                    ></div>
                    <!-- レート -->
                    <p
                        class="rate"
                        :class="{
                            rate_one: rate >= 0,
                            rate_two: rate >= 3.0,
                            rate_three: rate >= 4.0,
                            rate_four: rate >= 4.6,
                        }"
                    >
                        {{ rate }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            rate: 4.6,
        };
    },
};
</script>
<style lang="scss" scoped>
// 教材評価
.rate {
    @apply text-white font-semibold ml-2;
}
// 教材評価画像
.rate_img {
    @apply flex items-center;
    height: 24px;
    width: 161px;
    background-repeat: no-repeat;

    &_zero {
        background-image: url("../../../../public/img/rate/zero.svg");
    }
    &_one {
        background-image: url("../../../../public/img/rate/one.svg");
    }
    &_one_five {
        background-image: url("../../../../public/img/rate/one-five.svg");
    }
    &_two {
        background-image: url("../../../../public/img/rate/two.svg");
    }
    &_two_five {
        background-image: url("../../../../public/img/rate/two-five.svg");
    }
    &_three {
        background-image: url("../../../../public/img/rate/three.svg");
    }
    &_three_five {
        background-image: url("../../../../public/img/rate/three-five.svg");
    }
    &_four {
        background-image: url("../../../../public/img/rate/four.svg");
    }
    &_four_five {
        background-image: url("../../../../public/img/rate/four-five.svg");
    }
    &_four_seven {
        background-image: url("../../../../public/img/rate/four-seven.svg");
    }
    &_five {
        background-image: url("../../../../public/img/rate/five.svg");
    }
}
</style>
