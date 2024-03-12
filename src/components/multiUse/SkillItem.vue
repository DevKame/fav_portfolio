<template>
    <div class="skill-item d-flex justify-content-end align-items-center rounded-4 position-relative overflow-hidden">
        <div class="orange-bg position-absolute bg-tert rounded-4"></div>
        <div class="item-content ps-5 bg-prim position-relative rounded-4 d-flex justify-content-start align-items-center">
            <span :class="iconclass"></span>
            <strong class="ms-5">{{ text }}</strong>
        </div>
    </div>
</template>
<script setup lang="ts">
import { defineProps, computed } from 'vue';
const props = defineProps([
    "text",
]);
const iconclass = computed(() => {
    let iclass: string;
    switch(props.text) {
        case "JavaScript":
            iclass = "js";
            break;
    }
    return iclass!;
});
</script>

<style scoped>
strong {
    font-size: 30px;
}
.js {
    background-image: url("@/assets/img/icons/js_logo_64.svg");
}
span {
    background-repeat: no-repeat;
    width: 64px;
    height: 64px;
}
.item-content {
    width: calc(100% - 3px);
    height: 100%;
    border: 3px solid black;
    font-family: "Unbounded Bold 700";
    color: #c7c7c7;
}
.orange-bg {
    top: 0;
    left: 0;
    width: 10%;
    height: 100%;

}
.skill-item {
    width: 40%;
    height: 100px;
    border: 3px solid black;
}
</style>