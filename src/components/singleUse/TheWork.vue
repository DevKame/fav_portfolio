
<script lang="ts" setup>
import { ref, computed } from 'vue';
const workTopButton = ref("port");

const dir = ref("top");
const transition_ready = ref(true);


function disableReady(): void {
    transition_ready.value = false;
}
function enableReady(): void {
    transition_ready.value = true;
}
function moveTopLeft(direction: string): void {
    if(transition_ready.value)
    {
        dir.value = direction;
        switch(workTopButton.value) {
            case "port":
                workTopButton.value =
                direction === "top" ?
                "sport" : "vocab";
                break;
            case "sport":
                workTopButton.value =
                direction === "top" ?
                "math" : "port";
                break;
            case "math":
                workTopButton.value =
                direction === "top" ?
                "vocab" : "sport";
                break;
            case "vocab":
                workTopButton.value =
                direction === "top" ?
                "port" : "math";
                break;
        }
    }
}
const sitelink = computed(() => {
    let link: string;
    switch(workTopButton.value)
    {
        case "port":
            link = "https://www.kamed.in";
            break;
        case "sport":
            link = "https://sport-cal.kamed.in";
            break;
        case "math":
            link = "https://mmath.kamed.in";
            break;
        case "vocab":
            link = "https://vocabs.kamed.in";
            break;
    }
    return link!;
});
const githublink = computed(() => {
    let link: string;
    switch(workTopButton.value)
    {
        case "port":
            link = "https://github.com/DevKame/fav_portfolio";
            break;
        case "sport":
            link = "https://github.com/DevKame/sport_calendar";
            break;
        case "math":
            link = "https://github.com/DevKame/mmath";
            break;
        case "vocab":
            link = "https://github.com/DevKame/vocabs";
            break;
    }
    return link!;
});
const smallwindow = computed(() => {
    return window.innerWidth < 992;
})
</script>
<template>
    <section class="work px-4 px-xl-5">
        <section-headline headline="WORK"></section-headline>
        <div class="work-interface d-flex flex-column flex-lg-row justify-content-start align-items-center position-relative">
            <transition name="img_bg" mode="out-in">
                <img v-if="workTopButton === 'port'" alt="" class="position-absolute work-interface-bg port-bg">
                <img v-else-if="workTopButton === 'sport'" alt="" class="position-absolute work-interface-bg sport-bg">
                <img v-else-if="workTopButton === 'math'" alt="" class="position-absolute work-interface-bg math-bg">
                <img v-else-if="workTopButton === 'vocab'" alt="" class="position-absolute work-interface-bg vocab-bg">
            </transition>
            <div class="work-switcher border border-warning d-flex flex-row flex-lg-column justify-content-start align-items-center">

                <div @click="moveTopLeft('top')" class="switcher-arrow-wrapper lefttop-arrow-wrapper d-flex justify-content-center align-items-center">
                    <fa-icon v-if="smallwindow" icon="fa-solid fa-caret-left"></fa-icon>
                    <fa-icon v-else icon="fa-solid fa-caret-up"></fa-icon>
                </div>

                <div class="switcher-button-wrapper position-relative overflow-hidden">

                    <div class="switcher-actual-container position-absolute d-flex flex-row flex-lg-column justify-content-center align-items-center" ref="btnWrapper">
                        <div class="work-btn-wrapper top d-flex justify-content-center align-items-center position-relative">
                            <transition :name="'work-buttons-to-' + dir" @before-enter="disableReady" @after-enter="enableReady">
                                <div v-if="workTopButton === 'port'" class="switcher-buttons rounded-circle portfolio-work"></div>
                                <div v-else-if="workTopButton === 'sport'" class="switcher-buttons rounded-circle sport-work"></div>
                                <div v-else-if="workTopButton === 'math'" class="switcher-buttons rounded-circle math-work"></div>
                                <div v-else-if="workTopButton === 'vocab'" class="switcher-buttons rounded-circle vocab-work"></div>
                            </transition>
                        </div>
                        <div class="work-btn-wrapper middle d-flex justify-content-center align-items-center position-relative">
                            <transition :name="'work-buttons-to-' + dir" @before-enter="disableReady">
                                <div v-if="workTopButton === 'port'" class="switcher-buttons rounded-circle sport-work"></div>
                                <div v-else-if="workTopButton === 'sport'" class="switcher-buttons rounded-circle math-work"></div>
                                <div v-else-if="workTopButton === 'math'" class="switcher-buttons rounded-circle vocab-work"></div>
                                <div v-else-if="workTopButton === 'vocab'" class="switcher-buttons rounded-circle portfolio-work"></div>
                            </transition>
                        </div>
                        <div class="work-btn-wrapper bot d-flex justify-content-center align-items-center position-relative">
                            <transition :name="'work-buttons-to-' + dir" @before-enter="disableReady">
                                <div v-if="workTopButton === 'port'" class="switcher-buttons rounded-circle math-work"></div>
                                <div v-else-if="workTopButton === 'sport'" class="switcher-buttons rounded-circle vocab-work"></div>
                                <div v-else-if="workTopButton === 'math'" class="switcher-buttons rounded-circle portfolio-work"></div>
                                <div v-else-if="workTopButton === 'vocab'" class="switcher-buttons rounded-circle sport-work"></div>
                            </transition>
                        </div>
                    </div>
                </div>

                <div @click="moveTopLeft('bot')" class="switcher-arrow-wrapper rightbot-arrow-wrapper d-flex justify-content-center align-items-center">
                    <fa-icon icon="fa-solid fa-caret-down"></fa-icon>
                </div>
            </div>

            <div class="work-info border border-info mt-auto p-2 d-flex flex-column justify-content-start align-items-center">
                
                <div class="work-info-text-wrapper d-flex justify-content-center align-items-start">
                    <transition name="work-headlines" mode="out-in">
                        <div v-if="workTopButton === 'port'" class="info-holder d-flex flex-column justify-content-start align-items-start">
                            <h3>MY PORTFOLIO</h3>
                            <p>Learn about my current work and what applications i already build. Feel free to use every functionality they offer!</p>
                        </div>
                        <div v-else-if="workTopButton === 'sport'" class="info-holder d-flex flex-column justify-content-start align-items-start">
                            <h3>CALENDAR</h3>
                            <p>This web applciations is more than just an interactive calendar. With the role of an admin or trainer, you are able to oversee all existing students, trainers and events.</p>
                            <p>Create, edit or delete them. On top of that you can set groups to particular training appointments to make sure that only students of this group can participate in it.</p>
                            <p>To make your life a little easier, you can create pre-defined trainings to save a lot of typing when creating new events.</p>
                        </div>
                        <div v-else-if="workTopButton === 'math'" class="info-holder d-flex flex-column justify-content-start align-items-start">
                            <h3>MENTAL MATH</h3>
                            <p>Train your grey cells with this simple, but challenging mini game. You will encounter a quick sequence of digits that you have to remember and sum up.</p>
                            <p>When the last digit was shown you can enter what you think the answer is.</p>
                            <p>To easy? Customize the amount of time each digit is displayed, the total amount of digits and their biggest possible value.</p>
                        </div>
                        <div v-else-if="workTopButton === 'vocab'" class="info-holder d-flex flex-column justify-content-start align-items-start">
                            <h3>VOCAB TRAINER</h3>
                            <p>This (yet) not refactored application is a digital vocabulary box for your mobile phone (or desktop PC).</p>
                            <p>Create, edit and learn vocabulary cards without dragging a big and bulky box with hundreds of cards in it. Structure them within topics. Mark particular difficult vocabs.</p>
                            <p>After every learning session, the application sets a level for you and every card, so you can see instantly which vocabs you need to practise more.</p>
                            <p>And all of that with the power of plain Javascript!</p>
                        </div>
                    </transition>

                </div>
            </div>

            <div class="work-menu border border-warning d-flex flex-row flex-lg-column justify-content-end align-items-center">
                <a :href="sitelink" target="_blank" class="work-links overflow-hidden py-2 px-4 position-relative rounded-3 d-flex justify-content-center align-items-center mx-2 mx-lg-0 my-lg-3">
                    <fa-icon icon="fa-solid fa-up-right-from-square" class="me-2"></fa-icon>
                    Visit Site
                    <div class="link-shadow position-absolute"></div>
                </a>
                <a :href="githublink" target="_blank" class="work-links overflow-hidden py-2 px-4 position-relative rounded-3 d-flex justify-content-center align-items-center mx-2 mx-lg-0 my-lg-3">
                    <fa-icon icon="fa-brands fa-github" class="me-2"></fa-icon>
                    Visit GitHub
                    <div class="link-shadow position-absolute rounded-3"></div>
                </a>
            </div>
        </div>
    </section>
</template>


<style scoped>
.link-shadow {
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    box-shadow: 0 0 10px 5px black inset;
    z-index: 0;
    opacity: 0;
    transition: opacity .3s ease-in;
}
.work-links:hover::after {
    width: 50%;
}
.work-links:hover::before {
    width: 50%;
}
.work-links::before,
.work-links::after {
    content: "";
    position: absolute;
    transition: all .3s ease-in;
    width: 0;
    height: 100%;
    background-color: var(--tert);
    z-index: -1;
}
.work-links::after {
    top: 0;
    right: 0;
}
.work-links::before {
    top: 0;
    left: 0;
}
.work-links:hover .link-shadow {
    opacity: 1;
}
.work-links:hover {
    color: black;
}
.work-links {
    border: 2px solid var(--tert);
    width: 150px;
    height: 60px;
    font-size: 14px;
    text-underline-offset: 5px;
    color: var(--tert);
    transition: all .3s ease-in;
    z-index: 1;
}
.work-headlines-leave-to,
.work-headlines-enter-from {
    opacity: 0;
    transform: scale(.9);
}
.work-headlines-leave-active,
.work-headlines-enter-active {
    transition: all .25s ease;
}
.work-headlines-leave-from,
.work-headlines-enter-to {
    opacity: 1;
    transform: scale(1);
}
.info-holder p {
    font-family: "Ubuntu Med 500";
}
.info-holder {
    width: 100%;
    height: 100%;
}
.hide_char {
    opacity: 0;
}
.work-interface-bg {
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: -1;
}
.portfolio-work {
    background-image: radial-gradient(rgba(63, 70, 111, .6) 55%, rgba(151, 156, 202, 1)),
                        url("@/assets/img/work_backgrounds/buttons/portfolio_btn.png");
    color: rgb(151, 156, 202);
}
.sport-work {
    background-image: radial-gradient(rgba(63, 70, 111, .6) 55%, rgba(151, 156, 202, 1)),
                        url("@/assets/img/work_backgrounds/buttons/sport_btn.png");
}
.math-work {
    background-image: radial-gradient(rgba(63, 70, 111, .6) 55%, rgba(151, 156, 202, 1)),
                        url("@/assets/img/work_backgrounds/buttons/math_btn.png");
}
.vocab-work {
    background-image: radial-gradient(rgba(63, 70, 111, .6) 55%, rgba(151, 156, 202, 1)),
                        url("@/assets/img/work_backgrounds/buttons/vocab_btn.png");
}
.switcher-buttons {
    position: absolute;
    width: 100%;
    height: 100%;
    border: none;
    background-color: transparent;
    box-shadow: 0 0 10px 5px rgba(151, 156, 202, .7);
    background-size: 100%;
}
.switcher-actual-container {
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.work-info-text-wrapper {
    width: 100%;
    height: 100%;
}
.work-info h3 {
    width: 100%;
    font-family: "Unbounded Black 900";
    letter-spacing: 2px;
    background-image: linear-gradient(to bottom,#333333, var(--tert));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.work-interface {
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(to right, rgba(21, 33, 69, .9) 40%, rgba(63, 70, 111, .9));
}
.work-switcher {
    width: 100%;
    height: 20%;
}
.work-info {
    width: 100%;
    height: 40%;
    color: #c7c7c7;
    font-size: 16px;
}
.work-menu {
    width: 100%;
    height: 10%;
}
.switcher-button-wrapper {
    width: 80%;
    height: 100%;
}
.switcher-arrow-wrapper {
    width: 10%;
    height: 100%;
    cursor: pointer;
    color: var(--tert);
    font-size: 30px;
}
.work-btn-wrapper {
    width: 50px;
    height: 50px;
    margin: 0 10px;
}
.port-bg {
    background-image: url("../../assets/img/work_backgrounds/medscreen/portfolio_med.png");
    background-size: 250% 100%;
}
.sport-bg {
    background-image: url("../../assets/img/work_backgrounds/medscreen/calendar_med.png");
    background-size: 250% 100%;
}
.math-bg {
    background-image: url("../../assets/img/work_backgrounds/medscreen/math_med.png");
    background-size: 250% 100%;
}
.vocab-bg {
    background-image: url("../../assets/img/work_backgrounds/medscreen/vocabs_med.png");
    background-size: 250% 100%;
}
.work-buttons-to-top-enter-from {
    left: calc(100% + 20px);
    opacity: 0;
}
.work-buttons-to-top-enter-active,
.work-buttons-to-top-leave-active,
.work-buttons-to-bot-enter-active,
.work-buttons-to-bot-leave-active
    {
    transition: all .5s ease;
}
.work-buttons-to-top-enter-to {
    left: 0;
    opacity: 1;
}
.work-buttons-to-top-leave-from {
    left: 0;
    opacity: 1;
}
.work-buttons-to-top-leave-to {
    left: calc(-100% - 20px);
    opacity: 0;
}

.work-buttons-to-bot-enter-from {
    left: calc(-100% - 20px);
}
.work-buttons-to-bot-enter-to,
.work-buttons-to-bot-leave-from {
    left: 0;
}
.work-buttons-to-bot-leave-to {
    left: calc(100% + 20px);
}
.img_bg-enter-from,
.img_bg-leave-to {
    opacity: .2;
    transform: scale(.9);
}
.img_bg-enter-active,
.img_bg-leave-active {
    transition: opacity .25s ease,
                transform .25s ease;
}
.img_bg-enter-to,
.img_bg-leave-from {
    opacity: 1;
    transform: scale(1);
}
@media screen and (min-width: 410px) {
    .work-btn-wrapper {
        width: 70px;
        height: 70px;
    }
    .port-bg {
        background-size: 150% 100%;
    }
    .sport-bg {
        background-size: 150% 100%;
    }
    .math-bg {
        background-size: 150% 100%;
    }
    .vocab-bg {
        background-size: 150% 100%;
    }
}
@media screen and (min-width: 576px) {
    .work-btn-wrapper {
        width: 100px;
        height: 100px;
        margin: 0 20px;
    }
    .work-buttons-to-top-enter-from {
        left: calc(100% + 40px);
        opacity: 0;
    }
    .work-buttons-to-top-leave-to {
        left: calc(-100% - 40px);
        opacity: 0;
    }
    .work-buttons-to-bot-enter-from {
        left: calc(-100% - 40px);
    }
    .work-buttons-to-bot-leave-to {
        left: calc(100% + 40px);
    }
    .work-links {
        height: auto;
    }
}
@media screen and (min-width: 768px) {
    .switcher-arrow-wrapper {
        font-size: 50px;
    }
    .work-btn-wrapper {
        width: 130px;
        height: 130px;
    }
    .port-bg {
        background-size: 100% 100%;
    }
    .sport-bg {
        background-size: 100% 100%;
    }
    .math-bg {
        background-size: 100% 100%;
    }
    .vocab-bg {
        background-size: 100% 100%;
    }
}
@media screen and (min-width: 992px) {
    .work-switcher {
        width: 20%;
        height: 100%;
    }
    .work-info {
        width: 60%;
        height: 40%;
        color: #c7c7c7;
    }
    .work-menu {
        width: 20%;
        height: 100%;
    }
    .switcher-button-wrapper {
        width: 100%;
        height: 80%;
    }
    .switcher-arrow-wrapper {
        width: 100%;
        height: 10%;
        cursor: pointer;
        color: var(--tert);
        font-size: 75px;
    }
    .work-btn-wrapper {
        width: 150px;
        height: 150px;
        margin: 20px 0;
    }
    .work-buttons-to-top-enter-from {
        left: 0;
        top: calc(100% + 40px);
        opacity: 0;
    }
    .work-buttons-to-top-enter-active,
    .work-buttons-to-top-leave-active,
    .work-buttons-to-bot-enter-active,
    .work-buttons-to-bot-leave-active
     {
        transition: all .5s ease;
    }
    .work-buttons-to-top-enter-to {
        left: 0;
        top: 0;
        opacity: 1;
    }
    .work-buttons-to-top-leave-from {
        left: 0;
        top: 0;
        opacity: 1;
    }
    .work-buttons-to-top-leave-to {
        left: 0;
        top: calc(-100% - 40px);
        opacity: 0;
    }
    
    .work-buttons-to-bot-enter-from {
        left: 0;
        top: calc(-100% - 40px);
    }
    .work-buttons-to-bot-enter-to,
    .work-buttons-to-bot-leave-from {
        left: 0;
        top: 0;
    }
    .work-buttons-to-bot-leave-to {
        left: 0;
        top: calc(100% + 40px);
    }
}
@media screen and (min-width: 1200px) {
    .work-links {
        font-size: 16px;
        width: 200px;
    }
    .port-bg {
        background-image: url("../../assets/img/work_backgrounds/widescreen/portfolio_wide.png");
        background-size: 150% 100%;
    }
    .sport-bg {
        background-image: url("../../assets/img/work_backgrounds/widescreen/calendar_wide.png");
        background-size: 150% 100%;
    }
    .math-bg {
        background-image: url("../../assets/img/work_backgrounds/widescreen/math_wide.png");
        background-size: 150% 100%;
    }
    .vocab-bg {
        background-image: url("../../assets/img/work_backgrounds/widescreen/vocabs_wide.png");
        background-size: 150% 100%;
    }
    .work-btn-wrapper {
        width: 150px;
        height: 150px;
        margin: 20px 0;
    }
    .work-btn-wrapper.top::before {
        content: "";
        position: absolute;
        top: 0;
        left: -17px;
        width: 1px;
        height: 100%;
        background-color: var(--tert);
    }
    .work-btn-wrapper.top::after {
        content: "";
        position: absolute;
        top: 10px;
        left: -24px;
        width: 2px;
        height: calc(100% - 20px);
        background-color: var(--tert);
    }
}
@media screen and (min-width: 1400px) {
    .port-bg {
        background-size: 100% 100%;
    }
    .sport-bg {
        background-size: 100% 100%;
    }
    .math-bg {
        background-size: 100% 100%;
    }
    .vocab-bg {
        background-size: 100% 100%;
    }
    .work-links {
        width: 200px;
    }
    .work-headline-span-wrapper {
        transform: scale(1, 1) translate(0, 0);
        transition: all .25s ease;
    }
    .work-info-text-wrapper:hover .work-headline-span-wrapper {
        transform: scale(0, 1) translate(-50px, 0);
    }

    .work-btn-wrapper.top {
        z-index: 5;
    }
    .work-btn-wrapper.middle {
        z-index: 4;
    }
    .work-btn-wrapper.bot {
        z-index: 3;
    }
}
</style>