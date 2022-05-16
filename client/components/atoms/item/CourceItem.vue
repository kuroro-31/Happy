<template>
  <div class="item">
    <!-- タイトル -->
    <!-- <span class="title">
      {{ item.title }}
    </span> -->

    <!-- <div v-highlightjs class="markdown w-full" v-html="item.body"></div> -->
    <!-- <div class="whitespace-pre-wrap">
      {{ item.body }}
    </div> -->

    <div class="flex w-full mt-4 justify-center">
      <div class="chapter">
        <!-- ノートリスト -->
        <!-- <draggable :list="item" group="notes" :animation="200"> -->
        <NoteItem
          v-for="note in noteList"
          :key="note.id"
          :note="note"
          :layer="1"
          @select="onSelectNote"
        />
        <!-- </draggable> -->

        <!-- ノート追加ボタン -->
        <!-- <button @click="onClickButtonAdd">追加</button> -->
      </div>
      <div class="main-body scroll-none">
        <div class="main-body-content">
          <template v-if="selectedNote == null">
            <div class="no-selected-note">ノートを選択してください</div>
          </template>
          <template v-else>
            <div class="path">
              <small>{{ selectedPath }}</small>
            </div>
            <div class="note-content">
              <h3 class="note-title">{{ selectedNote.name }}</h3>
              <WidgetItem
                v-for="widget in item"
                :key="widget.id"
                :widget="widget"
                :layer="1"
              />
            </div>
          </template>
        </div>
      </div>
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
  methods: {
    onSelectNote(targetNote) {
      // 再帰的にノートの選択状態を更新
      const updateSelectStatus = function (targetNote, noteList) {
        for (let note of noteList) {
          note.selected = note.id === targetNote.id
          updateSelectStatus(targetNote, note.children)
        }
      }
      updateSelectStatus(targetNote, this.noteList)

      // 選択中ノート情報を更新
      this.selectedNote = targetNote
    },
  },
}
</script>
<style lang="scss" scoped>
.item {
  @apply w-full flex flex-col relative justify-between items-start p-8;
  background: var(--bg-secondary);
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
