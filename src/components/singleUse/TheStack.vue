<template>
    <section class="stack overflow-x-hidden px-2 px-sm-4 px-xl-5 d-flex flex-column justify-content-start align-items-center">
        <section-headline headline="SKILLS"></section-headline>
        <div class="skill-item-wrapper d-flex flex-wrap justify-content-between align-items-center">
            <skill-item text="Javascript"></skill-item>
            <skill-item text="Typescript"></skill-item>
            <skill-item text="Vue"></skill-item>
            <skill-item text="PHP"></skill-item>
            <skill-item text="CSS"></skill-item>
            <skill-item text="Bootstrap"></skill-item>
            <skill-item text="HTML"></skill-item>
            <skill-item text="Sass"></skill-item>
            <skill-item text="Python"></skill-item>
            <skill-item text="Git"></skill-item>
            <skill-item text="Django"></skill-item>
        </div>
    </section>
</template>

<script setup lang="ts">
import SkillItem from '../multiUse/SkillItem.vue';
</script>

<style scoped>
.stack {
    background-image: linear-gradient(to bottom, rgba(0,0,0,0), var(--prim-2));
}
.skill-item-wrapper {
    width: 100%;
}
@media screen and (min-width: 576px) {
    .skill-item-wrapper {
        width: 80%;
    }
}
</style>