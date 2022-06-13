import { createApp } from 'vue';
import VueObserveVisibility from 'vue-observe-visibility';
import './common/bootstrap';
import components from './common/components';
import store from './store';

const app = createApp({
  components
})

app
.use(VueObserveVisibility)
.use(store)
.mount("#app")