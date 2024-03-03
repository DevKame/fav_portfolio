<template>
    <h1 class="section-headlines">{{ props.headline }}</h1>
</template>

<script lang="ts" setup>
import { defineProps } from 'vue';
const props = defineProps([
    "headline",
]);
</script>

<style scoped>
    h1.section-headlines {
        font-weight: bold;
        width: 100%;
        text-align: left;
        color: var(--prim-weak);
        pointer-events: none;
        font-family: "Unbounded Black 900";
    }
    h1.section-headlines::selection {
        all: unset;
    }


    @media screen and (min-width: 1400px) {
        h1.section-headlines {
            font-size: 250px;
            z-index: -1;
        }
    }
</style>