import { createApp } from 'vue';
import './common/bootstrap';
import components from './common/components';
import store from './store';

const app = createApp({
  components
})

app.use(store).mount("#app")