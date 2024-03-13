

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
import TheQuote from "./components/multiUse/TheQuote.vue";


// FONT AWESOME
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";

import { faLocationDot, faBriefcase, faUser, faAt, faCaretUp, faCaretDown, faUpRightFromSquare, faCaretLeft, faCaretRight } from "@fortawesome/free-solid-svg-icons";
import { faGithub } from "@fortawesome/free-brands-svg-icons";


library.add(faUser,faLocationDot,faBriefcase, faGithub, faAt, faCaretUp, faCaretDown, faUpRightFromSquare, faGithub, faCaretLeft, faCaretRight);

import { createApp } from 'vue'
import App from './App.vue'

const app = createApp(App);
app.component("section-headline", SectionHeadlines);
app.component("the-quote", TheQuote);
app.component("fa-icon", FontAwesomeIcon);
app.mount('#app')
