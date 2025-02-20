<script setup lang="ts">
const emit = defineEmits(["click"]);
</script>

<template>
    <div class="one">
        <CoreTitle>Parabéns por chegar até aqui!</CoreTitle>
        <CoreParagraph>
            Prepare-se para uma jornada incrível! Na D3, você terá a oportunidade de fazer parte de um time
            talentoso e trabalhar em projetos desafiadores.
        </CoreParagraph>
        <CoreParagraph>
            Tire uma cópia do arquivo Figma e envie para o email fornecido na vaga.
        </CoreParagraph>
        <CoreBtn @click="emit('click')">
            Iniciar quiz
        </CoreBtn>
    </div>
</template>

<style scoped lang="scss">
.one {
    gap: 30px;
    display: flex;
    flex-direction: column;
}
</style>