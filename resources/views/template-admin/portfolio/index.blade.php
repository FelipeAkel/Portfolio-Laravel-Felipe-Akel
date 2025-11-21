@extends('template-admin.layout.index')

@section('active-portfolio', 'active')

@section('titulo-pag', 'Portfólio')

@section('conteudo')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Portfólio</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('portfolio.create') }}" class="btn btn-success">Novo Registro</a>
            </div>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('portfolio.index') }}">Portfólio</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="accordion" id="accordionFiltro">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFiltro" aria-expanded="true" aria-controls="collapseFiltro">
                            Filtros
                        </button>
                    </h2>
                    <div id="collapseFiltro" class="accordion-collapse collapse show" data-bs-parent="#accordionFiltro">
                        <div class="accordion-body">

                            <form class="row g-3" 
                                action="{{ route('portfolio.index') }}" 
                                method="POST"
                            >
                                @csrf

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Tipo de Projeto </label>
                                    <div class="form-check">
                                        <input 
                                            type="checkbox" 
                                            class="form-check-input {{ $errors->has('php-laravel') ? 'is-invalid' : '' }}" 
                                            name="tipo_php_laravel" id="tipo_php_laravel" 
                                            value="php-laravel" 
                                            {{ old('tipo_php_laravel') == 'php-laravel' ? 'checked' : '' }} 
                                        >
                                        <label class="form-check-label " for="tipo_php_laravel">
                                            PHP | Laravel
                                        </label>
                                        @error('tipo_php_laravel')
                                            <div class="invalid-feedback">
                                                {{ $errors->first('tipo_php_laravel') }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-check">
                                        <input 
                                            type="checkbox" 
                                            class="form-check-input {{ $errors->has('tipo_website') ? 'is-invalid' : '' }}"
                                            name="tipo_website" id="tipo_website" 
                                            value="website" 
                                            {{ old('tipo_website') == 'website' ? 'checked' : '' }} 
                                        >
                                        <label class="form-check-label" for="tipo_website">
                                            Website
                                        </label>
                                        @error('tipo_website')
                                            <div class="invalid-feedback">
                                                {{ $errors->first('tipo_website') }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-check">
                                        <input 
                                            type="checkbox" 
                                            class="form-check-input {{ $errors->has('tipo_landing_page') ? 'is-invalid' : '' }}" 
                                            name="tipo_landing_page" id="tipo_landing_page" value="landing-page" 
                                            {{ old('tipo_landing_page') == 'landing-page' ? 'checked' : '' }} 
                                        >
                                        <label class="form-check-label" for="tipo_landing_page">
                                            Landing Page
                                        </label>
                                        @error('tipo_landing_page')
                                            <div class="invalid-feedback">
                                                {{ $errors->first('tipo_landing_page') }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-check">
                                        <input 
                                            type="checkbox"
                                            class="form-check-input {{ $errors->has('tipo_angular') ? 'is-invalid' : '' }}" 
                                            name="tipo_angular" id="tipo_angular" 
                                            value="angular" 
                                            {{ old('tipo_angular') == 'angular' ? 'checked' : '' }} 
                                        >
                                        <label class="form-check-label" for="tipo_angular">
                                            Angular
                                        </label>
                                        @error('tipo_angular')
                                            <div class="invalid-feedback">
                                                {{ $errors->first('tipo_angular') }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="no_projeto" class="form-label">Nome Projeto </label>
                                    <input 
                                        type="text" 
                                        class="form-control {{ $errors->has('no_projeto') ? 'is-invalid' : '' }}" 
                                        name="no_projeto" id="no_projeto" 
                                        value="{{ old('no_projeto') }}" 
                                    >
                                    @error('no_projeto')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('no_projeto') }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="ds_tecnologia" class="form-label">Descrição Tecnologias </label>
                                    <input 
                                        type="text" 
                                        class="form-control {{ $errors->has('ds_tecnologia') ? 'is-invalid' : '' }}" 
                                        name="ds_tecnologia" id="ds_tecnologia" 
                                        value="{{ old('ds_tecnologia') }}" 
                                    >
                                    <div class="form-text">
                                        Exemplos: HTML | CSS | PHP | Laravel | Angular | Bootstrap | MySQL...
                                    </div>
                                    @error('ds_tecnologia')
                                        <div class="invalid-feedback">
                                            {{ $errors->first('ds_tecnologia') }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Data Início</label>
                                    <div class="input-group mb-3">
                                        <input 
                                            type="date" 
                                            class="form-control 
                                            {{ $errors->has('dt_inicio_inicio') ? 'is-invalid' : '' }}" 
                                            name="dt_inicio_inicio" 
                                            value="{{ old("dt_inicio_inicio") }}"
                                        >
                                        <span class="input-group-text icone block" >Até</span>
                                        <input 
                                            type="date" 
                                            class="form-control 
                                            {{ $errors->has('dt_inicio_final') ? 'is-invalid' : '' }}" 
                                            name="dt_inicio_final"
                                            value="{{ old("dt_inicio_final") }}"
                                        >
                                        
                                        @if($errors->has('dt_inicio_inicio') || $errors->has('dt_inicio_final'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('dt_inicio_inicio') }}
                                                {{ $errors->first('dt_inicio_final') }}
                                            </div>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Data Finalização</label>
                                    <div class="input-group mb-3">
                                        <input 
                                            type="date" 
                                            class="form-control 
                                            {{ $errors->has('dt_finalizacao_inicio') ? 'is-invalid' : '' }}" 
                                            name="dt_finalizacao_inicio" 
                                            value="{{ old("dt_finalizacao_inicio") }}"
                                        >
                                        <span class="input-group-text icone block" >Até</span>
                                        <input 
                                            type="date" 
                                            class="form-control 
                                            {{ $errors->has('dt_finalizacao_final') ? 'is-invalid' : '' }}" 
                                            name="dt_finalizacao_final"
                                            value="{{ old("dt_finalizacao_final") }}"
                                        >
                                        
                                        @if($errors->has('dt_finalizacao_inicio') || $errors->has('dt_finalizacao_final'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('dt_finalizacao_inicio') }}
                                                {{ $errors->first('dt_finalizacao_final') }}
                                            </div>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <button type="reset" class="btn btn-secondary"> Limpar </button>
                                    <button type="submit" class="btn btn-primary"> Pesquisar </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <hr class="border border-2 opacity-50">

    <h5 class="">Resultado</h5>
    <div class="table-responsive ">
        <table class="table table-hover table-bordered border ">
            <thead class="table-primary">
                <tr>
                    <th scope="col" width="200px">Ações</th>
                    <th scope="col">Nome Projeto</th>
                    <th scope="col">Tipo de Projeto</th>
                    <th scope="col">Data Início - Finalização</th>
                    <th scope="col">URL Projeto</th>
                    <th scope="col">URL Repositório</th>
                    <th scope="col">IMG Destaque</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($portfolio AS $indice => $dadoProjeto )
                    <tr>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group me-2" role="group" aria-label="First group">
                                    <a href="{{ route('portfolio.show', $dadoProjeto->id) }}" class="btn btn-info btn-sm" 
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-info"
                                        data-bs-title="Visualizar Registro"
                                    ><i class="bi bi-card-text"></i></a>
                                </div>
                                <div class="btn-group me-2" role="group" aria-label="Second group">
                                    <a href="{{ route('portfolio.edit', $dadoProjeto->id) }}" class="btn btn-primary btn-sm" 
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-edit"
                                        data-bs-title="Editar Registro"
                                    ><i class="bi bi-pencil-square"></i></a>
                                </div>
                                <div class="btn-group me-2" role="group" aria-label="Third group">
                                    <form id="form_delete_{{ $dadoProjeto->id }}" action="{{ route('portfolio.delete', $dadoProjeto->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a onclick="document.getElementById('form_delete_{{ $dadoProjeto->id }}').submit()"
                                            class="btn btn-danger btn-sm" 
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-delete"
                                            data-bs-title="Deletar Registro"
                                        ><i class="bi bi-trash"></i></a>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>{{ $dadoProjeto->no_projeto }}</td>
                        <td>{{ $dadoProjeto->ds_tipo_projeto }}</td>
                        <td>
                            @empty(!$dadoProjeto->dt_inicio)
                                <b>Início:</b> {{ \Carbon\Carbon::parse($dadoProjeto->dt_inicio)->format('d/m/Y') }}
                            @endempty
                            @if($dadoProjeto->dt_inicio != null && $dadoProjeto->dt_finalizacao != null)
                                <br>
                            @endif
                            @empty(!$dadoProjeto->dt_finalizacao)
                                <b>Finalização:</b> {{ \Carbon\Carbon::parse($dadoProjeto->dt_finalizacao)->format('d/m/Y') }}
                            @endempty
                        </td>
                        <td>
                            @if ($dadoProjeto->ds_url_projeto != null)
                                <a href="{{ $dadoProjeto->ds_url_projeto }}" target="_blank">Link</a>
                            @endif
                        </td>
                        <td>
                            @if ($dadoProjeto->ds_url_repositorio != null)
                                <a href="{{ $dadoProjeto->ds_url_repositorio }}" target="_blank">Link</a>
                            @endif
                        </td>
                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#modalImgDestaque{{ $indice }}">IMG</a></td>
                    </tr>

                    <div class="modal fade" id="modalImgDestaque{{ $indice }}" tabindex="-1" aria-labelledby="modalImgDestaqueLabel{{ $indice }}" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalImgDestaqueLabel{{ $indice }}">Imagem em Destaque</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <figure class="figure">
                                        <img src="{{ isset($dadoProjeto->ds_url_img_destaque) ? asset_path("storage/$dadoProjeto->ds_url_img_destaque") : asset_path('default/default-projeto.png') }}" class="figure-img img-fluid rounded" alt="Imagem em Destaque">
                                        <figcaption class="figure-caption">Imagem em Destaque</figcaption>
                                    </figure>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            <span class="text-warning fw-bold fs-6"> <i class="bi bi-exclamation-diamond-fill"></i> Nenhum dado encontrado</span> 
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <p>
        {{ $portfolio->links() }}
        <b>Exibindo {{ $portfolio->count() }} registros de {{ $portfolio->total() }} (De {{ $portfolio->firstItem() }} a {{ $portfolio->lastItem() }})</b>
    </p>

@endsection
