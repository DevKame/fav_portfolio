

//ASSETS
//--BOOTSTRAP:
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
//--STYLES
import "./assets/styles/colors.css";
import "./assets/styles/classes.css";
//--FONTS:
import "./assets/fonts/fonts.css";

import { createApp } from 'vue'
import App from './App.vue'

const app = createApp(App);

app.mount('#app')
