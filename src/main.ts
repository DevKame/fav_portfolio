

//ASSETS
//--BOOTSTRAP:
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
//--STYLES
import "./assets/styles/colors.css";
import "./assets/styles/classes.css";
//--FONTS:
import "./assets/fonts/fonts.css";

//CUSTOM COMPONENTS:
import SectionHeadlines from "./components/multiUse/SectionHeadlines.vue";

import { createApp } from 'vue'
import App from './App.vue'

const app = createApp(App);
app.component("section-headline", SectionHeadlines);
app.mount('#app')
