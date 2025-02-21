<script setup lang="ts">
import { ref } from "vue";
import { Doughnut } from "vue-chartjs";
import {
    Chart as ChartJS,
    Title,
    ArcElement,
    CategoryScale
} from "chart.js";
import ChartDataLabels from "chartjs-plugin-datalabels";

const emit = defineEmits(["click"]);

ChartJS.register(Title, ArcElement, CategoryScale, ChartDataLabels);

const chartData = ref({
    labels: ["Erros", "Acertos", "Sem respostas"],
    datasets: [
        {
            data: [50, 30, 20],
            backgroundColor: ["#AE2831", "#2A52F0", "#40C2E9"]
        }
    ]
});

const chartOptions = ref({
    plugins: {
        datalabels: {
            color: "#fff",
            font: {
                weight: "bold",
                size: 10
            },
            formatter: (value: number, ctx: any) => {
                const sum = ctx.chart.data.datasets[0].data.reduce((a: number, b: number) => a + b, 0);
                const percentage = ((value / sum) * 100).toFixed(1) + "%";
                return percentage;
            }
        }
    }
});
</script>

<template>
    <div class="five">
        <div class="five__graphic">
            <div class="five__chart-container">
                <Doughnut :data="chartData" :options="chartOptions" />
            </div>
            <div>
                <div class="five__circles"><span style="background-color: #2A52F0" /> Acertos</div>
                <div class="five__circles"><span style="background-color: #40C2E9" /> Sem respostas</div>
                <div class="five__circles"><span style="background-color: #AE2831" /> Erros</div>
            </div>
        </div>
        <CoreBtn @click="emit('click')">Responder novamente</CoreBtn>
    </div>
</template>

<style scoped lang="scss">
.five {
    gap: 30px;
    display: flex;
    flex-direction: column;

    &__chart-container {
        width: 160px;
        height: 160px;
    }

    &__graphic {
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        gap: 20px;
        background-color: $chineseBlack;
        padding: 10px;
    }

    &__circles {
        color: white;
        font-size: 12px;
        margin: 8px 0;
        white-space: nowrap;
        text-overflow: ellipsis;


        span {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }
    }
}

@media (min-width: 1024px) {
    .five {
        &__graphic {
            padding: 20px;
        }
    }
}
</style>
