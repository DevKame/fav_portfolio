
<script lang="ts" setup>
import { ref, onMounted, reactive, computed } from 'vue';
const workTopButton = ref("port");

const dir = ref("top");
const transition_ready = ref(true);


const headlines: Headlines = reactive({
    port: "MY_PORTFOLIO_WEBSITE",
    sport: "SPORTCLUB_CALENDAR",
    math: "MENTAL_MATH_TRAINER",
    vocab: "VOCAB_TRAINER",
});

interface Headlines {
    [key: string]: string;
}
const currHeadline = computed(() => {
    return headlines[workTopButton.value].split("");
});

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
onMounted(() => {
    console.log("workTopButton:", workTopButton.value);
})
function hideCharacters(el: HTMLElement): void {
    console.log(el);
}
function doStuff() {
    //
}
</script>
<template>
    <section class="work px-4 px-xl-5">
        <section-headline headline="WORK"></section-headline>
        <div class="work-interface d-flex justify-content-start align-items-center border border-danger position-relative">
            <transition name="img_bg" mode="out-in">
                <img v-if="workTopButton === 'port'" src="@/assets/img/work_backgrounds/widescreen/portfolio_wide.png" alt="" class="position-absolute work-interface-bg">
                <img v-else-if="workTopButton === 'sport'" src="@/assets/img/work_backgrounds/widescreen/calendar_wide.png" alt="" class="position-absolute work-interface-bg">
                <img v-else-if="workTopButton === 'math'" src="@/assets/img/work_backgrounds/widescreen/math_wide.png" alt="" class="position-absolute work-interface-bg">
                <img v-else-if="workTopButton === 'vocab'" src="@/assets/img/work_backgrounds/widescreen/vocabs_wide.png" alt="" class="position-absolute work-interface-bg">
            </transition>
            <div class="work-switcher d-flex flex-column justify-content-start align-items-center">
                <div @click="moveTopLeft('top')" class="switcher-arrow-wrapper lefttop-arrow-wrapper d-flex justify-content-start align-items-center border border-warning">

                </div>
                <div class="switcher-button-wrapper position-relative overflow-y-hidden">

                    <div class="switcher-actual-container position-absolute d-flex flex-column justify-content-around align-items-center" ref="btnWrapper">
                        <div class="work-btn-wrapper top d-flex justify-content-center align-items-center position-relative">
                            <transition :name="'work-buttons-to-' + dir" @before-enter="disableReady" @after-enter="enableReady">
                                <button v-if="workTopButton === 'port'" class="switcher-buttons rounded-circle portfolio-work"></button>
                                <button v-else-if="workTopButton === 'sport'" class="switcher-buttons rounded-circle sport-work"></button>
                                <button v-else-if="workTopButton === 'math'" class="switcher-buttons rounded-circle math-work"></button>
                                <button v-else-if="workTopButton === 'vocab'" class="switcher-buttons rounded-circle vocab-work"></button>
                            </transition>
                        </div>
                        <div class="work-btn-wrapper middle d-flex justify-content-center align-items-center position-relative">
                            <transition :name="'work-buttons-to-' + dir" @before-enter="disableReady">
                                <button v-if="workTopButton === 'port'" class="switcher-buttons rounded-circle sport-work"></button>
                                <button v-else-if="workTopButton === 'sport'" class="switcher-buttons rounded-circle math-work"></button>
                                <button v-else-if="workTopButton === 'math'" class="switcher-buttons rounded-circle vocab-work"></button>
                                <button v-else-if="workTopButton === 'vocab'" class="switcher-buttons rounded-circle portfolio-work"></button>
                            </transition>
                        </div>
                        <div class="work-btn-wrapper bot d-flex justify-content-center align-items-center position-relative">
                            <transition :name="'work-buttons-to-' + dir" @before-enter="disableReady">
                                <button v-if="workTopButton === 'port'" class="switcher-buttons rounded-circle math-work"></button>
                                <button v-else-if="workTopButton === 'sport'" class="switcher-buttons rounded-circle vocab-work"></button>
                                <button v-else-if="workTopButton === 'math'" class="switcher-buttons rounded-circle portfolio-work"></button>
                                <button v-else-if="workTopButton === 'vocab'" class="switcher-buttons rounded-circle sport-work"></button>
                            </transition>
                        </div>
                    </div>
                    <!-- <button class="switcher-buttons rounded-circle vocab-work"></button> -->
                </div>
                <div @click="moveTopLeft('bot')" class="switcher-arrow-wrapper rightbot-arrow-wrapper d-flex justify-content-start align-items-center border border-warning">
                    
                </div>
            </div>

            <div class="work-info mt-auto p-2 d-flex flex-column justify-content-start align-items-center border border-success">
                
                <div class="work-info-text-wrapper d-flex justify-content-start align-items-start">
                    <transition-group tag="h3" :css="false" mode="out-in" @before-leave="hideCharacters">
                        <div
                            :class="{hide_char: char === '_'}"
                            class="work-headline-span-wrapper d-inline-block"
                            v-for="(char, index) in currHeadline"
                            :key="`char-${index}`">
                            <span>
                                {{ char }}
                            </span>
                        </div>
                    </transition-group>

                </div>
            </div>

            <div class="work-menu d-flex flex-column justify-content-start align-items-center border border-warning"></div>
        </div>
    </section>
</template>


<style scoped>
@media screen and (min-width: 576px) {
}
@media screen and (min-width: 992px) {
}
@media screen and (min-width: 1200px) {
}
@media screen and (min-width: 1400px) {
    .hide_char {
        opacity: 0;
    }
    .work-headline-span-wrapper {
        transform: scale(1, 1) translate(0, 0);
        transition: all .25s ease;
    }
    .work-info-text-wrapper:hover .work-headline-span-wrapper {
        transform: scale(0, 1) translate(30px, 0);
        /* opacity: 0; */
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

    .work-buttons-to-top-enter-from {
        top: calc(100% + 40px);
    }
    .work-buttons-to-top-enter-active {
        transition: top .5s ease;
    }
    .work-buttons-to-top-enter-to {
        top: 0;
    }
    .work-buttons-to-top-leave-from {
        top: 0;
    }
    .work-buttons-to-top-leave-active {
        transition: top .5s ease;
    }
    .work-buttons-to-top-leave-to {
        top: calc(-100% - 40px);
    }
    
    .work-buttons-to-bot-enter-from {
        top: calc(-100% - 40px);
    }
    .work-buttons-to-bot-enter-active {
        transition: top .5s ease;
    }
    .work-buttons-to-bot-enter-to {
        top: 0;
    }
    .work-buttons-to-bot-leave-from {
        top: 0;
    }
    .work-buttons-to-bot-leave-active {
        transition: top .5s ease;
    }
    .work-buttons-to-bot-leave-to {
        top: calc(100% + 40px);
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
    .work-btn-wrapper.top::before {
        content: "";
        position: absolute;
        top: 0;
        left: -17px;
        width: 3px;
        height: 100%;
        background-color: var(--tert);
    }
    .work-btn-wrapper.top::after {
        content: "";
        position: absolute;
        top: 10px;
        left: -28px;
        width: 7px;
        height: calc(100% - 20px);
        background-color: var(--tert);
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
    .work-btn-wrapper {
        width: 200px;
        height: 200px;
        margin: 20px 0;
    }
    .switcher-actual-container {
        top: 0;
        left: 0;
        width: 100%;
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
    }
    .work-switcher {
        width: 20%;
        height: 100%;
    }
    .work-info h3 {
        width: 100%;
        font-family: "Unbounded Black 900";
        letter-spacing: 2px;
    }
    .work-info-text-wrapper {
        width: 100%;
        height: 100%;
    }
    .work-info {
        width: 60%;
        height: 30%;
        color: #c7c7c7;
    }
    .work-menu {
        width: 20%;
        height: 100%;
    }
    .work-interface {
        width: 100%;
        height: 100vh;
        background-image: linear-gradient(to right, rgba(21, 33, 69, .9) 40%, rgba(63, 70, 111, .9));
    }
}
</style>