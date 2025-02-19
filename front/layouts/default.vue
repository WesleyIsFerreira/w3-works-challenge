<template>
    <div class="ld">
        <LayoutsHeader />
        <slot />
        <LayoutsFooter class="ld__footer" />
    </div>
</template>

<style scoped lang="scss">
.ld {
    &__footer {
        margin-top: 60px;
    }
}
</style>