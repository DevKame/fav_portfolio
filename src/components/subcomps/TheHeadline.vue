<template>
    <section class="headline-wrapper px-1 d-flex flex-column justify-content-center align-items-start">
        <h1 class="variable-headline mb-2 position-relative" ref="varHL">
            <div class="pointer position-absolute"></div>
        </h1>
        <h1 class="developer mt-2">DEVELOPER</h1>
    </section>
</template>

<script lang="ts" setup>
import { ref, onMounted } from 'vue';

let jsDONE = ref<boolean>(false);
let vueDONE = ref<boolean>(false);


const varHL = ref();
const WORD_JS = ref<string>("JAVASCRIPT");
const WORD_VUE = ref<string>("VUE.JS");
const WORD_WEB = ref<string>("WEB");
interface JS {
    [j: string]: boolean;
}

const wait = (ms: number) => new Promise(resolve => setTimeout(resolve, ms));

async function animateHL() {
    if(!jsDONE.value)
    {
        varHL.value.classList.add("javascript");
        for(let i = 0; i < WORD_JS.value.length ; i++)
        {
            await wait(100);
            varHL.value.innerText += WORD_JS.value[i];
        }
        for(let i = 0; i < WORD_JS.value.length ; i++)
        {
            await wait(100);
            varHL.value.innerText = WORD_JS.value.slice(0, WORD_JS.value.length - 1 - i);
        }
        jsDONE.value = true;
        varHL.value.classList.remove("javascript");

    }
    if(!vueDONE.value)
    {
        varHL.value.classList.add("vue");
        for(let i = 0; i < WORD_VUE.value.length ; i++)
        {
            await wait(150);
            varHL.value.innerText += WORD_VUE.value[i];
        }
        for(let i = 0; i < WORD_VUE.value.length ; i++)
        {
            await wait(150);
            varHL.value.innerText = WORD_VUE.value.slice(0, WORD_VUE.value.length - 1 - i);
        }
        jsDONE.value = true;
        varHL.value.classList.remove("vue");
    }
        varHL.value.classList.add("headline-gradient");
        for(let i = 0; i < WORD_WEB.value.length ; i++)
        {
            await wait(200);
            varHL.value.innerText += WORD_WEB.value[i];
        }
        varHL.value.classList.add("done");
}

onMounted(() => {
    console.log(varHL.value);
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
.variable-headline {
    height: 125px;
}
h1 {
    font-family: "Unbounded Black 900";
    filter: drop-shadow(0 0 4px black);
}
.headline-wrapper {
    height: 500px;
}
.headline-wrapper h1 {
    font-size: 100px;
    color: #c7c7c7;
}
@keyframes pointer-ani {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
    }
}

@media screen and (min-width: 1200px) {
    .headline-wrapper {
        margin-left: 150px;
    }
}
</style>