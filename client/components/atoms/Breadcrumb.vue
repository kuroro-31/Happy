<template>
  <div>
    <div class="">
      <ul class="genre">
        <li v-for="breadcrumb in breadcrumbs.data" :key="breadcrumb.name">
          <a v-if="breadcrumb.path" :href="breadcrumb.path" class="genre-title">
            {{ breadcrumb.name }}
          </a>
          <span v-else class="genre-title">{{ breadcrumb.name }}</span>
          <span class="arrow">></span>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    breadcrumbs: {
      type: Object,
      default: () => {},
    },
  },
}
</script>
<style lang="scss" scoped>
.genre {
  @apply flex items-center text-xs;
  &-title {
    @apply font-bold cursor-pointer;
    &:hover {
    }
  }
}
ul li:last-child {
  .arrow {
    display: none;
  }
}
.arrow {
  @apply mx-2;
}
</style>
