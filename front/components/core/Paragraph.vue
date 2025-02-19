<template>
    <p class="paragraph">
        <slot />
    </p>
</template>


<style scoped lang="scss">
.paragraph {
    color: $white;
    font-size: 16px;
    font-weight: 700;

    ::v-deep(strong) {
        color: $yellow;
    }
}
</style>