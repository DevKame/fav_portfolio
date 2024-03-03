<template>
    <section class="about px-5 d-flex flex-wrap justify-content-around align-items-center" ref="aboutSection">
        <section-headline headline="ABOUT"></section-headline>
        <div class="text-box d-flex justify-content-end align-items-center position-relative">
            <div class="text-box-aside bg-tert position-absolute"></div>
            <div class="text-box-closer position-absolute"></div>
            <div class="text-box-content p-3 position-relative d-flex flex-column justify-content-start align-items-end">
                <p :class="{show: sectionVisible}">
                    <span v-for="(c, index) in about1" :key="index">{{ c }}</span>
                </p>
                <p :class="{show: sectionVisible}">
                    <span v-for="(c, index) in about2" :key="index">{{ c }}</span>
                </p>
                <p :class="{show: sectionVisible}">
                    <span v-for="(c, index) in about3" :key="index">{{ c }}</span>
                </p>
                <ul>
                    <li :class="{show: sectionVisible}">
                        <span v-for="(c, index) in li1" :key="index">{{ c }}</span>
                    </li>
                    <li :class="{show: sectionVisible}">
                        <span v-for="(c, index) in li2" :key="index">{{ c }}</span>
                    </li>
                    <li :class="{show: sectionVisible}">
                        <span v-for="(c, index) in li3" :key="index">{{ c }}</span>
                    </li>
                    <li :class="{show: sectionVisible}">
                        <span v-for="(c, index) in li4" :key="index">{{ c }}</span>
                    </li>
                </ul>
                <p :class="{show: sectionVisible}">
                    <span v-for="(c, index) in about5" :key="index">{{ c }}</span>
                </p>
            </div>
        </div>
    </section>
</template>

<script lang="ts" setup>
import { ref, onMounted, inject, watch } from 'vue';

const aboutSection = ref<HTMLElement>();
const sectionVisible = ref<boolean>(false);

const about1 = ref<string>("Its been 4 years when i started my journey as a webdeveloper");
const about2 = ref<string>("At that time i stumbled across a magazine that offered courses for personal training and development, from which i chose the developer course.");
const about3 = ref<string>("Over the following period of time i developed a big portfolio of skillsets, that made me quit my job and today webdevelopment has become my profession.");
const li1 = ref<string>("i build interfaces for staff and material management");
const li2 = ref<string>("i separate functionality depending on access rights");
const li3 = ref<string>("i build interfaces to analyse, cut, save and mark snippets from AI - generated audio data");
const li4 = ref<string>("i also edit functionality of existing backend");
const about5 = ref<string>("Feel free to checkout my skillset or send me a request. Cant wait to create your next website / blog / application");

onMounted(() => {
    console.log(aboutSection.value);
});
// INJECTED SCROLL PROGRESS OF THE DOCUMENT IN PERCENT
// let progress = inject(ProgressKey);
let progress = inject("progressvalue")!;

// CHANGE div.bar WITH WHEN SCROLLPROGRESS CHANGES
watch(progress, () => {
    const sectiontop = aboutSection.value!.getBoundingClientRect().top;
    console.clear();
    console.log("section.top:", sectiontop);
    if(sectiontop <= 0) sectionVisible.value = true;
});


</script>

<style scoped>
.text-box-content,
.text-box-closer {
    width: calc(100% - 3px);
    height: 100%;
    background: var(--prim)
                linear-gradient(to right, var(--prim), rgba(170,170,170,.1) 150%);
                border-radius: inherit;
    border-left: 2px solid black;
}
.text-box-closer {
    top: 0;
    right: 0;
    width: calc(100% - 3px);
    height: 100%;
}
.text-box-aside {
    top: 2px;
    left: 0;
    width: 10%;
    height: calc(100% - 4px);
    border-radius: inherit;
}
.text-box {
    width: 600px;
    height: 460px;
    font-family: "Ubuntu Med 500";
    color: #c7c7c7;
    border-radius: 10px;
    box-shadow: 0 0 0 3px black;
}
.text-box p,
.text-box li {
    width: 100%;
    transform: translateX(-45%) scaleX(0);
    transition: transform .4s ease-in;
}
.text-box p:first-child {
    transition-delay: .1s;

}
.text-box p:nth-child(2) {
    transition-delay: .2s;

}
.text-box p:nth-child(3) {
    transition-delay: .3s;

}
.text-box ul li:first-child {
    transition-delay: .4s;

}
.text-box ul li:nth-child(2) {
    transition-delay: .5s;
    
}
.text-box ul li:nth-child(3) {
    transition-delay: .6s;
    
}
.text-box ul li:last-child {
    transition-delay: .7s;
    
}
.text-box p,
.text-box ul li {
    width: 100%;
    transform: translateX(-45%) scaleX(0);
    transition: transform .4s ease-in;
}
.text-box p:nth-child(5) {
    transition-delay: .8s;

}
.text-box p.show,
.text-box li.show {
    transform: translateX(0) scaleX(1);
}

</style>