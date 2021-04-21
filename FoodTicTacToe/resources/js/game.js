import { createApp } from 'vue';
import Game from './components/game/Game.vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

// Mount Vue Game App
const game = createApp(Game)
game.use(VueSweetalert2);
game.mount("#game")
