<script setup lang="ts">
import loading from '@/assets/svg/loading.svg';
</script>

<template>
    <div class="loading">
        <img class="loading__img" :src="loading" alt="loading" />
        Carregando
    </div>
</template>

<style scoped lang="scss">
.loading {
    opacity: 0.9;
    top: 0;
    left: 0;
    position: fixed;
    height: 100vh;
    width: 100vw;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 20px;
    background-color: $black;
    color: $white;
    font-size: 32px;

    &__img {
        height: 98px;
        animation: rotate 1s infinite linear;
    }
}

@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>