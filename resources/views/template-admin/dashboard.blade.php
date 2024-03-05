@extends('template-admin.layout.index')

@section('active-dashboard', 'active')

@section('titulo-pag', 'Deshboard')

@section('conteudo')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Dashboard</h2>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="card-group">
                <div class="card text-center">
                    <h5 class="card-header titulo-1rem text-info-emphasis">Carreira Profissional</h5>
                    <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @php $countCarreiraProfissional = 0; @endphp
                        @foreach ($totalCarreiraProfissional AS $indice => $totalExperiencia )
                            <li type="button" class="list-group-item d-flex justify-content-between align-items-center"
                                data-bs-toggle="popover" data-bs-title="Descrição" 
                                data-bs-content="{{ $totalExperiencia->ds_tipo_experiencia }}"
                            >
                                {{ $totalExperiencia->no_tipo_experiencia }}
                                <span class="badge text-bg-primary rounded-pill">{{ $totalExperiencia->total_quantidade }}</span>
                            </li>
                            @php $countCarreiraProfissional = $countCarreiraProfissional + $totalExperiencia->total_quantidade; @endphp
                        @endforeach
                    </ul>
                    </div>
                    <div class="card-footer">
                        <p class="bold">Total: <span class="text-info">{{ $countCarreiraProfissional }}</span></p>
                    </div>
                </div>
                <div class="card text-center">
                    <h5 class="card-header titulo-1rem text-info-emphasis">Habilidades</h5>
                    <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @php $countHabilidades = 0; @endphp
                        @foreach ($totalHabilidade AS $indice => $totalHab )
                            <li type="button" class="list-group-item d-flex justify-content-between align-items-center"
                                data-bs-toggle="popover" data-bs-title="Descrição" 
                                data-bs-content="{{ $totalHab->ds_tipo_habilidade }}"
                            >
                                {{ $totalHab->no_tipo_habilidade }}
                                <span class="badge text-bg-primary rounded-pill">{{ $totalHab->total_quantidade }}</span>
                            </li>
                            @php $countHabilidades = $countHabilidades + $totalHab->total_quantidade; @endphp
                        @endforeach
                    </ul>
                    </div>
                    <div class="card-footer">
                        <p class="bold">Total: <span class="text-info">{{ $countHabilidades }}</span></p>
                    </div>
                </div>
                <div class="card text-center">
                    <h5 class="card-header titulo-1rem text-info-emphasis">Portfólio e Serviços</h5>
                    <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Projetos
                            <span class="badge text-bg-primary rounded-pill">{{ $totalPortfolio->total_portfolio > 0 ? $totalPortfolio->total_portfolio : 0 }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Serviços
                            <span class="badge text-bg-primary rounded-pill">{{ $totalServicos->total_servicos > 0 ? $totalServicos->total_servicos : 0 }}</span>
                        </li>
                    </ul>
                    </div>
                    <div class="card-footer">
                        <p class="bold font-cinza">.</p>
                    </div>
                </div>
            </div>
                
        </div>
    </div>

    <hr class="border border-2 opacity-50">
   
   <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header titulo-1rem text-info-emphasis">Fale Conosco</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8 order-2">
                            <div class="list-group">
                                @php $countFaleConosco = 0; @endphp
                                @foreach ($totalFaleConosco AS $indice => $dadoFaleConosco )
                                    @switch($dadoFaleConosco->id_status)
                                        @case(1)
                                            @php $class = 'primary'; @endphp
                                            @break
                                        @case(2)
                                            @php $class = 'warning'; @endphp
                                            @break
                                        @case(3)
                                            @php $class = 'dark'; @endphp
                                            @break
                                        @case(4)
                                            @php $class = 'success'; @endphp
                                            @break
                                        @case(5)
                                            @php $class = 'danger'; @endphp
                                            @break
                                        @default
                                            @php $class = 'info'; @endphp
                                    @endswitch
                                    <a type="button" class="list-group-item  list-group-item-action list-group-item-{{ $class }}"
                                        data-bs-toggle="popover" data-bs-title="Descrição Status" 
                                        data-bs-content="{{ $dadoFaleConosco->ds_status }}"
                                    >
                                        <span class="badge text-bg-{{ $class }} rounded-pill">{{ $dadoFaleConosco->total_status }}</span>
                                        Total com o status: <b>{{ $dadoFaleConosco->no_status }}</b>
                                    </a>
                                    @php $countFaleConosco = $countFaleConosco + $dadoFaleConosco->total_status; @endphp
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center align-self-center order-1">
                            <h4 class="text-center">Quantidade Total de<br> Registros <span class="text-info">{{ $countFaleConosco }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
