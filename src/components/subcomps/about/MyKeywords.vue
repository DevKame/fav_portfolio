<template>
    <div class="my-keywords position-relative d-flex justify-content-end align-items-center" ref="keyword">
        <div class="keyword-aside bg-tert position-absolute"></div>
        <div class="keyword-content d-flex jusity-content-start align-items-center position-relative">
            <fa-icon :icon="icon" size="lg"></fa-icon>
            <a v-if="isLink" :href="linkTo" target="_blank">
                {{ text }}
            </a>
            <span v-else>{{ text }}</span>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { defineProps, watch, computed, ref } from 'vue';

const props = defineProps([
    "icon",
    "isLink",
    "linkTo",
    "text",
    "makeVisible",
    "delay",
]);
const sectionVisible = computed(() => {
    return props.makeVisible;
});


watch(sectionVisible, val => {
    console.log(val);
    if(val) {
        flyKeyword();
    }
});
const keyword = ref<HTMLDivElement>();
async function flyKeyword() {
    console.log(props.delay);
    console.log(typeof(props.delay));
    await keyword.value!.animate(
        [
            {transform: "translate(-30px, 0)"},
        ],
        {
            duration: 400,
            fill: "forwards",
            delay: props.delay,
        }
    ).finished;
    await keyword.value!.animate(
        [
            {transform: "translate(10px, 0)"},
        ],
        {
            duration: 100,
            fill: "forwards",
        }
    ).finished;
    await keyword.value!.animate(
        [
            {transform: "translate(0, 0)"},
        ],
        {
            duration: 150,
            fill: "forwards",
        }
    ).finished;

}
</script>

<style scoped>
a {
    color: #c7c7c7;
}
.keyword-content {
    width: calc(100% - 4px);
    height: 100%;
    background: var(--prim) linear-gradient(to right, var(--prim), rgba(170,170,170,.1) 120%);
    border-radius: inherit;
    border-left: 2px solid black;
}
.keyword-aside {
    top: 1px;
    left: 0;
    width: 10%;
    height: calc(100% - 2px);
    border-radius: inherit;
}
.my-keywords:first-child {
    margin-top: 50px;
}
.my-keywords {
    width: 70%;
    border: 2px solid black;
    height: 50px;
    border-radius: 15px;
    color: #c7c7c7;
    font-family: "Ubuntu Med 500";
    margin: 16px 0;
    box-shadow: 0 0 0 2px #c7c7c7;
    transform: translate(200%, 0);
}
@media screen and (min-width: 1200px) {
    .keyword-content {
        padding-left: 50px;
    }
    .keyword-content svg + * {
        margin-left: 50px;
    }
}
</style>