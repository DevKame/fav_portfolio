<template>
    <header class="d-flex justify-content-start align-items-center">
        <the-headline></the-headline>
        <the-logo></the-logo>
    </header>
</template>

<script lang="ts" setup>
import TheHeadline from '../subcomps/TheHeadline.vue';
import TheLogo from '../subcomps/TheLogo.vue';
</script>


<style scoped>
header {
  height: 100vh;
  background:
  linear-gradient(rgba(21, 33, 69, .9), rgba(21, 33, 69, .9)),
  url("@/assets/img/textures/triangle_texture.png");
}
</style>