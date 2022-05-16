<template>
  <div class="w-full mx-auto flex flex-col scroll-none">
    <HeaderNav />
    <div v-if="!isUser" class="hero">
      <div class="flex w-full justify-center h-full items-center">
        <div class="flex flex-col">
          <h2 class="title">
            <!-- TODO 翻訳 -->
            <br />
            {{ $t('自分と向き合い') }}
            <br />
            {{ $t('着実に壁を超えていこう') }}
          </h2>
          <span class="describe">
            {{ $t('プログラミング初心者から現役エンジニアレベルまでを目指す') }}
            <br />
            {{ $t('オンライン学習マーケットプレイス') }}
          </span>
          <nuxt-link to="/auth/login">
            <re-button class="re-button">
              <button type="submit" class="re-button-primary-filled bg-primary">
                {{ $t('学習ロードマップをみる') }}
              </button>
            </re-button>
          </nuxt-link>
        </div>
      </div>
      <div class="main-img"></div>
    </div>

    <main class="w-full flex flex-col max-w-screen-xl mx-auto container">
      <div v-if="!isUser" class="message">
        <h2 class="text-5xl font-bold mb-12">メッセージ</h2>
        <div class="message-content">
          <!-- <div class="message-content-left">
            <img
              src="https://i.gyazo.com/575d83baf9639e9ef278e227b122a36c.jpg"
              alt="reshelf ceo img"
            />
            <h2 class="logo">Reshelf</h2>
            <span class="text-xl font-bold">CEO</span>
            <span class="text-2xl font-bold">田中 俊一朗</span>
            <div class=""></div>
          </div> -->
          <div class="message-content-right">
            <h3 class="message-content-right-title">
              継続的に学べるコミュニティを
            </h3>
            <p class="message-content-right-describe">
              私は今までに対面の研修や「Udemy」をはじめとしたオンライン学習など様々なサービスを利用しプログラミングを学習してきました。
            </p>
            <p class="message-content-right-describe">
              情報リテラシーがなかった初期の学生の頃は、詐欺に騙されたり、
              目標や覚悟のないまま短期間の高額スクールを利用し両親にも迷惑をかけたりと、大きな失敗や挫折も経験してきました。
            </p>
            <p class="message-content-right-describe">
              プログラミングの習得は一朝一夕にはいかず、決して近道はありません。
              継続的に学習をする上で安心して利用できる学習コミュニティを作りたい、という想いで生まれたのがReshelfです。
            </p>
            <p class="message-content-right-describe">
              Reshelfは独学できる人を応援しているため、コースは全てオープンソースです。
              コミュニティの参加有無なしにReshelfはあなたの隣であなたの学習を応援します！
            </p>
            <div class="text-right mt-4">
              <span class="text-xl font-bold">CEO</span>
              <span class="text-2xl font-bold">田中 俊一朗</span>
            </div>
          </div>
        </div>
      </div>
      <div v-if="isUser" class="lg:flex w-full -mx-6">
        <nav class="side-nav lg:max-h-(screen-22) pin-22">
          <SidebarSearch />
        </nav>
        <div class="main-body min-h-(screen-16)">
          <!-- <hero-item /> -->
          <!-- <button @click="resetVuex">cart vuexリセット</button> -->
          <all-item />

          <!-- <FooterNav /> -->
        </div>
      </div>
    </main>

    <FooterNav />
  </div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
  computed: {
    ...mapGetters({
      isUser: 'user/auth',
      user: 'user/user',
    }),
    carts() {
      let carts = null
      if (this.isUser) {
        carts = this.$store.getters['cart/carts']
      }
      return carts
    },
  },
  methods: {
    async resetVuex() {
      // NOTE カートリセット
      await this.$store
        .dispatch('cart/reset')
        .then((value) => {
          alert('成功')
        })
        .then((value) => {
          alert('失敗')
        })
    },
  },
}
</script>
<style lang="scss" scoped>
.logo {
  @apply text-4xl font-bold mt-6;
  font-family: 'Julius Sans One', sans-serif;
}
.hero {
  @apply w-full flex items-center mx-auto;
  background: var(--bg-secondary);
  max-height: calc(100vh - 65px);
  padding: 6.7% 0 6.7% 6.7%;
}

.message {
  @apply flex flex-col justify-center mx-auto items-center w-full max-w-4xl py-8;
  &-content {
    @apply w-full flex;
    padding: 40px 32px;
    background: #fff;
    border-radius: 20px;
    // box-shadow: 8px 8px 0 rgba(69, 200, 171, 1);
    // gap: 32px;
    &-left {
      @apply flex flex-col;
      img {
        @apply object-cover rounded-lg shadow;
        min-width: 253px;
        max-width: 253px;
        height: 300px;
      }
    }
    &-right {
      @apply pl-8;
      &-title {
        @apply text-4xl font-bold;
        background: linear-gradient(
          to right,
          rgba(69, 200, 171, 1) 0%,
          rgba(51, 153, 228, 1) 100%
        );
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }
      &-describe {
        @apply mt-4;
        letter-spacing: 3px;
        line-height: 2;
        // color: var(--sub-color);
      }
    }
  }
}
.main-img {
  @apply w-1/2 h-full flex items-center;
  svg {
    @apply w-full h-full;
  }
  // svg g path,
  // svg g circle,
  // svg g ellipse,
  // svg path {
  //   stroke: rgba(var(--primary));
  // }
}
.title {
  @apply text-6xl text-left;
  color: var(--color);
}
.describe {
  @apply block text-2xl font-semibold mt-2 mb-4 h-auto;
  color: var(--sub-color);
  text-align: left;
}
.btn {
  @apply flex items-center justify-center font-bold duration-200 rounded-lg;
  width: 160px;
  height: 45px;
  color: var(--bg-secondary);
  background: rgba(var(--primary));
  &:hover {
    @apply shadow-lg;
  }
}
.box {
  @apply block flex flex-col items-center justify-center;
  width: 200px;
  height: 200px;
  border-radius: 10px;
  box-shadow: 0px 2px 5px rgba(38, 51, 77, 0.03);
  // border: 1px solidrgba(var(--primary));

  &:hover {
    @apply cursor-pointer;
  }
  &-business {
    @apply duration-200 mr-16;
    background: var(--bg-secondary);
    &:hover {
      transform: translateY(-5px);
    }
  }
  &-tech {
    @apply duration-200 mr-16;
    background: var(--bg-secondary);
    &:hover {
      transform: translateY(-5px);
    }
  }
  &-aca {
    @apply duration-200 mr-16;
    background: var(--bg-secondary);
    &:hover {
      transform: translateY(-5px);
    }
  }
  &-lifestyle {
    @apply duration-200;
    background: var(--bg-secondary);
    &:hover {
      transform: translateY(-5px);
    }
  }
  &-title {
    @apply text-left inline-block text-lg font-semibold;
    line-height: 20px;
    color: var(--color);
    margin-top: 20px;
  }
}
.field {
  @apply w-full;
  height: 150px;
  color: var(--bg-secondary);
  h3 {
    @apply text-4xl font-bold w-full h-full flex items-center justify-center;
    color: var(--bg-secondary);
  }
}
.side-nav {
  @apply hidden w-full lg:block lg:w-1/4 xl:w-1/5 z-10 lg:sticky overflow-y-auto;
  @screen lg {
    // border-right: 1px #ddd solid;
  }
  // @screen lg {
  //   @apply overflow-y-auto;
  //   height: calc(100vh - 68px);
  // }
}
.main-body {
  // @apply w-full lg:w-3/4 xl:w-3/5 pt-10 px-6 lg:px-12;
  // @apply w-full lg:w-3/4 xl:w-3/5 p-6;
  @apply w-full lg:w-3/4 xl:w-4/5 p-6 lg:pl-10;
  // @screen lg {
  //   @apply overflow-y-auto;
  //   height: calc(100vh - 68px);
  // }
}
</style>
