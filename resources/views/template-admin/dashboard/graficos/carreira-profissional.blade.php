<div class="card text-center">
    <div class="card-header titulo-1rem text-info-emphasis">
        Carreira Profissional
    </div>
    <div class="card-body">
        <canvas id="graficoCarreiraProfissional"></canvas>
    </div>
    <div class="card-footer text-body-secondary"></div>
</div>

<script>
    // Dados do gráfico
    const dataCarreiraProfissional = {
        labels: [
        
            @foreach ($totalCarreiraProfissional as $dadosCarreira )
                '{{ $dadosCarreira->no_tipo_experiencia }}',
            @endforeach
        
        ],
        datasets: [{
            label: 'Descrição Label',
            data: [
                @foreach ($totalCarreiraProfissional as $dadosCarreira )
                    {{ $dadosCarreira->total_quantidade }},
                @endforeach
            ],
            hoverOffset: 4
        }]
    };

    // Configuração do gráfico
    const configCarreiraProfissional = {
        type: 'pie',
        data: dataCarreiraProfissional,
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
    const graficoCarreiraProfissional = new Chart(
        document.getElementById('graficoCarreiraProfissional'),
        configCarreiraProfissional
    );
</script>