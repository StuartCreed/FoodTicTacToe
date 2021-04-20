import { createApp } from 'vue';
import App from './components/App.vue'
require('./bootstrap');
require('alpinejs');

// Mount Vue Game App
createApp(App).mount("#app")
