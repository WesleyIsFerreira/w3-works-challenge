<script setup lang="ts">
import arrow from '@/assets/svg/right-arrow.svg';
</script>

<template>
    <button class="btn">
        <slot />
        <img class="header__img" :src="arrow" alt="logo" />
    </button>
</template>


<style scoped lang="scss">
.btn {
    background-color: $yellow;
    color: $black;
    font-size: 16px;
    width: fit-content;
    padding: 16px 20px;
    gap: 10px;
    display: flex;
    white-space: nowrap;
    justify-content: center;

    img {
        width: 18px;
    }
}
</style>