<script setup lang="ts">
const emit = defineEmits(["click"]);
</script>

<template>
    <div class="four">
        <CoreTitle>Parabéns seu teste foi enviado com sucesso</CoreTitle>
        <CoreParagraph>
            Em breve entraremos em contato com mais informações.
        </CoreParagraph>

        <CoreBtn @click="emit('click')">
            Ver resultado
        </CoreBtn>
    </div>
</template>

<style scoped lang="scss">
.four {
    gap: 30px;
    display: flex;
    flex-direction: column;
}
</style>