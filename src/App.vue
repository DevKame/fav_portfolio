<template>
  <the-bar></the-bar>
  <the-header></the-header>
  <the-about></the-about>
  <section class="space"></section>
</template>

<script lang="ts" setup>
import TheHeader from "./components/singleUse/TheHeader.vue";
import TheBar from "./components/singleUse/TheBar.vue";
import TheAbout from "./components/singleUse/TheAbout.vue";

import { onMounted, ref, computed, provide } from "vue";
// import { ProgressKey } from "./types/keys";

// REFERENCE TO THE <body> ELEMENT
const body: HTMLBodyElement = document.querySelector("body")!;
// REFERENCE TO THE CURRENT scrollY - VALUE
const sval = ref<number>(scrollY);
// COMPUTES THE SCROLLPROGRESS OF THE DOCUMENT IN PERCENT
const scrollProgress = computed(() => {
  const max = body.getBoundingClientRect().height - innerHeight;
  return (sval.value / max) * 100;
});
//PROVIDING THE SCROLL PROGRESS FOR "FADING IN" OF OTHER COMPS
provide("progressvalue", scrollProgress);
// SET A SCROLL LISTENER TO THE WINDOW ELEMENT
onMounted(() => {
  window.addEventListener("scroll", e => {
    sval.value = scrollY;
  });
});
</script>

<style>
section.space {
  height: 400vh;
}
/* section {
  width: 100%;
  height: 100vh;
  background:
  linear-gradient(rgba(21, 33, 69, .3), rgba(21, 33, 69, .3)),
  url("./assets/img/textures/rect_texture.png");
} */
</style>
