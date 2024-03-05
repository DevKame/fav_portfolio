<template>
    <section class="work px-4 px-xl-5">
        <section-headline headline="WORK"></section-headline>
        <div class="work-interface d-flex justify-content-start align-items-center border border-danger">

            <div class="work-switcher d-flex flex-column justify-content-start align-items-center border border-info">
                <div @click="scrollLeftTop" class="switcher-arrow-wrapper lefttop-arrow-wrapper d-flex justify-content-start align-items-center border border-warning">

                </div>
                <div class="switcher-button-wrapper position-relative overflow-y-hidden">
                    <div class="switcher-actual-container position-absolute d-flex flex-column justify-content-around align-items-center" ref="btnWrapper">
                        <button class="switcher-buttons rounded-circle portfolio-work"></button>
                        <button class="switcher-buttons rounded-circle sport-work"></button>
                        <button class="switcher-buttons rounded-circle math-work"></button>
                        <button class="switcher-buttons rounded-circle vocab-work"></button>
                    </div>
                </div>
                <div class="switcher-arrow-wrapper rightbot-arrow-wrapper d-flex justify-content-start align-items-center border border-warning">
                    
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
const btnWrapper = ref<HTMLDivElement>();


function scrollLeftTop() {
    const lastButton = btnWrapper.value!.lastElementChild!;
    const wrappertop = btnWrapper.value!.clientTop;
    const wrapperbot = btnWrapper.value!.clientTop + btnWrapper.value!.clientHeight;

    const btntop = lastButton.clientTop;
    const btnbot = lastButton.clientTop + lastButton.clientHeight;
    
    console.log("btnztop:", btntop);
    console.log("btnzbot:", btnbot);

    console.log("wrappertop:", wrappertop);
    console.log("wrapperbot:", wrapperbot);
        console.log(getComputedStyle(btnWrapper.value!).top);
        let currentTop = +(getComputedStyle(btnWrapper.value!).top.replace("px", ""));
        let newTop = currentTop - 200;
        btnWrapper.value!.style.top = newTop + "px";
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
        background-size: 100%;
    }
    .sport-work {
        background-image: radial-gradient(rgba(200,200,200, .3) 55%, rgba(200,200,200, 1)),
                          url("@/assets/img/work_backgrounds/buttons/sport_btn.png");
        background-size: 100%;
    }
    .math-work {
        background-image: radial-gradient(rgba(200,200,200, .3) 55%, rgba(200,200,200, 1)),
                          url("@/assets/img/work_backgrounds/buttons/math_btn.png");
        background-size: 100%;
    }
    .vocab-work {
        background-image: radial-gradient(rgba(200,200,200, .3) 55%, rgba(200,200,200, 1)),
                          url("@/assets/img/work_backgrounds/buttons/vocab_btn.png");
        background-size: 100%;
    }
    .switcher-actual-container button {
        width: 250px;
        aspect-ratio: 1;
        margin: 30px 0;
        border: none;
        background-color: transparent;
        box-shadow: 0 0 10px 3px rgba(200,200,200, .7);
    }
    .switcher-actual-container {
        top: 0;
        left: 0;
        width: 100%;
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