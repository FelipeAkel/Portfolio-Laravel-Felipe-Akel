@extends('template-admin.layout.index')

@section('active-servicos', 'active')

@section('titulo-pag', 'Visualizar Registro - Serviço')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2><small class="text-body-secondary">Visualizar Registro</small> - Serviço</h2>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('servicos.index') }}">Serviço</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('servicos.show', $servico->id ) }}">Visualizar Registro</a></li>
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
                        
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Serviço </label>
                            <input type="text" class="form-control" value="{{ $servico->no_servico }}" disabled>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Data Criação</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
                                <input type="date-time" class="form-control" value="{{ \Carbon\Carbon::parse($servico->created_at)->format('d/m/Y - H:i')}}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Data de Atualização</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
                                <input type="date-time" class="form-control" value="{{ \Carbon\Carbon::parse($servico->updated_at)->format('d/m/Y - H:i')}}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label class="form-label">Descrição</label>
                            <textarea class="form-control" rows="3" disabled>{{ $servico->ds_servico }}</textarea>
                        </div>

                        <h5 class="titulo-1rem">Imagens do Projeto</h5>

                        <div class="mb-3 col-md-3">
                            <div class="card text-center" style="width: 18rem;">
                                <img src="{{ isset($servico->ds_url_icon_svg) ? asset_path("storage/$servico->ds_url_icon_svg") : asset_path('default/default-icon.svg') }}" class="card-img-top img-proporcao-icon" alt="Icone de Serviço">
                                <div class="card-body">
                                    <p class="card-text">Icone de Serviço</p>
                                </div>
                            </div>
                        </div>
                            @if (isset($servico->ds_url_img))
                            <div class="mb-3 col-md-3">
                                <div class="card text-center" style="width: 18rem;">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalImgDestaque">
                                        <img src="{{ asset_path('storage/') }}/{{ $servico->ds_url_img }}" class="card-img-top img-proporcao" alt="Imagem em Destaque">
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text">Imagem em Destaque</p>
                                        <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalImgDestaque">
                                            <i class="bi bi-search"></i> Ampliar
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif

                        <div class="col-12">
                            <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>
                
                </div>
                <div class="card-footer text-body-secondary">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if (isset($servico->ds_url_img))
    <div class="modal fade" id="modalImgDestaque" tabindex="-1" aria-labelledby="modalImgDestaqueLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalImgDestaqueLabel">Imagem em Destaque</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <figure class="figure">
                    <img src="{{ asset_path('storage/') }}/{{ $servico->ds_url_img }}" class="figure-img img-fluid rounded" alt="Imagem em Destaque">
                    <figcaption class="figure-caption">Imagem em Destaque</figcaption>
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