import Vue from 'vue';

import BootstrapVue from 'bootstrap-vue';
import ModalBaseDialogs from 'vue-modal-dialogs';
import Pusher from 'pusher-js';
import VueAuth from '@websanova/vue-auth';

import store from './store';

// Import it before vue-router because it uses i18n strings
import './utils/i18n';
import './utils/axios';

import router from './router';

import App from './App.vue';

(<any>window).Pusher = Pusher;

Vue.config.productionTip = false;

Vue.use(BootstrapVue);
Vue.use(ModalBaseDialogs);

Vue.use(VueAuth, {
  auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
  http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
  router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
  rolesVar: 'type_id',
  parseUserData: (user) => user,
});

new Vue({
  store,
  router,
  el: '#app',
  render: (h) => h(App),
});
