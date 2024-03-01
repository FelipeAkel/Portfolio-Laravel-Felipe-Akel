@extends('template-admin.layout.index')

@section('active-fale-conosco', 'active')

@section('titulo-pag', 'Visualizar Registro - Responder')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2><small class="text-body-secondary">Visualizar Registro</small> - Responder</h2>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('fale-conosco.index') }}">Fale Conosco</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('fale-conosco.show', $faleConosco->id ) }}">Responder Registro</a></li>
        </ol>
    </nav>

    @include('template-admin.fale-conosco.include.dados-registro-fale-conosco')

    <div class="row padding-top-2em">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header titulo-1rem">
                    Formulário Responder Fale Conosco
                </h5>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('fale-conosco.resposta-store', $faleConosco->id) }}" method="POST" >
                        @csrf
                        <div class="mb-3 col-md-3">
                            <label for="id_status" class="form-label">Status <span class="required">*</span></label>
                            <select name="id_status" id="id_status" class="form-select {{ $errors->has('id_status') ? 'is-invalid' : '' }}">
                                <option value="">..Selecione..</option>
                                @foreach ($status AS $indice => $dadoStatus )
                                    <option value="{{ $dadoStatus->id }}" {{ $faleConosco->id_status == $dadoStatus->id ? 'selected' : '' }} >{{ $dadoStatus->no_status }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('id_status'))
                            <div class="invalid-feedback">
                                {{ $errors->first('id_status') }}
                            </div>
                            @endif
                        </div>

                        <div class="mb-3 col-md-3">
                            <label for="st_notificacao_email" class="form-label">Notificação por E-mail <span class="required">*</span></label>
                            <select name="st_notificacao_email" id="st_notificacao_email" class="form-select {{ $errors->has('st_notificacao_email') ? 'is-invalid' : '' }}">
                                <option value="">..Selecione..</option>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                            @if ($errors->has('st_notificacao_email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('st_notificacao_email') }}
                            </div>
                            @endif
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="ds_resposta" class="form-label">Descrição da Resposta <span class="required">*</span></label>
                            <textarea name="ds_resposta" id="ds_resposta" class="form-control {{ $errors->has('ds_resposta') ? 'is-invalid' : '' }}" rows="3" ></textarea>
                            @if ($errors->has('ds_resposta'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ds_resposta') }}
                            </div>
                            @endif
                        </div>

                        <div class="col-12">
                            <a href="{{ route('fale-conosco.index') }}" class="btn btn-secondary">Voltar</a>
                            <button type="submit" class="btn btn-success">Responder</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-body-secondary">
                </div>
            </div>
        </div>
    </div>
    
    @include('template-admin.fale-conosco.include.historico-resposta')

@endsection