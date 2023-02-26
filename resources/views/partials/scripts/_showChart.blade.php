<script>
function showChart(chartCurrency, chartDates, chartValues) {
    const ctx = document.getElementById('myChart');

    return new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartDates,
            datasets: [{
                label: chartCurrency,
                data: chartValues,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}
</script>