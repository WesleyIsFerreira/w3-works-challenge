<script setup lang="ts">
import { ref } from "vue";

const activeStep = ref(0);

</script>

<template>
    <div class="pi">
        <Transition name="slide-up" mode="out-in">
            <div v-if="[0, 4, 5].includes(activeStep)" class="pi__box-1">
                <video class="pi__video" autoplay loop muted playsinline>
                    <source src="/videos/circle.mp4" type="video/mp4" />
                    Seu navegador não suporta vídeos em HTML5.
                </video>
            </div>
        </Transition>
        <div class="container">
            <Transition name="slide-up" mode="out-in">
                <StepsZero v-if="activeStep === 0" @click="activeStep++" />
                <StepsOne v-else-if="activeStep === 1" @click="activeStep++" />
                <StepsTwo v-else-if="activeStep === 2" @click="activeStep++" />
                <StepsThree v-else-if="activeStep === 3" @click="activeStep++" />
                <StepsFour v-else-if="activeStep === 4" @click="activeStep++" />
                <StepsFive v-else @click="activeStep = 0" />
            </Transition>
        </div>
    </div>
</template>

<style scoped lang="scss">
.pi {
    &__box-1 {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 66vw;
    }

    &__video {
        position: absolute;
        top: 0%;
        left: 50%;
        width: 100%;
        transform: translate(-18.5%, -19%);
        scale: 2.7;
    }
}
</style>
