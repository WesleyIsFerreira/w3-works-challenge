<script setup lang="ts">
import { ref } from 'vue';
const emit = defineEmits(["click"]);

const questionTwo = ref("Selecione a resposta");

const options = [{
    value: '1',
    label: 'Python'
}, {
    value: '2',
    label: 'JavaScript'
}, {
    value: '3',
    label: 'SQL'
}, {
    value: '4',
    label: 'C#'
}]
</script>

<template>
    <div class="two">
        <CoreCounter>
            ETAPA <span>2</span> \ 3
        </CoreCounter>
        <CoreParagraph>
            Qual das seguintes tecnologias é primariamente utilizada para manipular o DOM (Document Object Model) e
            criar interfaces dinâmicas em aplicações web?
        </CoreParagraph>

        <select v-model="questionTwo" class="two__select">
            <option disabled value="Selecione a resposta">
                Selecione a resposta
            </option>
            <option v-for="opt in options" :key="opt.value" :value="opt.value">
                {{ opt.label }}
            </option>
        </select>

        <CoreBtn @click="emit('click', questionTwo === 'Selecione a resposta' ? '' : questionTwo)">
            Proximo
        </CoreBtn>

    </div>
</template>

<style scoped lang="scss">
.two {
    gap: 30px;
    display: flex;
    flex-direction: column;

    &__select {
        background-color: $chineseBlack;
        color: $white;
        height: 56px;
        padding: 0 10px;
    }
}
</style>