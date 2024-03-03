<template>
    <section class="about px-5 d-flex flex-wrap justify-content-around align-items-center" ref="aboutSection">
        <section-headline headline="ABOUT"></section-headline>
        <div class="text-box d-flex justify-content-end align-items-center position-relative">
            <div class="text-box-aside bg-tert position-absolute"></div>
            <div class="text-box-closer position-absolute"></div>
            <div class="text-box-content p-3 position-relative d-flex flex-column justify-content-center align-items-start">
                <p>Its been 4 years when i started my journey as a <span class="accent-text">webdeveloper</span></p>
                <p>At that time i stumbled across a magazine that offered courses for personal training and development, from which i chose the developer course.</p>
                <p>Over the following period of time i developed a <span class="accent-text">big portfolio of skillsets</span>, that made me quit my job and today webdevelopment has become my profession.</p>
                <p>
                    <ul>
                        <li>i build interfaces for staff and material management</li>
                        <li>i separate functionality depending on access rights</li>
                        <li>i build interfaces to analyse, cut, save and mark snippets from AI - generated audio data</li>
                        <li>i also edit functionality of existing backend</li>
                    </ul>
                </p>
                <p>Feel free to checkout my skillset or send me a request. Cant wait to create your next website / blog / application</p>
            </div>
        </div>
    </section>
</template>

<script lang="ts" setup>
import { ref, onMounted, inject, watch } from 'vue';

const aboutSection = ref<HTMLElement>();
const sectionVisible = ref<boolean>(false);

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
});


</script>

<style scoped>
.text-box-content,
.text-box-closer {
    width: calc(100% - 3px);
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
    text-align: left;
}

</style>