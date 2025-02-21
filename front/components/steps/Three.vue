<script setup lang="ts">
import { ref } from 'vue';
import Editor from 'primevue/editor';

const emit = defineEmits(["click"]);

const questionThree = ref("");
</script>

<template>
    <div class="three">
        <CoreCounter>
            ETAPA <span>3</span> \ 3
        </CoreCounter>
        <CoreParagraph>
            Escreva uma redação falando sobre o impacto das IAs na área da tecnologia.
        </CoreParagraph>

        <Editor v-model="questionThree" editorStyle="height: 320px" />

        <CoreBtn @click="emit('click', questionThree)">
            Proximo
        </CoreBtn>
    </div>
</template>

<style scoped lang="scss">
.three {
    gap: 30px;
    display: flex;
    flex-direction: column;
}
</style>