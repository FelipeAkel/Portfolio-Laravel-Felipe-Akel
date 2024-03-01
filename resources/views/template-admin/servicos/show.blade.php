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
                                <input type="date-time" class="form-control" value="{{ $servico->created_at }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Data de Atualização</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
                                <input type="date-time" class="form-control" value="{{ $servico->updated_at }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label class="form-label">Descrição</label>
                            <textarea class="form-control" rows="3" disabled>{{ $servico->ds_servico }}</textarea>
                        </div>

                        <div class="mb-3 col-md-6">
                            <div class="d-grid gap-2">
                                <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIcone" aria-expanded="false" aria-controls="collapseIcone">
                                    Imagem Icone
                                </button>
                            </div>
                            <div class="collapse" id="collapseIcone">
                                <div class="card card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('template-internauta/img/svg/') }}/web.svg" class="rounded img-icon" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3 col-md-6">
                            <div class="d-grid gap-2">
                                <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseImgDestaque" aria-expanded="false" aria-controls="collapseImgDestaque">
                                    Imagem Destaque
                                </button>
                            </div>
                            <div class="collapse" id="collapseImgDestaque">
                                <div class="card card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('template-internauta/img/service/') }}/1.jpg" class="rounded img-servico" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>

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
@endsection