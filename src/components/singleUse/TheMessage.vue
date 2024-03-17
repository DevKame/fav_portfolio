<template>
    <section class="message d-flex flex-column justify-content-start align-items-center">
        <section-headline headline="MESSAGE" :smaller="true"></section-headline>
            <div class="background-image px-2 px-sm-4 px-xl-5">
                <div class="message-wrapper p-3 container position-relative d-flex flex-column justify-content-start align-items-center">
                    <h1 class="me-auto position-relative">{{ msgTitle }}</h1>

                    <div v-if="currentForm ==='LANGUAGE'" class="dynamic-form position-relative border border-info d-flex flex-column justify-content-start align-items-center">
                        <h4 class="me-auto">{{ msgDesc }}</h4>
                        <div class="border-wrapper d-flex justify-content-center align-items-center">
                            <button @click="setLanguage('eng')" class="prim-btn lang-btn me-4 position-relative">
                                ENGLISH
                                <div class="link-shadow position-absolute"></div>
                            </button>
                            <button @click="setLanguage('ger')" class="prim-btn lang-btn ms-4 position-relative">
                                DEUTSCH
                                <div class="link-shadow position-absolute"></div>
                            </button>
                        </div>
                    </div>

                    <div v-if="currentForm ==='REASON'" class="dynamic-form position-relative border border-info d-flex flex-column justify-content-start align-items-center">
                        <h4 class="me-auto">{{ msgDesc }}</h4>
                        <div class="border-wrapper d-flex flex-column justify-content-center align-items-center">
                            <button @click="setReason('website')" class="prim-btn type-btn my-3 position-relative">
                                {{ msgWebsiteQ }}
                                <div class="link-shadow position-absolute"></div>
                            </button>
                            <button @click="setReason('general')" class="prim-btn type-btn my-3 position-relative">
                                {{ msgGeneralQ }}
                                <div class="link-shadow position-absolute"></div>
                            </button>
                        </div>
                    </div>

                    <div v-if="currentForm ==='DATA'" class="dynamic-form position-relative border border-info d-flex flex-column justify-content-start align-items-center">
                        <h4 class="me-auto">{{ msgDesc }}</h4>
                        <div class="border-wrapper d-flex flex-column justify-content-center align-items-center">
                            <div class="input-holder my-2 border border-danger d-flex flex-column justify-content-start align-items-start">
                                <label for="msgFirstname">{{ dataLabelFirstname }}</label>
                                <input @input="showUserInputs" type="text" id="msgFirstname" name="msgFirstname" class="rounded-3 ps-2 py-1" v-model="user_inputs.firstname">
                            </div>
                            <div class="input-holder my-2 border border-danger d-flex flex-column justify-content-start align-items-start">
                                <label for="msgLastname">{{ dataLabelLastname }}</label>
                                <input @input="showUserInputs" type="text" id="msgLastname" name="msgLastname" class="rounded-3 ps-2 py-1" v-model="user_inputs.lastname">
                            </div>
                            <div class="input-holder my-2 border border-danger d-flex flex-column justify-content-start align-items-start">
                                <label for="msgEmail">E-Mail</label>
                                <input @input="showUserInputs" type="email" id="msgEmail" name="msgEmail" class="rounded-3 ps-2 py-1" v-model="user_inputs.email">
                            </div>
                            <div class="input-holder my-2 border border-danger d-flex justify-content-start align-items-center">
                                <input @input="showUserInputs" type="checkbox" id="msgPrivacy" name="msgPrivacy" class="position-relative" ref="privacyCheckbox">
                                <label for="msgPrivacy" class="ms-3">I have read and accept the <a href="#">privacy policy</a></label>
                            </div>
                            <div class="error-holder mt-1 overflow-hidden border border-info">

                            </div>
                        </div>
                    </div>
                    
                    <div v-if="currentForm ==='MESSAGE'" class="dynamic-form position-relative border border-info d-flex flex-column justify-content-start align-items-center">
                        <h4 class="me-auto">{{ msgDesc }}</h4>
                        <div class="border-wrapper d-flex flex-column justify-content-center align-items-center">
                            <div class="input-holder my-2 border border-danger d-flex flex-column justify-content-start align-items-start">
                                <span :class="{too_many_chars: tooManyChars}" class="char-counter">{{ totalChars }} / 512</span>
                                <textarea  @input="showUserInputs" id="msgText" name="msgText" class="rounded-3 ps-2 py-1" v-model="user_inputs.message"></textarea>
                            </div>
                            <div class="error-holder mt-1 overflow-hidden border border-info">

                            </div>
                        </div>
                    </div>
                    
                    <div v-if="currentForm ==='WEBSITEINFO'" class="dynamic-form position-relative border border-info d-flex flex-column justify-content-start align-items-center">
                        <h4 class="me-auto">{{ msgDesc }}</h4>
                        <div class="border-wrapper d-flex flex-column justify-content-center align-items-center">
                            <div class="input-holder my-2 border border-danger d-flex flex-column justify-content-start align-items-start">
                                <p>{{ domainHeadline }}</p>
                                <div class="w-100 d-flex justify-content-around align-items-center">
                                    <div class="radio-holder d-flex flex-column justify-content-between align-items-center">
                                        <input type="radio" name="domain" id="domainyes" value="yes">
                                        <label class="radio-label" for="domainyes">{{ yes }}</label>
                                    </div>
                                    <div class="radio-holder d-flex flex-column justify-content-between align-items-center">
                                        <input type="radio" name="domain" id="domainno" value="no">
                                        <label class="radio-label" for="domainno">{{ no }}</label>
                                    </div>
                                    <div class="radio-holder d-flex flex-column justify-content-between align-items-center">
                                        <input type="radio" name="domain" id="domainunsure" value="unsure">
                                        <label class="radio-label" for="domainunsure">{{ unsure }}</label>
                                    </div>
                                </div>
                            </div><div class="input-holder my-2 border border-danger d-flex flex-column justify-content-start align-items-start">
                                <p>{{ webspaceHeadline }}</p>
                                <div class="w-100 d-flex justify-content-around align-items-center">
                                    <div class="radio-holder d-flex flex-column justify-content-between align-items-center">
                                        <input type="radio" name="webspace" id="webspaceyes" value="yes">
                                        <label class="radio-label" for="webspaceyes">{{ yes }}</label>
                                    </div>
                                    <div class="radio-holder d-flex flex-column justify-content-between align-items-center">
                                        <input type="radio" name="webspace" id="webspaceno" value="no">
                                        <label class="radio-label" for="webspaceno">{{ no }}</label>
                                    </div>
                                    <div class="radio-holder d-flex flex-column justify-content-between align-items-center">
                                        <input type="radio" name="webspace" id="webspaceunsure" value="unsure">
                                        <label class="radio-label" for="webspaceunsure">{{ unsure }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="error-holder mt-1 overflow-hidden border border-info">

                            </div>
                        </div>
                    </div>

                    <div class="form-footer d-flex justify-content-start align-items-center">
                        <button v-if="showFooter" @click="resetMessage" class="red-btn d-flex justify-content-center align-items-center position-relative overflow-hidden">
                            {{ footerResetBtn }}
                            <div class="link-shadow position-absolute"></div>
                        </button>
                        <button v-if="showFooter" @click="messageBack" class="red-btn ms-3 d-flex justify-content-center align-items-center position-relative overflow-hidden">
                            {{ footerBackBtn }}
                            <div class="link-shadow position-absolute"></div>
                        </button>
                        <button v-if="showSubmit" @click="nextSubmit" class="prim-btn submit-btn ms-auto d-flex justify-content-center align-items-center position-relative overflow-hidden">
                            <p class="m-0">{{ footerSubmitBtn }}</p>
                            <div class="link-shadow position-absolute"></div>
                        </button>
                    </div>
                </div>
            </div>
    </section>
</template>

<script setup lang="ts">
import { ref, computed, reactive } from 'vue';

interface Userinputs {
    lang: string;
    reason: string;
    firstname: string;
    lastname: string;
    email: string;
    message: string;
    hasdomain: string;
    haswebspace: string;
    privacy: boolean;
}

const user_inputs = reactive<Userinputs>({
    // "ger" | "eng"
    lang: "",
    // "website" | "general"
    reason: "",
    firstname: "",
    lastname: "",
    email: "",
    message: "",
    // "yes" | "no" | "unsure"
    hasdomain: "",
    // "yes" | "no" | "unsure"
    haswebspace: "",
    privacy: false,
});

// SHOWS "SUBMIT" ONLY AT THE END OF THE FORM, OTHERWISE SHOWS "NEXT"
const readyToSubmit = ref(false);
// POINTS TO WETHER TO SHOW FOOTER OR NOT
const showFooter = ref(false);
// POINT WETHER TO SHOW SUBMIT BUTTON OR NOT
const showSubmit = ref(false);
// CHOSEN LANGUAGE
const lang = ref<string>("none");
// POINTS OUT WHAT FORM TO SHOW CURRENTLY
const currentForm = ref("LANGUAGE");
// HEADLINE TEXT ENG/GER
const msgTitle = computed(() => {
    return lang.value === "none" ?
    "MESSAGE ME" : lang.value === "eng" ?
    "MESSAGE ME" : "DEINE NACHRICHT";
});
// SUBHEADLINE DESCRIPTION ENG/GER
const msgDesc = computed(() => {
    let result: string;
    switch(currentForm.value) {
        case "LANGUAGE":
            result = lang.value === "none" ?
            "Set a language" : lang.value === "eng" ?
            "Set a language" : "Wähle eine Sprache";
            break;
        case "REASON":
            result = lang.value === "none" ?
            "Send a request no matter if just a general one or for a website" : lang.value === "eng" ?
            "Send a request no matter if just a general one or for a website" : "Sende eine Websitebezogene oder allgemeine Nachricht";
            break;
        case "DATA":
            result = lang.value === "none" ?
            "Tell me who you are and how to answer you." : lang.value === "eng" ?
            "Tell me who you are and how to answer you." : "Erzähl mir, wer du bist und wie ich dir antworten kann.";
            break;
        case "MESSAGE":
            result = lang.value === "none" ?
            "Enter your message here." : lang.value === "eng" ?
            "Enter your message here." : "Schreibe deine Nachricht hier.";
            break;
        case "WEBSITEINFO":
            result = lang.value === "none" ?
            "Additional info regarding websites" : lang.value === "eng" ?
            "Additional info regarding websites" : "Zusatzinfos bezüglich Websites";
            break;
    }
    return result!;
});
// (WHAT KIND OF QUESTION)-BUTTONS ENG/GER
const msgWebsiteQ = computed(() => {
    return lang.value === "none" ?
    "Message regarding a website" : lang.value === "eng" ?
    "Message regarding a website" : "Nachricht bezüglich einer Website";
});
const msgGeneralQ = computed(() => {
    return lang.value === "none" ?
    "General message" : lang.value === "eng" ?
    "General message" : "Allgemeine Nachricht";
});
/** SETS THE LANGUAGE TO lg AND MAKES FOOTER VISIBLE
 * @param {string} lg       => "eng" | "ger", provided by template */
function setLanguage(lg: string): void {
    lang.value = lg;
    currentForm.value = "REASON";
    showFooter.value = true;
    user_inputs.lang = lang.value;
    console.clear();
    console.table(user_inputs);
}
// ENG/GER EXPRESSIONS FOR FOOTER BUTTONS
const footerResetBtn = computed(() => {
    return lang.value === "none" ?
    "RESET" : lang.value === "eng" ?
    "RESET" : "VERWERFEN";
});
const footerBackBtn = computed(() => {
    return lang.value === "none" ?
    "Back" : lang.value === "eng" ?
    "Back" : "Zurück";
});
const footerSubmitBtn = computed(() => {
    let word: string;
    switch(readyToSubmit.value) {
        case true:
            word = lang.value === "none" ?
            "SUBMIT" : lang.value === "eng" ?
            "SUBMIT" : "SENDEN";
            break;
        case false:
            word = lang.value === "none" ?
            "NEXT" : lang.value === "eng" ?
            "NEXT" : "WEITER";
            break;

    }
    return word!;
});
// SETS THE REASON FOR MESSAGE AND CONTINUES TO DATA-WINDOW
function setReason(val: string): void {
    showSubmit.value = true;
    user_inputs.reason = val;
    console.clear();
    console.table(user_inputs);
    currentForm.value = "DATA";
}
// RESETS FORM FOR MESSAGING, JUST LEAVES LANGUAGE SETTING AS CHOSEN
function resetMessage(): void {
    showFooter.value = false;
    showSubmit.value = false;
    currentForm.value = "LANGUAGE";
}
// CALLBACK FOR CLICKING "BACK" IN MESSAGE FORM
function messageBack(): void {
    switch(currentForm.value) {
        case "REASON":
            currentForm.value = "LANGUAGE";
            showFooter.value = false;
            showSubmit.value = false;
            user_inputs.reason = "";
            break;
        case "DATA":
            currentForm.value = "REASON";
            showSubmit.value = false;
            user_inputs.firstname = "";
            user_inputs.lastname = "";
            user_inputs.email = "";
            break;
        case "MESSAGE":
            currentForm.value = "DATA";
            user_inputs.message = "";
            break;
    }
    showUserInputs();
}
// ENG/GER EXPRESSIONS FOR USER DATA INPUT LABELS
const dataLabelFirstname = computed(() => {
    return lang.value === "none" ?
    "Firstname" : lang.value === "eng" ?
    "Firstname" : "Vorname";
});
const dataLabelLastname = computed(() => {
    return lang.value === "none" ?
    "Lastname" : lang.value === "eng" ?
    "Lastname" : "Nachname";
});
// HANDLES WHAT HAPPENS ON CLICKING "NEXT"/"SUBMIT" DEPENDING ON currentForm
function nextSubmit(): void {
    //TODO: Zwischen den einzelnen Steps muss Validierung hin
    switch(currentForm.value) {
        case "DATA":
            currentForm.value = "MESSAGE";
            if(user_inputs.reason === "general") {
                readyToSubmit.value = true;
            }
            break;
        case "MESSAGE":
            console.clear();
            console.table(user_inputs);
            if(user_inputs.reason === "website") {
                currentForm.value = "WEBSITEINFO";
                readyToSubmit.value = true;
            }
            break;
    }
}
// COUNTS THE AMOUNT OF CHARACTERS IN <textarea>
const totalChars = computed(() => {
    return user_inputs.message.length;
});
// RETURNS TRUE/FALSE IF <textarea> HAS MORE THAN 512 CHARS
const tooManyChars = computed(() => {
    return totalChars.value > 512;
});
function showUserInputs(): void {
    console.clear();
    console.table(user_inputs);
}
const domainHeadline = computed(() => {
    return lang.value === "none" ?
    "I already have a domain" : lang.value === "eng" ?
    "I already have a domain" : "Ich habe bereits eine Domain";
});
const webspaceHeadline = computed(() => {
    return lang.value === "none" ?
    "I already have a webspace" : lang.value === "eng" ?
    "I already have a webspace" : "Ich habe bereits einen Webspace";
});
const yes = computed(() => {
    return lang.value === "none" ?
    "Yes" : lang.value === "eng" ?
    "Yes" : "Ja";
});
const no = computed(() => {
    return lang.value === "none" ?
    "No" : lang.value === "eng" ?
    "No" : "Nein";
});
const unsure = computed(() => {
    return lang.value === "none" ?
    "Unsure" : lang.value === "eng" ?
    "Unsure" : "Unsicher";
});

</script>

<style scoped>
label[for="msgPrivacy"] a {
    color: var(--tert);
}
label[for="msgPrivacy"] {
    cursor: pointer;
}
input[type="radio"]:checked::before {
    content: "";
    position: absolute;
    border: 1px solid black;
    border-radius: 50%;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    transform: translate(-50%, -50%);
    background-color: var(--tert);
    transition: all .3s ease;
}
input[type="radio"]:not(:checked)::before {
    content: "";
    position: absolute;
    border-radius: 50%;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    transform: translate(-50%, -50%);
    background-color: var(--tert);
    transition: all .3s ease;
}
input[type="radio"] {
    position: relative;
    border-radius: 50%;
    appearance: none;
    width: 15px !important;
    height: 15px !important;
    border: 1px solid var(--tert);
    cursor: pointer;
    background-color: var(--prim-2);
}
#msgPrivacy:checked::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 70%;
    height: 70%;
    transform: translate(-50%, -50%);
    background-color: green;
    transition: all .3s ease;
}
#msgPrivacy:not(:checked)::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    transform: translate(-50%, -50%);
    background-color: green;
    transition: all .3s ease;
}
#msgPrivacy {
    appearance: none;
    width: 15px;
    height: 15px;
    border: 1px solid var(--tert);
    cursor: pointer;
    background-color: var(--prim-2);
}
.char-counter {
    font-size: 12px;
}
.error-holder {
    width: 100%;
    height: 40px;
}
.too_many_chars {
    color: var(--red);
}
.input-holder textarea {
    height: 250px;
    resize: none;
}
.input-holder input:not(input[type="checkbox"]):focus,
.input-holder textarea:not(input[type="checkbox"]):focus {
    background-color: var(--prim-2);
}
.input-holder input:not(input[type="checkbox"]),
.input-holder textarea:not(input[type="checkbox"]) {
    width: 100%;
    outline: none;
    border: 2px solid var(--tert);
    background-color: var(--prim);
    color: #c7c7c7;
    transition: background-color .3s ease;
}
.input-holder,
.error-holder {
    width: 30%;
}
.form-footer button:not(.prim-btn):hover::after {
    width: 50%;
}
.form-footer button:not(.prim-btn)::after {
    right: 0;
}
.form-footer button:not(.prim-btn):hover::before {
    width: 50%;
}
.form-footer button:not(.prim-btn)::before {
    left: 0;
}
.form-footer button:not(.prim-btn)::before,
.form-footer button:not(.prim-btn)::after {
    position: absolute;
    content: "";
    top: 0;
    height: 100%;
    width: 0;
    z-index: -1;
    background-color: var(--red);
    transition: all .3s ease;
}
.form-footer button:not(.prim-btn):hover .link-shadow {
    opacity: 1;
}
.form-footer button:not(.prim-btn):hover {
    color: black;
}
.form-footer button {
    width: 150px;
    height: 60px;
    transition: all .3s ease;
}
.form-footer button:not(.prim-btn) {
    background-color: transparent;
    border: 2px solid var(--red);
    color: var(--red);
    border-radius: 15px;
}
.form-footer {
    z-index: 1;
    width: 100%;
    height: 150px;
}
.link-shadow {
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    box-shadow: 0 0 10px 5px black inset;
    z-index: 0;
    opacity: 0;
    transition: opacity .2s ease-in;
}
.prim-btn:hover .link-shadow {
    opacity: 1;
}
.prim-btn:hover::after {
    width: 50%;
}
.prim-btn:hover::before {
    width: 50%;
}
.prim-btn::after {
    top: 0;
    right: 0;
}
.prim-btn::before {
    top: 0;
    left: 0;
}
.prim-btn:hover {
    color: black;
}
.prim-btn::before,
.prim-btn::after {
    content: "";
    position: absolute;
    transition: all .2s ease-in;
    width: 0;
    height: 100%;
    background-color: var(--tert);
    z-index: -1;
}
.border-wrapper {
    width: 100%;
    height: 100%;
}
.prim-btn {
    overflow: hidden;
    background: none;
    border: 2px solid var(--tert);
    border-radius: 15px;
    text-underline-offset: 5px;
    color: var(--tert);
    transition: all .3s ease-in;
    z-index: 1;
}
.type-btn {
    width: 300px;
    height: 100px;
}
.lang-btn {
    width: 200px;
    height: 60px;
}
.background-image {
    width: 100%;
    background-image:
    linear-gradient(rgba(21, 33, 69, .9), rgba(21, 33, 69, .9)),
    url("@/assets/img/textures/rect_texture.png");
    background-size: 15%;
    padding-bottom: 100px;
}
.dynamic-form {
    width: 100%;
    height: 100%;
    font-family: "Ubuntu Med 500";
    color: #c7c7c7;
    z-index: 1;
}
.message-wrapper::before {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    border-radius: inherit;
    background-color: var(--tert);
    height: 100%;
    width: 10%;
}
.message-wrapper::after {
    position: absolute;
    content: "";
    top: 0;
    right: 0;
    border-radius: inherit;
    background-color: var(--prim);
    height: 100%;
    width: calc(100% - 3px);
    border-left: 3px solid black;
}
.message-wrapper {
    height: 600px;
    margin-top: 100px;
    border: 3px solid black;
    border-radius: 15px;
}
.message-wrapper h1 {
    color: #c7c7c7;
    font-family: "Unbounded Bold 700";
    z-index: 1;
}
.message {
}
</style>