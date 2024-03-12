@extends('template-admin.layout.index')

@section('active-portfolio', 'active')

@section('titulo-pag', 'Visualizar Registro - Portfólio')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2><small class="text-body-secondary">Visualizar Registro</small> - Portfólio</h2>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('portfolio.index') }}">Portfólio</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('portfolio.show', $portfolio->id) }}">Visualizar Registro</a></li>
        </ol>
    </nav>

    <div class="row padding-top-2em">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header titulo-1rem">
                    Dados do Registro
                </h5>
                <div class="card-body">

                    <form class="row g-3" >

                        <div class="mb-3 col-md-4">
                            <label for="st_trabalho_atual" class="form-label">Tipo de Projeto</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" {{ $portfolio->tipo_php_laravel == 'php-laravel' ? 'checked' : '' }} disabled>
                                <label class="form-check-label" for="tipo_php_laravel">
                                    PHP | Laravel
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" {{ $portfolio->tipo_website == 'website' ? 'checked' : '' }} disabled>
                                <label class="form-check-label" for="tipo_website">
                                    Website
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" {{ $portfolio->tipo_landing_page == 'landing-page' ? 'checked' : '' }} disabled>
                                <label class="form-check-label" for="tipo_landing_page">
                                    Landing Page
                                </label>
                            </div>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label">Nome Projeto </label>
                            <input type="text" class="form-control" value="{{ $portfolio->no_projeto }}" disabled>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label">Nome do Cliente </label>
                            <input type="text" class="form-control" value="{{ $portfolio->no_cliente }}" disabled>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Data Início </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
                                <input type="date" class="form-control" value="{{ $portfolio->dt_inicio }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Data Finalização </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
                                <input type="date" class="form-control" value="{{ $portfolio->dt_finalizacao }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">URL do Projeto</label>
                            <div class="input-group">
                                <a class="btn btn-outline-secondary {{ empty($portfolio->ds_url_projeto) ? 'disabled' : '' }}" href="#" target="_blank">Acessar URL</a>
                                <input type="text" class="form-control" value="{{ $portfolio->ds_url_projeto }}" disabled> 
                            </div>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">URL do Repositório</label>
                            <div class="input-group">
                                <a class="btn btn-outline-secondary {{ empty($portfolio->ds_url_repositorio) ? 'disabled' : '' }}" href="#" target="_blank">Acessar URL</a>
                                <input type="text" class="form-control" value="{{ $portfolio->ds_url_repositorio }}" disabled> 
                            </div>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label class="form-label">Descrição do Projeto</label>
                            <textarea class="form-control" rows="3" disabled>{{ $portfolio->ds_projeto }}</textarea>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label class="form-label">Descrição Tecnologia</label>
                            <textarea class="form-control" rows="3" disabled>{{ $portfolio->ds_tecnologia }}</textarea>
                        </div>

                        <h5 class="titulo-1rem">Imagens do Projeto</h5>

                        <div class="mb-3 col-md-3">
                            <figure class="figure">
                                <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_destaque }}" class="img-thumbnail img-destaque" alt="...">
                                <figcaption class="figure-caption">Imagem Destaque</figcaption>
                            </figure>
                        </div>
                        <div class="mb-3 col-md-3">
                            <figure class="figure">
                                <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_1_galeria }}" class="img-thumbnail" alt="...">
                                <figcaption class="figure-caption">1º Imagem</figcaption>
                            </figure>
                        </div>
                        <div class="mb-3 col-md-3">
                            <figure class="figure">
                                <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_2_galeria }}" class="img-thumbnail" alt="...">
                                <figcaption class="figure-caption">2º Imagem</figcaption>
                            </figure>
                        </div>
                        <div class="mb-3 col-md-3">
                            <figure class="figure">
                                <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_3_galeria }}" class="img-thumbnail" alt="...">
                                <figcaption class="figure-caption">3º Imagem</figcaption>
                            </figure>
                        </div>

                        <div class="col-12">
                            <a href="{{ route('portfolio.index') }}" class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>
                
                </div>
                <div class="card-footer text-body-secondary">
                </div>
            </div>
        </div>
    </div>
@endsection