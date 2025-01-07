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
        labels: [
            @foreach ($graficoFaleConosco as $dadosGrafico)
                '{{ $dadosGrafico->no_status }}',
            @endforeach
        ],
        datasets: [{
            label: 'Quantidade',
            data: [
                @foreach ($graficoFaleConosco as $dadosGrafico)
                    {{ $dadosGrafico->total_fale_conosco }},
                @endforeach
            ],
            // Atualmente, contém somente existe 5 status. Caso, tenha mais outros cores devem ser adicionados.
            backgroundColor: [
                'rgba(13, 110, 253, 0.5)',
                'rgba(255, 193, 7, 0.5)',
                'rgba(108, 117, 125, 0.5)',
                'rgba(25, 135, 84, 0.5)',
                'rgba(220, 53, 69, 0.5)'
            ],
            borderColor: [
                'rgb(13, 110, 253)',
                'rgb(255, 193, 7)',
                'rgb(108, 117, 125)',
                'rgba(25, 135, 84)',
                'rgb(220, 53, 69)'
            ],
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true,
            ticks: {
                    // Apenas valores inteiros
                    callback: function(value) {
                        if (Number.isInteger(value)) {
                            return value; // Exibe apenas valores inteiros
                        }
                    },
                    stepSize: 1 // Garante que os ticks avancem em passos de 1
                }   
            }
        },
        plugins: {
            legend: {
                display: false,
            }
        }
        }
    });
</script>