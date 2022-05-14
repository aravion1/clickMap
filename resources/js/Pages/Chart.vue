<script>
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    name: 'BarChart',
    components: { Bar },
    data() {
        return {
            chartData: {
                labels: this.$page.props.data.hours,
                datasets: [
                    {
                        label: 'Clicks',
                        backgroundColor: '#f87979',
                        height: '500',
                        data: this.$page.props.data.count
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        }
    },
    computed: {
        myStyles() {
            return {
                height: '500px'
            }
        }
    }
}

</script>


<template>
    <div class="chart-block" height="500" width="500">
        <Bar :chart-data="chartData" :options="options" style="height: 500px; width: 500px"/>
    </div>

</template>
