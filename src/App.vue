<template>
  <the-bar></the-bar>
  <the-header></the-header>
  <the-about></the-about>
  <the-work></the-work>
  <the-stack></the-stack>
  <the-message></the-message>
  <section class="space"></section>
</template>

<script lang="ts" setup>
import TheHeader from "./components/singleUse/TheHeader.vue";
import TheBar from "./components/singleUse/TheBar.vue";
import TheAbout from "./components/singleUse/TheAbout.vue";
import TheWork from "./components/singleUse/TheWork.vue";
import TheStack from "./components/singleUse/TheStack.vue";
import TheMessage from "./components/singleUse/TheMessage.vue";

import { onMounted, ref, computed, provide } from "vue";

// REFERENCE TO THE <body> ELEMENT
const body: HTMLBodyElement = document.querySelector("body")!;
// REFERENCE TO THE CURRENT scrollY - VALUE
const sval = ref<number>(scrollY);
// COMPUTES THE SCROLLPROGRESS OF THE DOCUMENT IN PERCENT
const scrollProgress = computed(() => {
  const max = body.getBoundingClientRect().height - innerHeight;
  return (sval.value / max) * 100;
});
/** WAIT FUNCTION TO TIME COMPLEX ANIMATIONS
 *  @param {number} ms      => TIME BEFORE NEXT ANIMATION STEP STARTS
 *  @return {Promise}       => GETS RESOLVED AFTER SAID TIME. USED FOR ASYNC-USE */
const wait = (ms: number) => new Promise(resolve => setTimeout(resolve, ms));
//PROVIDING THE SCROLL PROGRESS FOR "FADING IN" OF OTHER COMPS
provide("progressvalue", scrollProgress);
//PROVIDING THE WAIT FUNCTION TO USE FOR COMPLEX ANIMATIONS
provide("wait", wait);
// SET A SCROLL LISTENER TO THE WINDOW ELEMENT
onMounted(() => {
  window.addEventListener("scroll", () => {
    sval.value = scrollY;
  });
});
</script>

<style>
section.space {
  height: 200vh;
}
/* section {
  width: 100%;
  height: 100vh;
  background:
  linear-gradient(rgba(21, 33, 69, .3), rgba(21, 33, 69, .3)),
  url("./assets/img/textures/rect_texture.png");
} */
</style>
