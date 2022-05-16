<template>
  <div>
    <!-- 右サイド -->
    <div class="sidebar-detail">
      <div class="flex items-center mb-4">
        <!-- セール価格 -->
        <span class="sidebar-detail-sale">
          {{ $moneyFormat(item.sale_price) }}
        </span>

        <!-- 定価 -->
        <span class="sidebar-detail-normal">
          {{ $moneyFormat(item.normal_price) }}
        </span>
      </div>

      <!-- ボタン -->
      <div class="flex flex-col w-full">
        <re-button
          class="re-button h-full no-shadow"
          :class="isLiked ? 'no-shadow' : ''"
        >
          <button
            type="submit"
            class="re-button-primary-border"
            @click="isLiked = !isLiked"
          >
            <!-- <heart-icon
              size="1x"
              class="mr-2"
              :class="isLiked ? 'text-red' : ''"
            ></heart-icon> -->
            <span :class="!isLiked ? 'block' : 'hidden'">お気に入りに追加</span>
            <span :class="isLiked ? 'block' : 'hidden'">お気に入り</span>
          </button>
        </re-button>
        <re-button
          class="re-button h-full mt-2"
          :class="isDisabled ? 'no-shadow' : ''"
        >
          <button
            type="submit"
            class="re-button-primary-filled"
            @click="$router.push('/item/cart')"
          >
            <!-- <shopping-cart-icon size="1x" class="mr-2"></shopping-cart-icon> -->
            カートに入れる
          </button>
        </re-button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isDisabled: false,
      isLiked: false,
      item: [
        {
          // キー
          id: 1,
          // レベル
          level: '初級',
          // 画像
          src: 'https://i.gyazo.com/3361b22275519a99133abe27ea99f34c.png',
          // タイトル
          title: 'ゼロからはじめる Dockerによるアプリケーション実行環境構築',
          // 概要
          describe:
            'コンテナの実行方法を学び、Ruby on RailsやDjangoといったWebアプリケーションフレームワークを使用した環境構築について学びます。Docker MachineやSwarmといったDocker関連技術についても学びます。',
          // セール価格
          rate: 4.7,
          all_rate: 4.7,
          sale_price: '3500',
          normal_price: '5000',
          // 作者
          name: 'クラピカ',
          // タグ
          tags: ['phase1', 'btn', 'rakuten'],
          // 日付
          add_time: '2021/06/23',
          edit_time: '2021/06/23',
          // でもページ
          demo: '#',
        },
      ],
    }
  },
}
</script>

<style lang="scss" scoped>
.sidebar-detail {
  @apply flex items-center justify-center flex-col w-full h-full;
  // min-width: 100px;
  // border-left: 1px var(--thin-gray) solid;
  // background-color: var(--bg);
  &-sale {
    @apply text-3xl;
    // color: var(--red);
  }
  &-normal {
    @apply line-through ml-2;
    color: var(--sub-color);
  }
}
</style>
