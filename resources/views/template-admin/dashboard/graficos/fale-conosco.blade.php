<div class="card text-center">
    <div class="card-header titulo-1rem text-info-emphasis">
        Fale Conosco
    </div>
    <div class="card-body">
        <canvas id="faleConosco"></canvas>
    </div>
    <div class="card-footer text-body-secondary"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const faleConosco = document.getElementById('faleConosco');

    new Chart(faleConosco, {
        type: 'bar',
        data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
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
</script>