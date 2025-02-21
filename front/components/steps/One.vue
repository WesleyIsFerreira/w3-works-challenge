<script setup lang="ts">
import { ref } from 'vue';
const emit = defineEmits(["click"]);

const questionOne = ref("");

const options = [{
    value: '1',
    label: 'Criar APIs para serem consumidas por front-ends.'
}, {
    value: '2',
    label: 'Desenvolver a interface visual do aplicativo.'
}, {
    value: '3',
    label: 'Gerenciar bancos de dados e armazenamento de informações.'
}, {
    value: '4',
    label: 'Gerenciar bancos de dados e armazenamento de informações.'
}, {
    value: '5',
    label: 'Implementar a lógica de negócio da aplicação.'
}]
</script>

<template>
    <div class="one">
        <CoreCounter>
            ETAPA <span>1</span> \ 3
        </CoreCounter>
        <CoreParagraph>
            Qual das seguintes opções <strong>NÃO</strong> é considerada uma das principais responsabilidades de um
            desenvolvedor backend?
        </CoreParagraph>

        <div class="one__options">
            <div class="one__option" v-for="opt in options" :key="opt.value" @click="questionOne = opt.value">
                <label>
                    <input type="radio" :value="opt.value" v-model="questionOne" />
                    {{ opt.label }}
                </label>
            </div>
        </div>

        <CoreBtn @click="emit('click', questionOne)">
            Proximo
        </CoreBtn>

    </div>
</template>

<style scoped lang="scss">
.one {
    gap: 30px;
    display: flex;
    flex-direction: column;

    &__options {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    &__option {
        label {
            display: flex;
            gap: 10px;
            cursor: pointer;
        }

        input {
            cursor: pointer;
        }

        padding: 20px;
        background-color: $chineseBlack;
        color: $white;
        cursor: pointer;
    }
}
</style>