<div class="card text-center">
    <div class="card-header titulo-1rem text-info-emphasis">
        Habilidades
    </div>
    <div class="card-body">
        <canvas id="graficoHabilidades"></canvas>
    </div>
    <div class="card-footer text-body-secondary"></div>
</div>

<script>
    // Dados do gráfico
    const dataHabilidades = {
        labels: [
        
            @foreach ($totalHabilidade as $dadosHabilidade )
                '{{ $dadosHabilidade->no_tipo_habilidade }}',
            @endforeach
        
        ],
        datasets: [{
            label: 'Descrição Label',
            data: [
                @foreach ($totalHabilidade as $dadosHabilidade )
                    {{ $dadosHabilidade->total_quantidade }},
                @endforeach
            ],
            hoverOffset: 4
        }]
    };

    // Configuração do gráfico
    const configHabilidades = {
        type: 'doughnut',
        data: dataHabilidades,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom', // Posição da legenda
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            let value = context.raw || 0;
                            return `${label}: ${value}`;
                        }
                    }
                }
            }
        }
    };

    // Renderizando o gráfico
    const graficoHabilidades = new Chart(
        document.getElementById('graficoHabilidades'),
        configHabilidades
    );
</script>