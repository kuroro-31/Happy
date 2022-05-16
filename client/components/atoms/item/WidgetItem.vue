<template>
  <div class="widget-family">
    <div
      class="widget"
      :class="{ mouseover: widget.mouseover }"
      @mouseover="onMouseOver"
      @mouseleave="onMouseLeave"
    >
      <template v-if="propsWidget.type == 'heading'">
        <editor
          :ref="'widget-heading-' + propsWidget.id"
          v-model="propsWidget.text"
          selector="textarea"
          api-key="oxl1g4dleeqrpfmcnpvu7wqcnpsljq6nxbpenlhole2n0rmh"
          :init="init"
        />
      </template>
    </div>
  </div>
</template>

<script>
import { editor } from '@/mixins/posts/editor.js'
export default {
  name: 'WidgetItem',
  mixins: [editor],
  props: {
    widget: {
      type: Object,
      default: () => {},
    },
    parentWidget: {
      type: Object,
      default: () => {},
    },
    layer: {
      type: Number,
      default: 1,
    },
  },
  computed: {
    propsWidget: {
      get() {
        return this.widget
      },
      set(newVal) {
        this.$emit('childWidget', newVal)
      },
    },
  },
  watch: {
    'widget.text'() {
      this.resizeCodeTextarea()
    },
  },
  mounted() {
    const input = this.$refs[`widget-${this.widget.type}-${this.widget.id}`]
    // input.focus()
  },
  methods: {
    onMouseOver() {
      this.propsWidget.mouseover = true
    },
    onMouseLeave() {
      this.propsWidget.mouseover = false
    },
    onClickDelete(parentWidget, widget) {
      this.$emit('delete', parentWidget, widget)
    },
    onClickChildWidget(widget) {
      this.$emit('addChild', widget)
    },
    onClickAddWidgetAfter(parentWidget, widget) {
      this.$emit('addWidgetAfter', parentWidget, widget)
    },
    onKeydownTab(e) {
      if (this.widget.layer < 3) {
        this.$emit('addChild', this.widget)
      }
      e.preventDefault()
    },
    onKeydownDelete(e) {
      if (this.widget.text.length === 0) {
        this.$emit('delete', this.parentWidget, this.widget)
        e.preventDefault()
      }
    },
    resizeCodeTextarea() {
      if (this.widget.type !== 'code') return
      const textarea = this.$refs[`widget-code-${this.widget.id}`]
      const promise = new Promise(function (resolve) {
        resolve((textarea.style.height = 'auto'))
      })
      promise.then(function () {
        textarea.style.height = textarea.scrollHeight + 'px'
      })
    },
  },
}
</script>

<style scoped lang="scss">
.widget {
  width: 100%;
  min-height: 40px;
  display: flex;
  align-items: center;
  padding: 5px 10px;
  color: rgba(25, 23, 17, 0.6);
  .buttons {
    display: flex;
    flex-direction: row;
    cursor: pointer;
    .button-icon {
      padding: 3px;
      margin-left: 3px;
      border-radius: 5px;
    }
  }
  input.heading {
    font-size: 20px;
    font-weight: bold;
    border-bottom: 1.5px solid #e0e0e0;
  }
  input.body {
    font-size: 16px;
  }
}
.child-widget {
  padding-left: 10px;
}
</style>
