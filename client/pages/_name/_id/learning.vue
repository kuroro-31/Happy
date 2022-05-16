<template>
  <div class="w-full h-screen mx-auto flex flex-col scroll-none">
    <LearningNav :item="item" />
    <div class="main scroll-none">
      <div class="w-1/5"></div>
      <div class="lg:flex w-3/5 max-w-3xl justify-center">
        <CourceItem :item="item" />
        <!-- <FooterNav /> -->
      </div>
      <div id="toc" class="toc" />
    </div>
    <!-- <FooterNav /> -->
  </div>
</template>
<script>
export default {
  async asyncData({ $axios, params }) {
    const { data } = await $axios.$get(`/api/posts/${params.id}`)
    return {
      item: data,
    }
  },
  data() {
    return {
      item: [],
    }
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
    let links = null
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

      const tocHighlight = (e) => {
        const sy = window.pageYOffset
        const ey = sy + document.documentElement.clientHeight
        let tocHighlightEl = [null]
        links.forEach((el) => {
          const targetEl = document.querySelector(el.hash)
          const y = sy + targetEl.getBoundingClientRect().top
          el.classList.remove('active')
          if (sy < y && y < ey) {
            tocHighlightEl.push(el)
            tocHighlightEl[0] = null
          }
          if (sy > y) tocHighlightEl[0] = el
        })
        if (tocHighlightEl.length)
          tocHighlightEl.forEach((el) => {
            el && el.classList.add('active')
          })
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

      const links = document.querySelectorAll(`.${LINK_CLASS_NAME}`)
      links.forEach((el) => {
        el.addEventListener('click', (e) => {
          const targetEl = document.querySelector(el.hash)
          scrollTo(
            0,
            window.pageYOffset + targetEl.getBoundingClientRect().top - 100
          )
          e.preventDefault()
          e.stopPropagation()
        })
      })

      tocHighlight()
      window.addEventListener('scroll', tocHighlight)
    } catch (e) {
      //error
    }
  },
}
</script>
<style lang="scss" scoped>
.main {
  @apply w-full flex justify-center relative my-12;
  // margin-top: -420px;
}
</style>
