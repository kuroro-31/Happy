<template>
  <header class="nav" :class="{ active: isUser }">
    <div class="nav-content">
      <div class="nav-left py-2.5">
        <Logo />
      </div>

      <div class="nav-center flex items-center py-2.5">
        <!-- 検索 -->
        <div class="text-2xl font-bold whitespace-nowrap">{{ item.title }}</div>
      </div>

      <div class="nav-right">
        <!-- ユーザードロップダウン -->
        <UserDropdown />
      </div>
    </div>
  </header>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  props: {
    item: {
      type: Object,
      default: () => {},
    },
  },
  computed: {
    ...mapGetters({
      isUser: 'user/auth',
    }),
  },
}
</script>
<style lang="scss" scoped>
.toggle {
  @apply mr-4 cursor-pointer p-2 flex-shrink-0;
  height: 40px;
  width: 40px;
  &:hover {
    @apply rounded-lg;
    background: var(--eee);
  }
}
.nav {
  @apply sticky top-0 z-20 flex items-center justify-center h-16;
  background-color: var(--bg-secondary);
  padding: 0 6.7%;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
  // background-color:rgba(var(--primary));
  // border-bottom-width: 1px;
  // border-style: solid;
  // border-color: var(--gray);
  &-content {
    @apply w-full mx-auto flex flex-wrap items-center justify-between mt-0;
  }
  &-left {
    @apply flex items-center lg:w-1/4 xl:w-1/5 mr-12;
    height: 45px;
    width: 240px;
  }
  &-center {
    @apply mr-auto;
  }
  &-right {
    @apply justify-end;
  }
  &-left,
  &-right {
    @apply flex h-full items-center;
  }
}
.dropdown {
  @apply px-3 relative;
  height: 60px;
  &-icon {
    // @apply flex-shrink-0 inline-block cursor-pointer;
  }
  &-img {
    @apply object-cover rounded-full shadow-lg cursor-pointer;
    width: 40px;
    height: 40px;
  }
  &-contents {
    @apply absolute top-0 right-0 z-50 rounded-lg shadow-lg overflow-y-auto cursor-default;
    background-color: var(--bg-secondary);
    @screen lg {
      margin-top: 60px;
      width: 300px;
      max-height: calc(100vh - 120px);
    }
  }
}
// .fb-btn {
//   @apply py-2 px-4 text-white rounded-lg text-lg  duration-200;
//   background: #1976f2;
//   border: 1px solid #1976f2;

//   &:hover {
//     -webkit-box-shadow: 0 8px 25px -8px #1976f2;
//     box-shadow: 0 8px 25px -8px #1976f2;
//   }
// }
// .fb-btn-posted {
//   @apply py-3 px-4 text-white rounded-lg text-xl font-bold;
//   color: #1976f2;
//   border: 1px solid #1976f2;
// }
// .show {
//   @apply block;
// }
// .dropdown-bg {
//   width: 100vw;
//   height: 100vh;
//   position: absolute;
//   top: 0;
//   bottom: 0;
//   left: 0;
//   right: 0;
//   z-index: 2;
// }
.search {
  @apply px-4 py-2 rounded-lg;
  background-color: var(--bg-secondary);
  background-clip: padding-box;
  border: 1px solid var(--gray);
}

// .purple {
//   width: 30px;
//   height: 30px;
//   background: $purple;
// }
</style>
