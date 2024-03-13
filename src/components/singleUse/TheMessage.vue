<template>
    <section class="message px-2 px-sm-4 px-xl-5 d-flex flex-column justify-content-start align-items-center">
        <section-headline headline="MESSAGE" :smaller="true"></section-headline>
            <div class="message-wrapper container position-relative d-flex flex-column justify-content-start align-items-center border border-danger">
                <h1 class="me-auto">MESSAGE ME</h1>
                <div class="dynamic-form border border-info d-flex flex-column justify-content-start align-items-center">
                    <p class="me-auto">Choose a language</p>
                </div>
            </div>
    </section>
</template>


<style scoped>
.dynamic-form {
    width: 100%;
    font-family: "Ubuntu Med 500";
    color: #c7c7c7;
}
.message-wrapper h1 {
    color: #c7c7c7;
    font-family: "Unbounded Bold 700";
}
</style>