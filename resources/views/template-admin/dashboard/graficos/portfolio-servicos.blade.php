<div class="card text-center">
    <div class="card-header titulo-1rem text-primary">
        Portfólio e Serviços
    </div>
    <div class="card-body">
        <canvas id="graficoPortfolioServicos"></canvas>
    </div>
    <div class="card-footer text-body-secondary"></div>
</div>

<script>
    // Dados do gráfico
    const dataPortfolioServicos = {
        labels: [
            'Portfólio',
            'Serviços'
        ],
        datasets: [{
            label: 'Descrição Label',
            data: [
                {{ $totalPortfolio->total_portfolio > 0 ? $totalPortfolio->total_portfolio : 0 }},
                {{ $totalServicos->total_servicos > 0 ? $totalServicos->total_servicos : 0 }}
            ],
            hoverOffset: 4
        }]
    };

    // Configuração do gráfico
    const configPortfolioServicos = {
        type: 'pie',
        data: dataPortfolioServicos,
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
    const graficoPortfolioServicos = new Chart(
        document.getElementById('graficoPortfolioServicos'),
        configPortfolioServicos
    );
</script>