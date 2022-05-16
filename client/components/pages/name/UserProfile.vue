<template>
  <div>
    <div class="user-profile">
      <div class="flex items-start divider">
        <img
          v-if="currentUser.icon"
          :src="currentUser.icon"
          :alt="currentUser.nickname + ' icon image'"
        />
        <img
          src="https://source.unsplash.com/190x190?urban"
          :alt="currentUser.nickname + ' icon image'"
        />
        <div class="w-full flex items-center justify-between">
          <div class="user-name">
            <div class="nickname">
              {{ currentUser.nickname }}
            </div>
            <div class="flex items-center">
              <!-- フォロー中 -->
              <div>
                <p
                  class="cursor-pointer"
                  @click="following_modal = !following_modal"
                >
                  <span class="font-bold">
                    {{ follow_counts }}
                  </span>
                  {{ $t('フォロー中') }}
                </p>
                <ReModal
                  v-if="following_modal"
                  @close="
                    ;(following_modal = !following_modal), (loading = false)
                  "
                >
                  <template slot="header">
                    {{ $t('フォロー中') }}
                  </template>
                  <div class="w-full flex flex-col justify-center">
                    <div
                      v-for="following in followings.followings"
                      :key="following.id"
                      class="flex items-center"
                    >
                      <p>{{ following.nickname }}</p>
                      <ReButton
                        v-if="following.name != user.name"
                        class="re-button w-auto"
                      >
                        <button
                          v-if="isFollow"
                          :class="{ button_loading: loading == true }"
                          class="re-button-primary-filled bg-primary relative"
                          @click="toFollow(following.name)"
                        >
                          <span class="button_text">
                            {{ $t('フォローする') }}
                          </span>
                        </button>
                        <button
                          v-else
                          class="re-button-primary-border"
                          @click="toUnFollow(following.name)"
                        >
                          {{ $t('フォロー中') }}
                        </button>
                      </ReButton>
                    </div>
                  </div>
                </ReModal>
              </div>
              <!-- フォロワー -->
              <div>
                <p
                  class="ml-4 cursor-pointer"
                  @click="follower_modal = !follower_modal"
                >
                  <span class="font-bold">
                    {{ follower_counts }}
                  </span>
                  {{ $t('フォロワー') }}
                </p>
                <ReModal
                  v-if="follower_modal"
                  @close="
                    ;(follower_modal = !follower_modal), (loading = false)
                  "
                >
                  <template slot="header">
                    {{ $t('フォロワー') }}
                  </template>
                  <!-- default -->
                  <div class="w-full flex flex-col justify-center">
                    <div
                      v-for="follower in followers.followers"
                      :key="follower.id"
                      class="flex items-center"
                    >
                      <p>{{ follower.nickname }}</p>
                      <ReButton
                        v-if="follower.name != user.name"
                        class="re-button w-auto"
                      >
                        <button
                          v-if="isFollow"
                          :class="{ button_loading: loading == true }"
                          class="re-button-primary-filled bg-primary relative"
                          @click="toFollow(following.name)"
                        >
                          <span class="button_text">
                            {{ $t('フォローする') }}
                          </span>
                        </button>
                        <button
                          v-else
                          class="re-button-primary-border"
                          @click="toUnFollow(following.name)"
                        >
                          {{ $t('フォロー中') }}
                        </button>
                      </ReButton>
                    </div>
                  </div>
                </ReModal>
              </div>
            </div>
          </div>
          <template v-if="user.id == currentUser.id">
            <ReButton
              class="re-button re-button-small no-shadow whitespace-nowrap"
            >
              <button
                class="re-button-primary bg-primary"
                @click="create(user)"
              >
                {{ $t('コースの作成') }}
              </button>
            </ReButton>
          </template>
          <ReButton v-else class="re-button w-auto">
            <button
              v-if="!isFollow"
              class="re-button-primary-filled bg-primary"
              @click="follow"
            >
              {{ $t('フォローする') }}
            </button>
            <button v-else class="re-button-primary-border" @click="unFollow">
              {{ $t('フォロー中') }}
            </button>
          </ReButton>
        </div>
      </div>

      <div class="item">
        <nuxt-link
          v-if="currentUser.name"
          class="item-link"
          :to="{ name: 'name', params: { name: currentUser.name } }"
        >
          {{ $t('マイコース') }}
        </nuxt-link>
        <nuxt-link
          v-if="currentUser.name == user.name"
          class="item-link"
          :to="{ name: 'name-learning', params: { name: user.name } }"
        >
          {{ $t('受講中のコース') }}
        </nuxt-link>
        <nuxt-link
          v-if="currentUser.name == user.name"
          class="item-link"
          :to="{ name: 'name-like', params: { name: user.name } }"
        >
          {{ $t('お気に入り') }}
        </nuxt-link>
        <nuxt-link
          v-if="currentUser.name == user.name"
          class="item-link"
          :to="{ name: 'name-archive', params: { name: user.name } }"
        >
          {{ $t('アーカイブ') }}
        </nuxt-link>
        <nuxt-link
          v-if="currentUser.name == user.name"
          class="item-link"
          :to="{ name: 'name-setting', params: { name: user.name } }"
        >
          {{ $t('設定') }}
        </nuxt-link>
        <nuxt-link
          v-if="currentUser.name"
          class="item-link"
          :to="{
            name: 'name-spring',
            params: { name: currentUser.name },
          }"
        >
          {{ $t('願いの泉') }}
        </nuxt-link>
      </div>
      <!-- <SidebarSetting class="divider" /> -->
    </div>
  </div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
  data() {
    return {
      number: 32000,
      isFollow: false,
      following_modal: false,
      follower_modal: false,
      loading: false,
      followings: [],
      followers: [],
    }
  },
  computed: {
    ...mapGetters({
      user: 'user/user',
      currentUser: 'user/currentUser',
    }),
    follow_counts() {
      let counts = 0
      if (this.followings.following != null) {
        counts = this.followings.followings.length
      }
      return counts
    },
    follower_counts() {
      let counts = 0
      if (this.followers.followers != null) {
        counts = this.followers.followers.length
      }
      return counts
    },
  },
  created() {
    this.getFollowings()
    this.getFollowers()
  },
  methods: {
    async create(user) {
      await this.$store.dispatch('product/create', user)
    },
    async follow() {
      try {
        await this.$axios.$put(`/api/users/${this.currentUser.name}/follow`)
        this.isFollow = true
      } catch (error) {
        if (error.response.status == '401') {
          this.$router.push('/auth/login')
        } else if (error.response.status == '404') {
          this.$router.push('/error/404')
        } else if (error.response.status == '500') {
          this.$router.push('/error/500')
        } else {
          alert(error)
          console.log(error)
        }
      }
    },
    async toFollow(name) {
      try {
        await this.$axios.$put(`/api/users/${name}/follow`)
        this.isFollow = true
      } catch (error) {
        if (error.response.status == '401') {
          this.$router.push('/auth/login')
        } else if (error.response.status == '404') {
          this.$router.push('/error/404')
        } else if (error.response.status == '500') {
          this.$router.push('/error/500')
        } else {
          alert(error)
          console.log(error)
        }
      }
    },
    async unFollow() {
      try {
        await this.$axios.$delete(`/api/users/${this.currentUser.name}/follow`)
        this.isFollow = false
      } catch (error) {
        if (error.response.status == '401') {
          this.$router.push('/auth/login')
        } else if (error.response.status == '404') {
          this.$router.push('/error/404')
        } else if (error.response.status == '500') {
          this.$router.push('/error/500')
        } else {
          alert(error)
          console.log(error)
        }
      }
    },
    async toUnFollow(name) {
      try {
        await this.$axios.$delete(`/api/users/${name}/follow`)
        this.isFollow = false
      } catch (error) {
        if (error.response.status == '401') {
          this.$router.push('/auth/login')
        } else if (error.response.status == '404') {
          this.$router.push('/error/404')
        } else if (error.response.status == '500') {
          this.$router.push('/error/500')
        } else {
          alert(error)
          console.log(error)
        }
      }
    },
    async getFollowings() {
      await this.$axios
        .$get(`/api/users/${this.currentUser.name}/followings`)
        .then((response) => {
          this.followings = response
        })
        .catch((err) => {
          console.log(err)
        })
    },
    async getFollowers() {
      await this.$axios
        .$get(`/api/users/${this.currentUser.name}/followers`)
        .then((response) => {
          this.followers = response
        })
        .catch((err) => {
          console.log(err)
        })
    },
  },
}
</script>
<style lang="scss" scoped>
.user {
  &-profile {
    @apply w-full flex flex-col justify-between py-4 px-6 relative;
    // height: 200px;
    img {
      @apply object-cover rounded-full z-10;
      margin-top: -70px;
      width: 190px;
      height: 190px;
      border: 5px solid var(--bg-secondary);
      // @media screen and (min-width: 1200px) and (max-width: 1440px) {
      //   margin-top: -100px;
      //   min-height: 160px;
      //   max-height: 160px;
      // }
    }
  }
  &-name {
    @apply flex flex-col items-start px-8;
  }
}
.item {
  // @apply flex justify-start;
  &-link {
    @apply py-2 px-3 text-center inline-block;
    &:hover {
      @apply rounded-lg;
      background: #f0f2f6;
    }
  }
}
.nickname {
  @apply font-bold text-5xl mb-2;
}
</style>
