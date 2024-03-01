@extends('template-admin.layout.index')

@section('active-carreira-profissional', 'active')

@section('titulo-pag', 'Visualizar Registro - Carreira Profissional')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2><small class="text-body-secondary">Visualizar Registro</small> - Carreira Profissional</h2>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('carreira-profissional.index') }}">Carreira Profissional</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('carreira-profissional.show', $carreiraProfissional->id ) }}">Visualizar Registro</a></li>
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
                            <label class="form-label">Tipo Experiência </label>
                            <select class="form-select" disabled>
                                <option >{{ $carreiraProfissional->tipoExperiencia->no_tipo_experiencia }}</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label">Nome Experiência </label>
                            <input type="text" class="form-control" value="{{ $carreiraProfissional->no_experiencia }}" disabled>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label">Nome Empresa </label>
                            <input type="text" class="form-control" value="{{ $carreiraProfissional->no_empresa }}" disabled>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Data Início </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
                                <input type="date" class="form-control" value="{{ $carreiraProfissional->dt_inicio }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Data Final</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
                                <input type="date" class="form-control" value="{{ $carreiraProfissional->dt_final }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 col-md-2">
                            <label class="form-label">Nº de horas aulas</label>
                            <input type="number" step="0.01" class="form-control" value="{{ $carreiraProfissional->nr_total_horas }}" disabled>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label">URL do certificado</label>
                            <div class="input-group">
                                <a class="btn btn-outline-secondary {{ isset($carreiraProfissional->ds_url) ? '' : 'disabled' }}" href="{{ isset($carreiraProfissional->ds_url) ?? '#' }}" target="_blank">Acessar URL</a>
                                <input type="text" class="form-control" value="{{ $carreiraProfissional->ds_url }}" disabled> 
                            </div>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="st_trabalho_atual" class="form-label">Trabalho atualmente neste cargo?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" {{ $carreiraProfissional->st_trabalho_atual == 1 ? 'checked' : '' }} disabled>
                                <label class="form-check-label" for="sim">
                                    Sim
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" {{ $carreiraProfissional->st_trabalho_atual == 0 ? 'checked' : '' }} disabled>
                                <label class="form-check-label" for="nao">
                                    Não
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-3 col-md-8">
                            <label class="form-label">Descrição</label>
                            <textarea class="form-control" rows="3" disabled>{{ $carreiraProfissional->ds_formacao }}</textarea>
                        </div>

                        <div class="col-12">
                            <a href="{{ route('carreira-profissional.index') }}" class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>
                
                </div>
                <div class="card-footer text-body-secondary">
                </div>
            </div>
        </div>
    </div>
@endsection