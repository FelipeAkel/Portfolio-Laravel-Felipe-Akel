@extends('template-admin.layout.index')

@section('titulo-pag', 'Visualizar Registro - Portfólio')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2><small class="text-body-secondary">Visualizar Registro</small> - Portfólio</h2>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('portfolio.index') }}">Portfólio</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('portfolio.show') }}">Visualizar Registro</a></li>
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
                                <input class="form-check-input" type="checkbox" checked disabled>
                                <label class="form-check-label" for="tipo_php_laravel">
                                    PHP | Laravel
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked disabled>
                                <label class="form-check-label" for="tipo_wevsite">
                                    Website
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked disabled>
                                <label class="form-check-label" for="tipo_landing_page">
                                    Landing Page
                                </label>
                            </div>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label">Nome Projeto </label>
                            <input type="text" class="form-control" value="Gestão Musical - GM" disabled>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label">Nome do Cliente </label>
                            <input type="text" class="form-control" value="Fulano da Silva" disabled>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Data Início </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
                                <input type="text" class="form-control" value="20/02/2024" disabled>
                            </div>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Data Finalização </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
                                <input type="text" class="form-control" value="20/02/2024" disabled>
                            </div>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">URL do Projeto</label>
                            <div class="input-group">
                                <a class="btn btn-outline-secondary disabled" href="#" target="_blank">Acessar URL</a>
                                <input type="text" class="form-control" value="URL" disabled> 
                            </div>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">URL do Repositório</label>
                            <div class="input-group">
                                <a class="btn btn-outline-secondary disabled" href="#" target="_blank">Acessar URL</a>
                                <input type="text" class="form-control" value="URL" disabled> 
                            </div>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label class="form-label">Descrição do Projeto</label>
                            <textarea class="form-control" rows="3" disabled>Descrição Projeto</textarea>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label class="form-label">Descrição Tecnologia</label>
                            <textarea class="form-control" rows="3" disabled>Descrição Tecnologia</textarea>
                        </div>

                        <h5 class="titulo-1rem">Imagens do Projeto</h5>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Upload IMG - Destaque</label>
                            <input class="form-control" type="file" >
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Upload IMG - Modal</label>
                            <input class="form-control" type="file" multiple>
                            <div class="form-text">
                                Recomendável até 3 imagens.
                            </div>
                        </div>

                        <div class="mb-3 col-md-3">
                            <figure class="figure">
                                <img src="{{ asset('template-internauta/img/portfolio/') }}/1.jpg" class="img-thumbnail img-destaque" alt="...">
                                <figcaption class="figure-caption">Destaque</figcaption>
                            </figure>
                        </div>
                        <div class="mb-3 col-md-3">
                            <figure class="figure">
                                <img src="{{ asset('template-internauta/img/portfolio/') }}/1.jpg" class="img-thumbnail" alt="...">
                                <figcaption class="figure-caption">Modal</figcaption>
                            </figure>
                        </div>
                        <div class="mb-3 col-md-3">
                            <figure class="figure">
                                <img src="{{ asset('template-internauta/img/portfolio/') }}/1.jpg" class="img-thumbnail" alt="...">
                                <figcaption class="figure-caption">Modal</figcaption>
                            </figure>
                        </div>
                        <div class="mb-3 col-md-3">
                            <figure class="figure">
                                <img src="{{ asset('template-internauta/img/portfolio/') }}/1.jpg" class="img-thumbnail" alt="...">
                                <figcaption class="figure-caption">Modal</figcaption>
                            </figure>
                        </div>
                    </form>
                
                </div>
                <div class="card-footer text-body-secondary">
                </div>
            </div>
        </div>
    </div>
@endsection