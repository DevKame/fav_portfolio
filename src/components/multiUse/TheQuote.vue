<template>
    <div class="quote-wrapper my-5 d-flex flex-column justify-content-start align-items-center" ref="wrapper">
        <h1 class="">{{ props.quote.quote }}</h1>
        <h4 class="ms-auto">- {{ props.quote.person }}</h4>
    </div>
</template>

<script setup lang="ts">
import { defineProps, inject, ComputedRef, watch, ref } from 'vue';

const props = defineProps([
    "quote",
]);
const isInView = ref(false);
const wrapper = ref<HTMLElement>();
let progress = inject<ComputedRef<number>>("progressvalue")!;

watch(progress, () => {
    if(!isInView.value)
    {
        const el = wrapper.value;
        const topdata = el!.getBoundingClientRect().top;
        if(topdata < 450)
        {
            el!.classList.add("on_view");
            isInView.value = true;
        }
    }
});
</script>

<style scoped>
.quote-wrapper.on_view h1,
.quote-wrapper.on_view h4 {
    opacity: .5;
}
.quote-wrapper.on_view h1::selection,
.quote-wrapper.on_view h4::selection {
    all: unset;
}
.quote-wrapper h1,
.quote-wrapper h4 {
    color: #c7c7c7;
    font-family: "Lugrasimo Reg 400";
    opacity: 0;
    transition: opacity .7s ease;
}
h1 {
    width: 100%;
    text-align: center;
}
@media screen and (min-width: 992px) {
    h1 {
        width: 70%;
        text-align: center;
    }
}
</style>