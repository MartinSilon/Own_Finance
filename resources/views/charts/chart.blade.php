<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

{{-- ---- SAVE ACCOUNTS FOR MD---- --}}
<div class="spareMoney container rounded bg-white px-md-5 px-md-2 py-md-3 py-1 my-2 px-3 shadow">
    <div class="row d-md-flex">
        <div class="col-12 chart">
            <canvas id="myPieChart" ></canvas>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Mesačné výdavky', 'Výdavky', 'Sporenie', 'Zostatok' ],
            datasets: [{
                data: [{{ $expensesSum }}, {{ $moneySpent - $saving }}, {{ $saving }}, {{ $moneyLeft }}],
                backgroundColor: [
                    '#0077b6',
                    '#e63946',
                    '#00af54',
                    '#fca311',
                ],
                borderColor: [
                    'white',
                    'white',
                    'white',
                    'white',
                ],
                borderWidth: 3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                datalabels: {
                    formatter: (value, ctx) => {
                        return value+" €";
                    },
                    color: 'white',
                    font: {
                        size: '15em',
                        weight: 'bold',
                    },
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed !== null) {
                                label += context.parsed;
                            }
                            return label;
                        }
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });
</script>


