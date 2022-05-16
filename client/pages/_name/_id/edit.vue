<template>
  <div class="w-full h-screen mx-auto flex flex-col scroll-none">
    <HeaderNav />
    <div class="w-full flex mx-auto scroll-none">
      <form class="flex w-full mt-4 justify-center" @submit.prevent="update">
        <div class="chapter" @click.self="onEditNoteEnd()">
          <!-- ノートリスト -->
          <draggable :list="noteList" group="notes" :animation="200">
            <NoteItem
              v-for="note in noteList"
              :key="note.id"
              :note="note"
              :layer="1"
              @delete="onDeleteNote"
              @select="onSelectNote"
              @editStart="onEditNoteStart"
              @editEnd="onEditNoteEnd"
              @addChild="onAddChildNote"
              @addNoteAfter="onAddNoteAfter"
            />
          </draggable>

          <!-- ノート追加ボタン -->
          <button @click="onClickButtonAdd">追加</button>
        </div>
        <div class="main-body scroll-none">
          <div class="main-body-content">
            <p class="mb-4">{{ alert }}</p>

            <!-- タイトル -->
            <label class="font-semibold text-xs text-gray-600 pb-1 block">
              タイトル
            </label>
            <input
              v-model.trim="post.title"
              type="text"
              autofocus
              class="border rounded px-3 py-2 mt-1 mb-5 text-xs w-full"
            />

            <div @click.self="onEditNoteEnd()">
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
                    v-for="widget in selectedNote.widgetList"
                    :key="widget.id"
                    :widget="widget"
                    :layer="1"
                    @delete="onDeleteWidget"
                    @addChild="onAddChildWidget"
                    @addWidgetAfter="onAddWidgetAfter"
                  />
                </div>
              </template>
            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- <FooterNav /> -->
    <Toast />
  </div>
</template>
<script>
// import { toast } from '@/mixins/toast/toast.js'
import draggable from 'vuedraggable'
export default {
  components: {
    draggable,
  },
  async asyncData({ $axios, params }) {
    const { data } = await $axios.$get(`/api/posts/${params.id}`)
    return { post: data }
  },
  // props: {
  //   success: {
  //     type: Boolean,
  //   },
  // },
  data() {
    return {
      // update_error: false,
      // update_success: false,
      alert: '',
      post: {
        title: '',
        tags: [],
      },
      saved: false,

      content: [],
      // allTagNames: [
      //   'プログラミング',
      //   'python',
      //   'javascript',
      //   'golong',
      //   'gaagaa',
      // ],
      noteList: [],
      selectedNote: null,
    }
  },
  computed: {
    selectedPath() {
      const searchSelectedPath = function (noteList, path) {
        for (let note of noteList) {
          const currentPath =
            path == null ? note.name : `${path} / ${note.name}`
          if (note.selected) return currentPath
          const selectedPath = searchSelectedPath(note.children, currentPath)
          if (selectedPath.length > 0) return selectedPath
        }
        return ''
      }
      return searchSelectedPath(this.noteList)
    },
  },
  watch: {
    post: {
      // eslint-disable-next-line
      handler: _.debounce(function () {
        this.update()
      }, 2000), // 更新されたら保存処理
      deep: true,
    },
    saved: {
      // 保存完了後にアラートを消す
      // eslint-disable-next-line
      handler: _.debounce(function () {
        this.clearAlert()
      }, 2000),
      deep: true,
    },
  },
  methods: {
    async update() {
      try {
        this.alert = '保存中です...'
        await this.$axios
          .$patch(`/api/posts/${this.$route.params.id}`, {
            title: this.post.title,
            body: this.noteList,
          })
          .then(({ data }) => {
            this.alert = '保存しました。'
            this.saved = true
          })
      } catch (error) {
        if (error.response.status == '401') {
          this.$store.dispatch('user/logout')
          this.$router.push('/auth/login')
        } else if (error.response.status == '404') {
          this.$router.push('/error/404')
        } else if (error.response.status == '500') {
          this.$router.push('/error/500')
        }
      }
    },
    clearAlert() {
      this.alert = ''
    },
    onAddNoteCommon(targetList, layer, index) {
      layer = layer || 1
      const note = {
        id: new Date().getTime().toString(16),
        name: `チャプター-${layer}-${targetList.length}`,
        mouseover: false,
        editing: false,
        selected: false,
        children: [],
        layer: layer,
        widgetList: [],
      }

      this.onAddWidgetCommon(note.widgetList)

      if (index == null) {
        targetList.push(note)
      } else {
        targetList.splice(index + 1, 0, note)
      }
    },
    onClickButtonAdd() {
      this.onAddNoteCommon(this.noteList)
    },
    onDeleteNote(parentNote, note) {
      const targetList =
        parentNote == null ? this.noteList : parentNote.children
      const index = targetList.indexOf(note)
      targetList.splice(index, 1)
    },
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
    onEditNoteStart(editNote, parentNote) {
      const targetList =
        parentNote == null ? this.noteList : parentNote.children
      for (let note of targetList) {
        note.editing = note.id === editNote.id
        this.onEditNoteStart(editNote, note)
      }
    },
    onEditNoteEnd(parentNote) {
      const targetList =
        parentNote == null ? this.noteList : parentNote.children
      for (let note of targetList) {
        note.editing = false
        this.onEditNoteEnd(note)
      }
    },
    onAddChildNote(note) {
      this.onAddNoteCommon(note.children, note.layer + 1)
    },
    onAddNoteAfter(parentNote, note) {
      const targetList =
        parentNote == null ? this.noteList : parentNote.children
      const layer = parentNote == null ? 1 : note.layer
      const index = targetList.indexOf(note)
      this.onAddNoteCommon(targetList, layer, index)
    },
    onAddWidgetCommon(targetList, layer, index) {
      layer = layer || 1
      const widget = {
        id: new Date().getTime().toString(16),
        type: layer === 1 ? 'heading' : 'body',
        body: '',
        mouseover: false,
        children: [],
        layer: layer,
      }
      if (index == null) {
        targetList.push(widget)
      } else {
        targetList.splice(index + 1, 0, widget)
      }
    },
    onClickButtonAddWidget() {
      this.onAddWidgetCommon(this.selectedNote.widgetList)
    },
    onAddChildWidget(widget) {
      this.onAddWidgetCommon(widget.children, widget.layer + 1)
    },
    onAddWidgetAfter(parentWidget, note) {
      const targetList =
        parentWidget == null
          ? this.selectedNote.widgetList
          : parentWidget.children
      const layer = parentWidget == null ? null : parentWidget.layer + 1
      const index = targetList.indexOf(note)
      this.onAddWidgetCommon(targetList, layer, index)
    },
    onDeleteWidget(parentWidget, widget) {
      const targetList =
        parentWidget == null
          ? this.selectedNote.widgetList
          : parentWidget.children
      const index = targetList.indexOf(widget)
      targetList.splice(index, 1)

      // 削除した1つ前のウィジェットを選択状態にする
      const focusWidget = index === 0 ? parentWidget : targetList[index - 1]
      if (focusWidget != null) {
        focusWidget.id = (parseInt(focusWidget.id, 16) + 1).toString(16)
      }
    },
  },
}
</script>
<style lang="scss" scoped>
.side-nav {
  @apply hidden w-full lg:block mt-6 lg:w-1/5 z-10 lg:sticky overflow-y-auto;
}
.main-body {
  @apply w-full max-w-screen-md p-6 lg:pl-10;
}

.item {
  @apply duration-200 flex flex-col;
  &-title {
    @apply text-xs font-bold pt-4;
    color: var(--sub-color);
  }
  &-link {
    @apply duration-200 px-4 py-2 w-full h-full;
    color: var(--color);
    &:hover {
      @apply cursor-pointer;
      transform: translateX(5px);
      background: #f0f2f6;
      border-radius: 6px;
    }
  }
}
.title {
  color: var(--color);
}

.chapter {
  // @apply;
  width: 300px;
}
</style>
