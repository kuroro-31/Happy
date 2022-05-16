<template>
  <div class="items">
    <div class="item">
      <!-- パンくず -->
      <Breadcrumb :breadcrumbs="breadcrumbs" />

      <!-- タイトル -->
      <span class="title">
        {{ item.title }}
      </span>

      <!-- 説明 -->
      <div class="describe">
        <!-- {{ item.describe }} -->
      </div>

      <!-- 作者 -->
      <nuxt-link to="/user/top" class="name">
        <!-- 作成者： {{ item.name }} -->
      </nuxt-link>

      <!-- 最終更新 -->
      <p class="name text-xs text-right mt-1">最終更新：{{ updated_at }}</p>

      <!-- 評価 -->
      <div class="flex items-center mt-1">
        <div class="flex items-center">
          <!-- レート -->
          <p
            class="rate"
            :class="{
              rate_one: item.rate >= 0,
              rate_two: item.rate >= 3.0,
              rate_three: item.rate >= 4.0,
              rate_four: item.rate >= 4.6,
            }"
          >
            <!-- {{ item.rate | comma }} -->
          </p>
          <!-- レート画像 -->
          <div
            class="rate_img"
            :class="{
              rate_img_zero: item.rate >= 0.0,
              rate_img_one: item.rate >= 1.0,
              rate_img_one_five: item.rate >= 1.5,
              rate_img_two: item.rate >= 2.0,
              rate_img_two_five: item.rate >= 2.5,
              rate_img_three: item.rate >= 3.0,
              rate_img_three_five: item.rate >= 3.5,
              rate_img_four: item.rate >= 4.0,
              rate_img_four_five: item.rate >= 4.5,
              rate_img_four_seven: item.rate >= 4.7,
              rate_img_five: item.rate >= 5.0,
            }"
          ></div>
        </div>
        <p class="name ml-1 text-xs">
          <!-- （総合評価：{{ item.all_rate | comma }}） -->
        </p>
      </div>

      <div class="">DEMO</div>

      <div v-highlightjs class="markdown w-full" v-html="item.body"></div>
    </div>
  </div>
</template>
<script>
import dayjs from 'dayjs'
export default {
  props: {
    item: {
      type: Object,
      default: () => {},
    },
  },
  data() {
    return {
      liked: false,
      isDisabled: false,
    }
  },
  computed: {
    updated_at() {
      const time = dayjs(this.item.updated_at)
      return time.format('YYYY-MM-DD')
    },
    breadcrumbs() {
      return {
        data: [
          {
            name: 'トップページ',
            path: '/',
          },
          {
            name: 'カテゴリー名',
            path: '/category/',
          },
          {
            name: '記事タイトルです',
          },
        ],
      }
    },
  },
  mounted() {
    // 設定
    const TOC_INSERT_SELECTOR = '#toc' // [セレクター指定] 目次を挿入する要素 querySelector用
    const HEADING_SELECTOR = 'h1,h2,h3,h4,h5,h6' // [セレクター指定] 収集する見出し要素 querySelectorAll用
    const LINK_CLASS_NAME = 'tocLink' // [クラス名] 目次用aタグに追加するクラス名     .無し
    const ID_NAME = 'heading' // [ID名]    目次に追加するID名のプレフィックス #無し
    const tocInsertElement = document.querySelector(TOC_INSERT_SELECTOR)
    const headingElements = document.querySelectorAll(HEADING_SELECTOR)
    const layer = []
    let id = 0
    const uid = () => `${ID_NAME}${id++}`
    let oldRank = -1
    try {
      const createLink = (el) => {
        let li = document.createElement('li')
        let a = document.createElement('a')
        el.id = el.id || uid()
        a.href = `#${el.id}`
        a.innerText = el.innerText
        a.className = LINK_CLASS_NAME
        li.appendChild(a)
        return li
      }
      const findParentElement = (layer, rank, diff) => {
        do {
          rank += diff
          if (layer[rank]) return layer[rank]
        } while (0 < rank && rank < 7)
        return false
      }
      const appendToc = (el, toc) => {
        el.appendChild(toc.cloneNode(true))
      }
      headingElements.forEach((el) => {
        let rank = Number(el.tagName.substring(1))
        let parent = findParentElement(layer, rank, -1)
        if (oldRank > rank) layer.length = rank + 1
        if (!layer[rank]) {
          layer[rank] = document.createElement('ol')
          if (parent.lastChild) parent.lastChild.appendChild(layer[rank])
        }
        layer[rank].appendChild(createLink(el))
        oldRank = rank
      })
      if (layer.length)
        appendToc(tocInsertElement, findParentElement(layer, 0, 1))
    } catch (e) {
      //error
    }
  },
}
</script>
<style lang="scss" scoped>
.items {
  @apply flex relative flex-col w-full justify-start py-10;
  height: 420px;
  min-height: 420px;
  max-height: 420px;
}
.item {
  @apply flex flex-col relative justify-between items-start;
}

.title {
  @apply font-bold cursor-pointer text-4xl mt-4;
}
.describe {
  @apply flex w-full items-center my-2 text-xl;
}
.center {
  @apply flex flex-col px-6;
  @screen lg {
    width: 576px;
  }
}
// 商品画像
.img {
  @apply object-cover cursor-pointer;
  height: 140px;
  min-height: 140px;
  max-height: 140px;
  width: 260px;
  min-width: 260px;
  max-width: 260px;
}

// .content {
//   @apply flex flex-col items-center justify-center absolute hidden shadow-lg rounded p-6;
//   background-color: var(--bg);
//   top: 0px;
//   left: 125px;
//   max-height: 300px;
//   width: 400px;
//   z-index: 510;
// }
.tag {
  @apply px-2 py-1 mr-2;
  border: 1px solid var(--ccc);
}

.name {
  @apply text-xs cursor-pointer mt-2;
}
// いいね
.like {
  @apply p-2.5 ml-4 rounded-full cursor-pointer;
  color: var(--aaa);
  border: 1px solid var(--ccc);
  &-yes {
    background: var(--red);
    border: 1px solid var(--red);
    &:hover {
      @apply duration-200;
      -webkit-box-shadow: 0 8px 25px -8px var(--red);
      box-shadow: 0 8px 25px -8px var(--red);
    }
  }
}
// 教材レベル
.level {
  @apply flex justify-end mt-2 px-2 py-1 mr-2 font-bold rounded cursor-pointer;
  max-width: 50px;
  &_one {
    border: 1px solid $green;
    color: $green;
  }
  &_two {
    border: 1px solid $yellow;
    color: $yellow;
  }
  &_three {
    border: 1px solid $red;
    color: $red;
  }
  &_four {
    border: 1px solid $purple;
    color: $purple;
  }
}
// 教材評価
.rate {
  @apply text-2xl font-bold cursor-default;
  &_one {
    color: $green;
  }
  &_two {
    color: $yellow;
  }
  &_three {
    color: $red;
  }
  &_four {
    color: $purple;
  }
}
// 教材評価画像
.rate_img {
  @apply flex items-center ml-2;
  &_zero {
    height: 17px;
    width: 100px;
    background-image: url('~@/assets/images/rate/zero.svg');
  }
  &_one {
    height: 17px;
    width: 100px;
    background-image: url('~@/assets/images/rate/one.svg');
  }
  &_one_five {
    height: 17px;
    width: 100px;
    background-image: url('~@/assets/images/rate/one-five.svg');
  }
  &_two {
    height: 17px;
    width: 100px;
    background-image: url('~@/assets/images/rate/two.svg');
  }
  &_two_five {
    height: 17px;
    width: 100px;
    background-image: url('~@/assets/images/rate/two-five.svg');
  }
  &_three {
    height: 17px;
    width: 100px;
    background-image: url('~@/assets/images/rate/three.svg');
  }
  &_three_five {
    height: 17px;
    width: 100px;
    background-image: url('~@/assets/images/rate/three-five.svg');
  }
  &_four {
    height: 17px;
    width: 100px;
    background-image: url('~@/assets/images/rate/four.svg');
  }
  &_four_five {
    height: 17px;
    width: 100px;
    background-image: url('~@/assets/images/rate/four-five.svg');
  }
  &_four_seven {
    height: 17px;
    width: 100px;
    background-image: url('~@/assets/images/rate/four-seven.svg');
  }
  &_five {
    height: 17px;
    width: 100px;
    background-image: url('~@/assets/images/rate/five.svg');
  }
}
.demo {
  @apply inline-flex justify-center items-center mt-2 px-4 py-1 rounded cursor-pointer;
  max-width: 50px;
  border: 1px solid var(--sub-color);
}
</style>
