<template>
    <aside>
        <div class="bar bg-tert" ref="bar"></div>
    </aside>
</template>

<script lang="ts" setup>
import {inject, watch, ref} from "vue";
// import { ProgressKey } from "@/types/keys";

// REFERENCE TO THE <div> ELEMENT DISPLAYING THE CURRRENT SCROLLPROGRESS IN %
const bar = ref<HTMLDivElement>();
// INJECTED SCROLL PROGRESS OF THE DOCUMENT IN PERCENT
// let progress = inject(ProgressKey);
let progress = inject("progressvalue")!;

// CHANGE div.bar WITH WHEN SCROLLPROGRESS CHANGES
watch(progress, val => {
    let percent = val;
    if(percent > 100) percent = 100;
    // console.log("percent:", percent);
    bar.value!.style.width = percent + "%";
});
</script>

<style scoped>
aside {
    z-index: 2;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
}
.bar {
    width: 0;
    height: 100%;
}
</style>