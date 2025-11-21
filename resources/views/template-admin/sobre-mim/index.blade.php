@extends('template-admin.layout.index')

@section('active-sobre-mim', 'active')

@section('titulo-pag', 'Sobre Mim')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Sobre Mim</h2>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ route('sobre-mim.logs-sistema') }}">Sobre Mim</a></li>
        </ol>
    </nav>

    <div class="row padding-top-2em justify-content-center">
        <div class="col col-md-4 ">
            <div class="row justify-content-center">
                <div class="card text-center pt-3" style="width: 18rem;">
                    <img src="{{ isset($sobreMim->ds_url_foto_usuario) ? asset_path("storage/$sobreMim->ds_url_foto_usuario") : asset_path('default/felipe-akel.jpg') }}" class="card-img-top rounded" alt="Foto do Usuário">
                    <div class="card-body">
                        <h5 class="card-title text-info-emphasis">{{ $sobreMim->no_usuario }}</h5>
                        <p class="card-text">{{ $sobreMim->ds_funcao }}</p>
                    </div>
                    <div class="card-body">
                        <a href="{{ isset($sobreMim->ds_url_curriculo) ? asset_path("storage/$sobreMim->ds_url_curriculo") : asset_path('default/curriculo-felipe-akel.pdf')  }}" class="card-link link-menu" target="_blank">Currículo</a>
                        <a href="{{ $sobreMim->ds_url_linkedin }}" class="card-link link-menu" target="_blank">Linkedin</a>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center pt-5">
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-info-emphasis">Carreira Profissional</h5>
                        <ul class="list-group">
                            @foreach ($totalCarreiraProfissional AS $indice => $totalExperiencia )
                                <li type="button" class="list-group-item d-flex justify-content-between align-items-center"
                                    data-bs-toggle="popover" data-bs-title="Descrição" 
                                    data-bs-content="{{ $totalExperiencia->ds_tipo_experiencia }}"
                                >
                                    {{ $totalExperiencia->no_tipo_experiencia }}
                                    <span class="badge text-bg-primary rounded-pill">{{ $totalExperiencia->total_quantidade }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-info-emphasis">Habilidades</h5>
                        <ul class="list-group">
                            @foreach ($totalHabilidade AS $indice => $totalHab )
                                <li type="button" class="list-group-item d-flex justify-content-between align-items-center"
                                    data-bs-toggle="popover" data-bs-title="Descrição" 
                                    data-bs-content="{{ $totalHab->ds_tipo_habilidade }}"
                                >
                                    {{ $totalHab->no_tipo_habilidade }}
                                    <span class="badge text-bg-primary rounded-pill">{{ $totalHab->total_quantidade }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-info-emphasis">Portfólio e Serviços</h5>
                        <ul class="list-group">
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

                </div>
            </div>

        </div>

        <div class="col col-md-8">
            
            <div class="card ">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link link-menu @yield('active-informacao-pessoal')" href="{{ route('sobre-mim.informacao-pessoal-show') }}">Informação pessoal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-menu @yield('active-mudar-arquivos')" href="{{ route('sobre-mim.mudar-arquivos-show') }}">Mudar Arquivos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-menu @yield('active-login-senha')" href="{{ route('sobre-mim.alterar-login-senha-show') }}">Alterar login e senha</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-menu @yield('active-logs-sistema')" href="{{ route('sobre-mim.logs-sistema') }}">Logs do Sistema</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                        
                    @yield('conteudo-sobre-mim')

                </div>
            </div>

        </div>
    </div>
@endsection