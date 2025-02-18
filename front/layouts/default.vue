<template>
    <div class="ld">
        <LayoutsHeader />
        <slot />
        <LayoutsFooter />
    </div>
</template>

<style scoped>
.ld {
    background-color: black;
    height: 100vh;
}
</style>