<script setup lang="ts">
import { ref } from 'vue';
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



        <CoreBtn>
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