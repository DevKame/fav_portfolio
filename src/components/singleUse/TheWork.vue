<template>
    <section class="work px-4 px-xl-5">
        <section-headline headline="WORK"></section-headline>
        <div class="work-interface d-flex justify-content-start align-items-center border border-danger">

            <div class="work-switcher d-flex flex-column justify-content-start align-items-center border border-info">
                <div @click="moveTopLeft" class="switcher-arrow-wrapper lefttop-arrow-wrapper d-flex justify-content-start align-items-center border border-warning">

                </div>
                <div class="switcher-button-wrapper position-relative overflow-y-hidden">

                    <div class="switcher-actual-container position-absolute d-flex flex-column justify-content-around align-items-center" ref="btnWrapper">
                        <div class="work-btn-wrapper top d-flex justify-content-center align-items-center">
                            <transition name="work-buttons" mode="out-in">
                                <button v-if="workTopButton === 'port'" class="switcher-buttons rounded-circle portfolio-work"></button>
                                <button v-else-if="workTopButton === 'sport'" class="switcher-buttons rounded-circle sport-work"></button>
                                <button v-else-if="workTopButton === 'math'" class="switcher-buttons rounded-circle math-work"></button>
                                <button v-else-if="workTopButton === 'vocab'" class="switcher-buttons rounded-circle vocab-work"></button>
                            </transition>
                        </div>
                        <div class="work-btn-wrapper middle d-flex justify-content-center align-items-center">
                            <transition name="work-buttons" mode="out-in">
                                <button v-if="workTopButton === 'port'" class="switcher-buttons rounded-circle sport-work"></button>
                                <button v-else-if="workTopButton === 'sport'" class="switcher-buttons rounded-circle math-work"></button>
                                <button v-else-if="workTopButton === 'math'" class="switcher-buttons rounded-circle vocab-work"></button>
                                <button v-else-if="workTopButton === 'vocab'" class="switcher-buttons rounded-circle portfolio-work"></button>
                            </transition>
                        </div>
                        <div class="work-btn-wrapper bot d-flex justify-content-center align-items-center">
                            <transition name="work-buttons" mode="out-in">
                                <button v-if="workTopButton === 'port'" class="switcher-buttons rounded-circle math-work"></button>
                                <button v-else-if="workTopButton === 'sport'" class="switcher-buttons rounded-circle vocab-work"></button>
                                <button v-else-if="workTopButton === 'math'" class="switcher-buttons rounded-circle portfolio-work"></button>
                                <button v-else-if="workTopButton === 'vocab'" class="switcher-buttons rounded-circle sport-work"></button>
                            </transition>
                        </div>
                    </div>
                    <!-- <button class="switcher-buttons rounded-circle vocab-work"></button> -->
                </div>
                <div @click="moveTopLeft" class="switcher-arrow-wrapper rightbot-arrow-wrapper d-flex justify-content-start align-items-center border border-warning">
                    
                </div>
            </div>

            <div class="work-info mt-auto d-flex flex-column justify-content-start align-items-center border border-success">

            </div>

            <div class="work-menu d-flex flex-column justify-content-start align-items-center border border-warning"></div>
        </div>
    </section>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
let workTopButton = ref<string>("port");

function moveTopLeft(): void {
    switch(workTopButton.value) {
        case "port":
            workTopButton.value = "sport";
            break;
        case "sport":
            workTopButton.value = "math";
            break;
        case "math":
            workTopButton.value = "vocab";
            break;
        case "vocab":
            workTopButton.value = "port";
            break;
    }
}
</script>


<style scoped>
@media screen and (min-width: 576px) {
}
@media screen and (min-width: 992px) {
}
@media screen and (min-width: 1200px) {
}
@media screen and (min-width: 1400px) {
    .portfolio-work {
        background-image: radial-gradient(rgba(200,200,200, .3) 55%, rgba(200,200,200, 1)),
                          url("@/assets/img/work_backgrounds/buttons/portfolio_btn.png");
    }
    .sport-work {
        background-image: radial-gradient(rgba(200,200,200, .3) 55%, rgba(200,200,200, 1)),
                          url("@/assets/img/work_backgrounds/buttons/sport_btn.png");
    }
    .math-work {
        background-image: radial-gradient(rgba(200,200,200, .3) 55%, rgba(200,200,200, 1)),
                          url("@/assets/img/work_backgrounds/buttons/math_btn.png");
    }
    .vocab-work {
        background-image: radial-gradient(rgba(200,200,200, .3) 55%, rgba(200,200,200, 1)),
                          url("@/assets/img/work_backgrounds/buttons/vocab_btn.png");
    }
    .work-buttons-enter-from {
        transform: translate(0, calc(-100% + 20px));
    }
    .work-buttons-enter-active {
        transition: transform .3s ease;
    }
    .work-buttons-leave-active {
        transition: transform .3s ease;
    }
    .work-buttons-enter-to,
    .work-buttons-leave-from {
        transform: translate(0, 0);
    }
    .work-buttons-leave-to {
        transform: translate(0, calc(+100% + 20px));
    }
    .work-btn-wrapper button {
        width: 100%;
        height: 100%;
        border: none;
        background-color: transparent;
        box-shadow: 0 0 10px 3px rgba(200,200,200, .7);
        background-size: 100%;
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
        border: 1px solid red;
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
    .work-info {
        width: 60%;
        height: 30%;
    }
    .work-menu {
        width: 20%;
        height: 100%;
    }
    .work-interface {
        width: 100%;
        height: 100vh;
    }
}
</style>