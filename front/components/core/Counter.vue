<template>
    <div class="counter">
        <slot />
    </div>
</template>

<style scoped lang="scss">
.counter {
    color: white;
    white-space: pre-wrap;
    display: flex;

    ::v-deep(span) {
        padding-left: 5px;
        color: $yellow;
    }
}
</style>