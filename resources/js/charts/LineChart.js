import { Line } from 'vue-chartjs'

export default {
    extends: Line,
    data () {
        return {
            chartData: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [
                    {
                        label: 'Purchase Requisition',
                        data: ['252', '212', '280', '200', '245', '214', '180', '241','227', '210', '310', '400'],
                        fill: false,
                        borderColor: '#2554FF',
                        backgroundColor: '#2554FF',
                        borderWidth: 1,
                        pointBorderColor: '#249EBF'
                    },
                    {
                        label: 'Work Order',
                        data: ['142', '122', '180', '100', '145', '114', '200', '141','127', '110', '210', '200'],
                        fill: false,
                        borderColor: '#ffbd4d',
                        backgroundColor: '#ffbd4d',
                        borderWidth: 1,
                        pointBorderColor: '#ffbd4d'
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        gridLines: {
                            display: true
                        }
                    }],
                    xAxes: [ {
                        gridLines: {
                            display: false
                        }
                    }]
                },
                legend: {
                    display: true
                },
                responsive: true,
                maintainAspectRatio: false
            }
        }
    },
    methods: {
        //
    },
    mounted () {
        this.renderChart(this.chartData, this.options)
    }
}
