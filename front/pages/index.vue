<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue';

const screenWidth = ref(1024);
const updateScreenSize = () => {
    screenWidth.value = window.innerWidth;
};

onMounted(() => {
    updateScreenSize();
    window.addEventListener("resize", updateScreenSize);
});

onUnmounted(() => {
    window.removeEventListener("resize", updateScreenSize);
});

const activeStep = ref<number>(0);
const loading = ref<boolean>(false);

const form = ref({
    questOne: '',
    questTwo: '',
    questThree: '',
});

const handleClick = (value: string = '') => {
    if (activeStep.value === 1) {
        form.value.questOne = value;
    } else if (activeStep.value === 2) {
        form.value.questTwo = value;
    } else if (activeStep.value === 3) {
        form.value.questThree = value;
    } else if (activeStep.value === 4) {
        // Envia
    }

    activeStep.value === 5 ? activeStep.value = 0 : activeStep.value++;
};
</script>

<template>
    <div :class="['pi', { container: screenWidth >= 768 }]">
        <Transition name="slide-up" mode="out-in">
            <div v-if="[0, 4, 5].includes(activeStep) || screenWidth >= 768" class="pi__box-1">
                <video class="pi__video" autoplay loop muted playsinline>
                    <source src="/videos/circle.mp4" type="video/mp4" />
                    Seu navegador não suporta vídeos em HTML5.
                </video>
            </div>
            <div v-else></div>
        </Transition>
        <div class="pi__box-2 container">
            <Transition name="slide-up" mode="out-in">
                <StepsZero v-if="activeStep === 0" @click="handleClick" />
                <StepsOne v-else-if="activeStep === 1" @click="handleClick" />
                <StepsTwo v-else-if="activeStep === 2" @click="handleClick" />
                <StepsThree v-else-if="activeStep === 3" @click="handleClick" />
                <StepsFour v-else-if="activeStep === 4" @click="handleClick" />
                <StepsFive v-else @click="handleClick" />
            </Transition>
        </div>
        <CoreLoading v-if="loading" />
    </div>
</template>

<style scoped lang="scss">
.pi {
    min-height: calc(100vh - 160px);

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

    &__box-2 {
        max-height: calc(100vh - 136px);
        overflow: auto;
    }
}

@media (min-width: 768px) {
    .pi {
        display: flex;
        min-height: calc(100vh - 136px);

        &__box-1 {
            height: initial;
            width: 50%;
        }

        &__video {
            top: 50%;
            transform: translate(-25%, -24%);
            scale: 2;
        }

        &__box-2 {
            width: 50%;
            display: flex;
            margin: auto;
            padding: 20px 5% 20px 0;
        }
    }
}

@media (min-width: 1024px) {
    .pi {
        &__video {
            top: 50%;
            transform: translate(-38%, -38%);
            scale: 1.3;
        }
    }
}
</style>
