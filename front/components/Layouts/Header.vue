<script setup lang="ts">
import logo from '@/assets/svg/logo.svg';
</script>

<template>
    <div class="header">
        <img class="header__img" :src="logo" alt="logo" />
    </div>
</template>

<style scoped lang="scss">
.header {
    height: 72px;
    display: flex;
    align-items: center;
    justify-content: center;

    &__img {
        height: 24px;
    }
}
</style>