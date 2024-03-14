<template>
    <div class="skill-item d-flex justify-content-end align-items-center rounded-4 position-relative overflow-hidden" ref="skill_item">
        <div class="orange-bg position-absolute bg-tert rounded-4"></div>
        <div class="item-content ps-3 ps-sm-5 ps-lg-3 ps-xl-5 bg-prim position-relative rounded-4 d-flex justify-content-start align-items-center">
            <span :class="iconclass"></span>
            <strong class="ms-4 ms-sm-5">{{ text }}</strong>
        </div>
    </div>
</template>
<script setup lang="ts">
import { defineProps, computed, inject, ComputedRef, watch, ref } from 'vue';
const props = defineProps([
    "text",
]);
const iconclass = computed(() => {
    let iclass: string;
    switch(props.text) {
        case "Javascript":
            iclass = "js";
            break;
        case "Typescript":
            iclass = "ts";
            break;
        case "Vue":
            iclass = "vue";
            break;
        case "PHP":
            iclass = "php";
            break;
        case "CSS":
            iclass = "css";
            break;
        case "Bootstrap":
            iclass = "bs";
            break;
        case "HTML":
            iclass = "html";
            break;
        case "Sass":
            iclass = "sass";
            break;
        case "Python":
            iclass = "python";
            break;
        case "Git":
            iclass = "git";
            break;
        case "Django":
            iclass = "django";
            break;
    }
    return iclass!;
});
const isInView = ref(false);
const skill_item = ref<HTMLElement>();
let progress = inject<ComputedRef<number>>("progressvalue")!;

watch(progress, () => {
    if(!isInView.value)
    {
        const el = skill_item.value;
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
.skill-item:nth-child(odd) {
    transform: translate(-70%, 0);
}
.skill-item:nth-child(even) {
    transform: translate(70%, 0);
}
.django {
    background-image: url("@/assets/img/icons/dj_logo_32.svg");
}
.git {
    background-image: url("@/assets/img/icons/git_logo_32.svg");
}
.python {
    background-image: url("@/assets/img/icons/py_logo_32.svg");
}
.sass {
    background-image: url("@/assets/img/icons/sass_logo_32.svg");
}
.html {
    background-image: url("@/assets/img/icons/html_logo_32.svg");
}
.bs {
    background-image: url("@/assets/img/icons/bs_logo_32.svg");
}
.css {
    background-image: url("@/assets/img/icons/css_logo_32.svg");
}
.php {
    background-image: url("@/assets/img/icons/php_logo_32.svg");
}
.vue {
    background-image: url("@/assets/img/icons/vue_logo_32.svg");
}
.ts {
    background-image: url("@/assets/img/icons/ts_logo_32.svg");
}
.js {
    background-image: url("@/assets/img/icons/js_logo_32.svg");
}
.item-content span {
    background-repeat: no-repeat;
    background-size: 100%;
    width: 32px;
    height: 32px;
}
.item-content {
    width: calc(100% - 2px);
    height: 100%;
    border-left: 3px solid black;
    font-family: "Unbounded Bold 700";
    color: #c7c7c7;
    background-image: linear-gradient(to right, var(--prim), var(--prim-2) 150%);
}
.orange-bg {
    top: 0;
    left: 0;
    width: 10%;
    height: 100%;

}
.skill-item.on_view {
    transform: translate(0, 0);
    opacity: 1;
}
.skill-item {
    width: 100%;
    height: 60px;
    border: 3px solid black;
    margin: 15px 0;
    opacity: 0;
    transition: all 1s ease;
}
strong {
    font-size: 16px;
}
@media screen and (min-width: 576px) {
    strong {
        font-size: 20px;
    }
    .skill-item {
        height: 75px;
    }
}
@media screen and (min-width: 768px) {
    .skill-item {
        height: 100px;
    }
    .item-content span {
        width: 64px;
        height: 64px;
    }
    .django {
        background-image: url("@/assets/img/icons/dj_logo_64.svg");
    }
    .git {
        background-image: url("@/assets/img/icons/git_logo_64.svg");
    }
    .python {
        background-image: url("@/assets/img/icons/py_logo_64.svg");
    }
    .sass {
        background-image: url("@/assets/img/icons/sass_logo_64.svg");
    }
    .html {
        background-image: url("@/assets/img/icons/html_logo_64.svg");
    }
    .bs {
        background-image: url("@/assets/img/icons/bs_logo_64.svg");
    }
    .css {
        background-image: url("@/assets/img/icons/css_logo_64.svg");
    }
    .php {
        background-image: url("@/assets/img/icons/php_logo_64.svg");
    }
    .vue {
        background-image: url("@/assets/img/icons/vue_logo_64.svg");
    }
    .ts {
        background-image: url("@/assets/img/icons/ts_logo_64.svg");
    }
    .js {
        background-image: url("@/assets/img/icons/js_logo_64.svg");
    }
}
@media screen and (min-width: 992px) {
    .skill-item {
        width: 40%;
        height: 100px;
        border: 3px solid black;
        margin: 50px 0;
        opacity: 0;
        transition: all 1s ease;
    }
}
@media screen and (min-width: 1200px) {
    strong {
        font-size: 25px;
    }
}
@media screen and (min-width: 1400px) {
    strong {
        font-size: 30px;
    }
}
</style>