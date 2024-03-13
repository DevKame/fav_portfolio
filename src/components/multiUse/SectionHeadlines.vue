<template>
    <h1 class="section-headlines" :class="{smaller: smaller}">{{ props.headline }}</h1>
</template>

<script lang="ts" setup>
import { defineProps } from 'vue';
const props = defineProps([
    "headline",
    "smaller",
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
    h1.section-headlines {
        font-size: 15vmin;
        z-index: -1;
    }


    h1.section-headlines.smaller {
            font-size: clamp(40px, 13vw, 200px) !important;
        }
    @media screen and (min-width: 576px) {
        h1.section-headlines {
            font-size: 100px;
        }
    }
    @media screen and (min-width: 768px) {
        h1.section-headlines {
            font-size: 150px;
        }
    }
    @media screen and (min-width: 992px) {
        h1.section-headlines {
            font-size: 200px;
        }
    }
    @media screen and (min-width: 1200px) {
        h1.section-headlines.smaller {
            font-size: 180px;
        }
    }
    @media screen and (min-width: 1400px) {
        h1.section-headlines {
            font-size: 250px;
        }
    }
</style>