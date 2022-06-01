<template>
    <div @click="clickLike" class="btn">
        <svg
            class="likeButton"
            :class="{ clicked: isLikedBy }"
            viewBox="0 0 500 500"
            width="50px"
            height="50px"
        >
            <circle class="explosion" r="150" cx="250" cy="250"></circle>
            <g class="particleLayer">
                <circle fill="#8CE8C3" cx="130" cy="126.5" r="12.5" />
                <circle fill="#8CE8C3" cx="411" cy="313.5" r="12.5" />
                <circle fill="#91D2FA" cx="279" cy="86.5" r="12.5" />
                <circle fill="#91D2FA" cx="155" cy="390.5" r="12.5" />
                <circle fill="#CC8EF5" cx="89" cy="292.5" r="10.5" />
                <circle fill="#9BDFBA" cx="414" cy="282.5" r="10.5" />
                <circle fill="#9BDFBA" cx="115" cy="149.5" r="10.5" />
                <circle fill="#9FC7FA" cx="250" cy="80.5" r="10.5" />
                <circle fill="#9FC7FA" cx="78" cy="261.5" r="10.5" />
                <circle fill="#96D8E9" cx="182" cy="402.5" r="10.5" />
                <circle fill="#CC8EF5" cx="401.5" cy="166" r="13" />
                <circle fill="#DB92D0" cx="379" cy="141.5" r="10.5" />
                <circle fill="#DB92D0" cx="327" cy="397.5" r="10.5" />
                <circle fill="#DD99B8" cx="296" cy="392.5" r="10.5" />
            </g>
            <path
                class="heart"
                d="M250,187.4c-31.8-47.8-95.5-19.8-95.5,32.2c0,35.2,31.8,60.3,55.7,79.2c24.9,19.7,31.8,23.9,39.8,31.8 c7.9-7.9,14.6-12.6,39.8-31.8c24.3-18.5,55.7-44.4,55.7-79.6C345.5,167.6,281.8,139.7,250,187.4z"
            />
        </svg>
        <count-animation
            :value="countLikes"
            :isLikedBy="isLikedBy"
        ></count-animation>
    </div>
</template>
<script>
import CountAnimation from "./CountAnimation.vue";
export default {
    components: { CountAnimation },
    props: {
        initialIsLikedBy: {
            type: Boolean,
            default: false,
        },
        initialCountLikes: {
            type: Number,
            default: 0,
        },
        authorized: {
            type: Boolean,
            default: false,
        },
        endpoint: {
            type: String,
        },
    },
    data() {
        return {
            isLikedBy: this.initialIsLikedBy,
            countLikes: this.initialCountLikes,
            gotToLike: false,
        };
    },
    methods: {
        clickLike() {
            if (!this.authorized) {
                alert("いいね機能はログイン中のみ使用できます");
                return;
            }

            this.isLikedBy ? this.unlike() : this.like();
        },
        async like() {
            const response = await axios.put(this.endpoint);

            this.isLikedBy = true;
            this.countLikes = response.data.countLikes;
            this.gotToLike = true;
        },
        async unlike() {
            const response = await axios.delete(this.endpoint);

            this.isLikedBy = false;
            this.countLikes = response.data.countLikes;
            this.gotToLike = false;
        },
    },
};
</script>
<style lang="scss" scoped>
.btn {
    @apply flex items-center;
}
// アニメーションの時間
$animateTime: 800ms;
// パーティクルの数
$particleNum: 14;

@mixin centering {
    transform-origin: 250px 250px;
}

@mixin animationFill {
    animation-fill-mode: forwards;
}

.likeButton {
    @apply cursor-pointer inline;
    .border {
        fill: rgb(255, 255, 255);
    }
    .explosion {
        transform-origin: 250px 250px;
        transform: scale(0.02);
        stroke: rgba(221, 70, 136, 1);
        fill: none;
        opacity: 0;
        stroke-width: 1;
        @include centering;
    }

    .particleLayer {
        opacity: 0;

        circle {
            opacity: 0;
            @include centering;
        }
    }

    .heart {
        fill: rgba(6, 6, 6, 0.24);
        transform: scale(0.8);
        @include centering;
    }
}
.clicked {
    .explosion {
        animation: explosionAnime $animateTime;
        @include animationFill;
    }

    .heart {
        animation: heartAnime $animateTime;
        @include animationFill;
    }

    .particleLayer {
        animation: particleLayerAnime $animateTime;
        @include animationFill;

        @for $index from 1 through $particleNum {
            circle:nth-child(#{$index}) {
                animation: particleAnimate#{$index} $animateTime;
                @include animationFill;
            }
        }
    }
}

// 爆発のアニメーション
@keyframes explosionAnime {
    0% {
        opacity: 0;
        transform: scale(0.01);
    }
    1% {
        opacity: 1;
        transform: scale(0.01);
    }

    5% {
        stroke-width: 200;
    }

    20% {
        stroke-width: 300;
    }

    50% {
        stroke: rgba(204, 142, 245, 1);
        transform: scale(1.1);
        stroke-width: 1;
    }
    50.1% {
        stroke-width: 0;
    }

    100% {
        stroke: rgba(204, 142, 245, 1);
        transform: scale(1.1);
        stroke-width: 0;
    }
}

// パーティクル全体のアニメーション
@keyframes particleLayerAnime {
    0% {
        transform: translate(0, 0);
        opacity: 0;
    }
    30% {
        opacity: 0;
    }
    31% {
        opacity: 1;
    }

    60% {
        transform: translate(0, 0);
    }

    70% {
        opacity: 1;
    }

    100% {
        opacity: 0;
        transform: translate(0, -20px);
    }
}

// パーティクルの個別アニメーション

// 各点の移動位置
// 1点目のx座標, 1点目のy座標, 2点目のx座標, 2点目のy座標,...と並んでいる
$points: -16, -59, 41, 43, 50, -48, -39, 36, -39, 32, 48, 6, -69, -36, -12, -52,
    -43, -21, -10, 47, 66, -9, 40, -45, 29, 24, -10, 50;

$pointer: 1;

@for $index from 1 through $particleNum {
    @keyframes particleAnimate#{$index} {
        0% {
            transform: translate(0, 0);
        }
        30% {
            opacity: 1;
            transform: translate(0, 0);
        }
        80% {
            transform: translate(
                #{nth($points, $pointer)}px,
                #{nth($points, $pointer + 1)}px
            );
        }
        90% {
            transform: translate(
                #{nth($points, $pointer)}px,
                #{nth($points, $pointer + 1)}px
            );
        }
        100% {
            opacity: 1;
            transform: translate(
                #{nth($points, $pointer)}px,
                #{nth($points, $pointer + 1)}px
            );
        }
    }
    $pointer: $pointer + 2;
}

// ハートのアニメーション
@keyframes heartAnime {
    0% {
        transform: scale(0);
        fill: #e2264d;
    }
    39% {
        transform: scale(0);
    }
    60% {
        transform: scale(1.2, 1.2);
    }
    70% {
        transform: scale(1, 1) translate(0%, -10%);
    }
    75% {
        transform: scale(1.1, 0.9) translate(0%, 5%);
    }
    80% {
        transform: scale(0.95, 1.05) translate(0%, -3%);
    }
    100% {
        transform: scale(1, 1) translate(0%, 0%);
        fill: #e2264d;
    }
}
</style>
