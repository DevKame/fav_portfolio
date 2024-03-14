

<script lang="ts" setup>

import { ref, inject, watch, reactive } from 'vue';

import MyKeywords from '../subcomps/about/MyKeywords.vue';

const aboutSection = ref<HTMLElement>();
const sectionVisible = ref<boolean>(false);


const quote = reactive({
    quote: '"You can either be too strong to fail or too weak to try."',
    person: "Yen"
});

const about1 = ref<string>("Its been 4 years when i started my journey as a webdeveloper");
const about2 = ref<string>("At that time i stumbled across a magazine that offered courses for personal training and development, from which i chose the developer course.");
const about3 = ref<string>("Over the following period of time i developed a big portfolio of skillsets, that made me quit my job and today webdevelopment has become my profession.");
const li1 = ref<string>("i build interfaces for staff and material management");
const li2 = ref<string>("i separate functionality depending on access rights");
const li3 = ref<string>("i build interfaces to analyse, cut, save and mark snippets from AI - generated audio data");
const li4 = ref<string>("i also edit functionality of existing backend");
const about5 = ref<string>("Feel free to checkout my skillset or send me a request. Cant wait to create your next website / blog / application");

const aboutTextbox = ref<HTMLDivElement>();

// INJECTED SCROLL PROGRESS OF THE DOCUMENT IN PERCENT
// let progress = inject(ProgressKey);
let progress = inject("progressvalue")!;

// CHANGE div.bar WITH WHEN SCROLLPROGRESS CHANGES
watch(progress, () => {
    const sectiondata = aboutSection.value!.getBoundingClientRect();
    const sectionheight = sectiondata.height;
    const sectionthreshold = sectionheight * .15;
    const sectiontop = sectiondata.top;
    if(sectiontop <= sectionthreshold && !sectionVisible.value)
    {
        openTextbox();
    }
    // if(sectiontop <= 0) sectionVisible.value = true;
});

const wait = inject<(ms: number) => Promise<any>>("wait")!;

async function openTextbox() {
    await wait(50);
    aboutTextbox.value!.classList.add("first-open");
    await wait(300);
    aboutTextbox.value!.classList.add("second-open");
    await wait(100);
    aboutTextbox.value!.classList.add("last-open");
    await wait(300);
    sectionVisible.value = true;
}


</script>
<template>
    <section class="about px-4 px-xl-5 d-flex flex-wrap justify-content-around align-items-center" ref="aboutSection">
        <section-headline headline="ABOUT"></section-headline>
        <the-quote :quote="quote"></the-quote>
        <div class="flex-half px-2 px-sm-0 d-flex flex-column justify-content-start align-items-center">
            <div class="text-box d-flex justify-content-end align-items-center position-relative" ref="aboutTextbox">
                <div class="text-box-aside bg-tert position-absolute"></div>
                <div class="text-box-closer position-absolute"></div>
                <div class="text-box-content p-3 position-relative d-flex flex-column justify-content-around align-items-end">
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
        </div>
        <div class="flex-half d-flex flex-column justify-content-start align-items-center align-items-xl-end align-items-xxl-center">
            <div class="image-info-wrapper d-flex flex-column justify-content-start align-items-center">
                <div class="image-wrapper rounded-circle d-flex justify-content-center align-items-center">
                    <div class="image rounded-circle"></div>
                </div>
                <div class="keyword-wrapper overflow-hidden w-100 d-flex flex-column justify-content-start align-items-center">
                    <my-keywords :make-visible="sectionVisible" :delay="400" icon="fa-solid fa-user" text='Eldin Trumic'></my-keywords>
                    <my-keywords :make-visible="sectionVisible" :delay="500" icon="fa-solid fa-location-dot" text='Germany'></my-keywords>
                    <my-keywords :make-visible="sectionVisible" :delay="600" icon="fa-solid fa-briefcase" text='Frontend - Dev'></my-keywords>
                    <my-keywords :make-visible="sectionVisible" :delay="700" icon="fa-brands fa-github" text='GitHub' :is-link="true" link-to="https://github.com/DevKame"></my-keywords>
                    <my-keywords :make-visible="sectionVisible" :delay="800" icon="fa-solid fa-at" text='website@kamed.in' :is-link="true" link-to="mailto:website@kamed.in"></my-keywords>
                </div>
            </div>


        </div>
    </section>
</template>

<style scoped>
.image {
    width: 95%;
    aspect-ratio: 1;
    background-image: url("@/assets/img/me/profile_pic.png");
    background-position: center;
    border: 4px solid black;
}
.image-wrapper {
    width: 100%;
    aspect-ratio: 1;
    background-image: radial-gradient(black, var(--tert));
    border: 3px solid #c7c7c7;
}
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
.text-box.last-open {
    box-shadow: 0 0 0 3px black,
                0 0 0 6px #c7c7c7,
                25px 25px 5px 15px #3F466F;
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
    transition: transform .6s ease-in;
}
.text-box p:nth-child(5) {
    transition-delay: .8s;

}
.text-box p.show,
.text-box li.show {
    transform: translateX(0) scaleX(1);
}
.flex-half {
    /* border: 1px solid blue; */
    width: 100%;
    min-height: 670px;
}
.text-box {
    font-family: "Ubuntu Med 500";
    color: #c7c7c7;
    border-radius: 10px;
    box-shadow: 0 0 0 3px black,
                0 0 0 6px #c7c7c7;
    overflow: hidden;
    width: 20px;
    height: 2px;
    transform: translate(-50%, 580px);
    transition: all .3s ease;
        margin-top: 50px;
}
.text-box.first-open {
    width: 20px;
    height: auto;
    transform: translate(-50%, 0);
}
.text-box.second-open {
    width: 100%;
    height: auto;
    transform: translate(0, 0);
}
.text-box.last-open {
    box-shadow: 0 0 0 3px black,
                0 0 0 6px #c7c7c7;
}
.image-info-wrapper {
    width: 300px;
    margin-top: 100px;
}

@media screen and (min-width: 576px) {
    .flex-half {
        width: 100%;
        min-height: 670px;
    }
    .text-box {
        transform: translate(-215px, 300px);
        margin-top: 50px;
    }
    .text-box.first-open {
        width: 20px;
        height: 460px;
        transform: translate(-215px, 0);
    }
    .text-box.second-open {
        width: 432px;
        height: 600px;
        transform: translate(0, 0);
    }
    .image-info-wrapper {
        width: 400px;
        margin-top: 100px;
    }
}
@media screen and (min-width: 992px) {
    .text-box.first-open {
        width: 20px;
        height: 460px;
        transform: translate(-300px, 0);
    }
    .text-box.last-open {
        box-shadow: 0 0 0 3px black,
                    0 0 0 6px #c7c7c7,
                    55px 55px 5px 15px #3F466F;
    }
    .text-box {
        transform: translate(-300px, 230px);
        margin-top: 100px;
    }
    .text-box.second-open {
        width: 600px;
        height: 460px;
        transform: translate(0, 0);
    }
}
@media screen and (min-width: 1200px) {
    .image-info-wrapper {
        width: 300px;
        margin-top: 200px;
    }
    .image {
        background-size: 120%;
    }
    .flex-half {
        width: 50%;
    }
}
@media screen and (min-width: 1400px) {
    .image-info-wrapper {
        width: 400px;
    }
    .flex-half {
        min-height: 850px;
    }
}
</style>