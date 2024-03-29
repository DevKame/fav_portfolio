<template>
    <section class="headline-wrapper px-1 d-flex flex-column justify-content-center align-items-start">
        <h1 class="variable-headline mb-xl-1 mb-xxl-2 position-relative" ref="varHL">
            <div class="pointer position-absolute"></div>
        </h1>
        <h1 class="developer mb-xl-1 mt-2">DEVELOPER</h1>
    </section>

    
</template>

<script lang="ts" setup>
import { ref, onMounted } from 'vue';

// REFERENCE TO THE CHANGING <h1> HEADLINE
const varHL = ref();
// ENSURES A WAITING BETWEEN EXPANDING/COLLAPSING OF HEADLINES
const wait = (ms: number) => new Promise(resolve => setTimeout(resolve, ms));
/** ANIMATES THE UPPER HEADLINE WORD BY WORD, USES THE PROVIDED STRING
 *  TO KNOW WHAT WORD TO DISPLAY, WHENEVER A NEW WORD GETS RENDERED, THE COLOR
 *  GRADIENT CHANGES FITTING TO ITS LOGOS COLORS
 * @param {string} word     => "JAVASCRIPT" | "VUE.JS" | "WEB */
async function wordAnimation(word: string) {
    let gradientClass = "";
    switch(word)
    {
        case "JAVASCRIPT":
            gradientClass = "javascript";
            break;
        case "VUE.JS":
            gradientClass = "vue";
            break;
        case "WEB":
            gradientClass = "headline-gradient";
            break;
    }
    varHL.value.classList.add(gradientClass);
    for(let i = 0; i < word.length ; i++)
    {
        await wait(100);
        varHL.value.innerText += word[i];
    }
    if(word !== "WEB")
    {
        for(let i = 0; i < word.length ; i++)
        {
            await wait(100);
            varHL.value.innerText = word.slice(0, word.length - 1 - i);
        }
        varHL.value.classList.remove(gradientClass);
    }
    else {
        varHL.value.classList.add("done");
    }
}
// INVOKES THE ANIMATING OF THE UPPER <h1> HEADLINE
async function animateHL() {
        await wordAnimation("JAVASCRIPT");
        await wordAnimation("VUE.JS");
        await wordAnimation("WEB");
}
// STARTS THE ANIMATION OF THE UPPER <h1> HEADLINE AS SOON AS COMPONENT´S DOM IS MOUNTED
onMounted(() => {
    animateHL();
})
</script>


<style scoped>
.developer {
 background-image: linear-gradient(to bottom, rgb(102, 100, 100), #c7c7c7);
 -webkit-background-clip: text;
 -webkit-text-fill-color: transparent;
}
.javascript {
 background-image: linear-gradient(to bottom,#323330 -20%, #F0DB4F 150%);
 -webkit-background-clip: text;
 -webkit-text-fill-color: transparent;
}
.vue {
 background-image: linear-gradient(to bottom,#34495E -20%, #41B883 150%);
 -webkit-background-clip: text;
 -webkit-text-fill-color: transparent;
}
.headline-gradient {
 background-image: linear-gradient(to bottom,#152145 -20%, var(--tert) 150%);
 -webkit-background-clip: text;
 -webkit-text-fill-color: transparent;
}
.variable-headline.done::before {
    display: none;
}
.variable-headline::before {
    content: "";
    position: absolute;
    top: 1%;
    right: -4px;
    width: 4px;
    height: 99%;
    background-color: var(--tert);
}
h1 {
    font-family: "Unbounded Black 900";
    filter: drop-shadow(0 0 4px black);
    pointer-events: none;
    line-height: 1;
}
h1::selection {
    all: unset;
}
@keyframes pointer-ani {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
    }
}

.headline-wrapper h1 {
    font-size: 10vmin;
}
.headline-wrapper {
    margin-top: 150px;
    width: 80%;
    height: 20vmin;
    margin-left: 20px;
}
.variable-headline {
    height: 150px;
}
@media screen and (min-width: 576px) {
    .headline-wrapper h1 {
        font-size: clamp(50px, 20vmin, 60px);
    }
    .headline-wrapper {
        margin-top: 100px;
        width: 80%;
        height: 200px;
        margin-left: 20px;
    }
    .variable-headline {
        height: clamp(50px, 20vmin, 60px);
    }
}
@media screen and (min-width: 768px) {
    .headline-wrapper h1 {
        font-size: 75px;
    }
    .headline-wrapper {
        margin-left: 50px;
    }
    .variable-headline {
        height: 75px;
    }
}
@media screen and (min-width: 992px) {
    .headline-wrapper {
        margin-top: 0;
        width: 600px;
        height: 500px;
        margin-left: 50px;
    }
}
@media screen and (min-width: 1200px) {
    .headline-wrapper h1 {
        font-size: 100px;
    }
    .headline-wrapper {
        width: 800px;
        height: 500px;
        margin-left: 75px;
    }
    .variable-headline {
        height: 100px;
    }
}
@media screen and (min-width: 1400px) {
    .headline-wrapper h1 {
        font-size: 100px;
    }
    .headline-wrapper {
        margin-left: 150px;
    }
    .variable-headline {
        height: 125px;
    }
}
</style>