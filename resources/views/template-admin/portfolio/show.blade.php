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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" {{ $portfolio->tipo_angular == 'angular' ? 'checked' : '' }} disabled>
                                <label class="form-check-label" for="tipo_angular">
                                    Angular
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
                            <div class="card text-center border-warning" style="width: 18rem;">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalImgDestaque">
                                    <img src="{{ isset($portfolio->ds_url_img_destaque) ? asset("storage/$portfolio->ds_url_img_destaque") : asset('default/default-projeto.png') }}" class="card-img-top img-proporcao" alt="Imagem em Destaque">
                                </a>
                                <div class="card-body text-warning">
                                    <p class="card-text">Imagem em Destaque</p>
                                    <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalImgDestaque">
                                        <i class="bi bi-search"></i> Ampliar
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        @if (isset($portfolio->ds_url_img_1_galeria))
                            <div class="mb-3 col-md-3">
                                <div class="card text-center" style="width: 18rem;">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalImgGaleria1">
                                        <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_1_galeria }}" class="card-img-top img-proporcao" alt="1º Imagem Galeria Modal">
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text">1º Imagem da Galeria Modal</p>
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalImgGaleria1">
                                            <i class="bi bi-search"></i> Ampliar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (isset($portfolio->ds_url_img_2_galeria))
                            <div class="mb-3 col-md-3">
                                <div class="card text-center" style="width: 18rem;">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalImgGaleria2">
                                        <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_2_galeria }}" class="card-img-top img-proporcao" alt="2º Imagem Galeria Modal">
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text">2º Imagem da Galeria Modal</p>
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalImgGaleria2">
                                            <i class="bi bi-search"></i> Ampliar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (isset($portfolio->ds_url_img_3_galeria))
                            <div class="mb-3 col-md-3">
                                <div class="card text-center" style="width: 18rem;">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalImgGaleria3">
                                        <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_3_galeria }}" class="card-img-top img-proporcao" alt="3º Imagem Galeria Modal">
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text">3º Imagem da Galeria Modal</p>
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalImgGaleria3">
                                            <i class="bi bi-search"></i> Ampliar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif

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


    <!-- Modal -->
    <div class="modal fade" id="modalImgDestaque" tabindex="-1" aria-labelledby="modalImgDestaqueLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalImgDestaqueLabel">Imagem em Destaque</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <figure class="figure">
                    <img src="{{ isset($portfolio->ds_url_img_destaque) ? asset("storage/$portfolio->ds_url_img_destaque") : asset('default/default-projeto.png') }}" class="figure-img img-fluid rounded" alt="Imagem em Destaque">
                    <figcaption class="figure-caption">Imagem em Destaque</figcaption>
                </figure>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
    </div>
    @if (isset($portfolio->ds_url_img_1_galeria))
    <div class="modal fade" id="modalImgGaleria1" tabindex="-1" aria-labelledby="modalImgGaleria1Label" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalImgGaleria1Label">1º Imagem Galeria Modal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <figure class="figure">
                    <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_1_galeria }}" class="figure-img img-fluid rounded" alt="1º Imagem Galeria Modal">
                    <figcaption class="figure-caption">1º Imagem Galeria Modal</figcaption>
                </figure>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
    </div>
    @endif
    @if (isset($portfolio->ds_url_img_2_galeria))
    <div class="modal fade" id="modalImgGaleria2" tabindex="-1" aria-labelledby="modalImgGaleria2Label" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalImgGaleria2Label">2º Imagem Galeria Modal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <figure class="figure">
                    <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_2_galeria }}" class="figure-img img-fluid rounded" alt="2º Imagem Galeria Modal">
                    <figcaption class="figure-caption">2º Imagem Galeria Modal</figcaption>
                </figure>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
    </div>
    @endif
    @if (isset($portfolio->ds_url_img_3_galeria))
    <div class="modal fade" id="modalImgGaleria3" tabindex="-1" aria-labelledby="modalImgGaleria3Label" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalImgGaleria3Label">3º Imagem Galeria Modal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <figure class="figure">
                    <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_3_galeria }}" class="figure-img img-fluid rounded" alt="3º Imagem Galeria Modal">
                    <figcaption class="figure-caption">3º Imagem Galeria Modal</figcaption>
                </figure>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
    </div>
    @endif
@endsection