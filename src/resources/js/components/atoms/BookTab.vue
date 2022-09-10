<template>
  <div class="tab">
    <ul class="tabMenu">
      <li @click="isSelect('1')" v-bind:class="{ active: isActive === '1' }">
        エピソード
      </li>
      <li @click="isSelect('2')" v-bind:class="{ active: isActive === '2' }">あらすじ</li>
      <li @click="isSelect('3')" v-bind:class="{ active: isActive === '3' }">作品情報</li>
    </ul>
    <div class="tabContents">
      <div v-if="isActive === '1'">
        <slot name="episode"></slot>
      </div>
      <div v-else-if="isActive === '2'">
        <slot name="story"></slot>
      </div>
      <div v-else-if="isActive === '3'">
        <slot name="info"></slot>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      isActive: "1",
    };
  },
  methods: {
    isSelect: function (num) {
      this.isActive = num;
    },
  },
};
</script>
<style lang="scss" scoped>
.tab {
  @apply w-full;
  .tabMenu {
    @apply flex bg-white;
    li {
      @apply w-auto cursor-pointer py-2 px-4 border-b border-ddd;
      &.active {
        @apply font-semibold text-primary border-b-2 border-primary;
      }
    }
  }
  .tabContents {
    @apply w-full p-6;
  }
}
</style>
