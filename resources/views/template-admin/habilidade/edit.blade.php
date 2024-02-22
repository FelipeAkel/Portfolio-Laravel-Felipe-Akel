@extends('template-admin.layout.index')

@section('titulo-pag', 'Atualizar Registro - Habilidade')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2><small class="text-body-secondary">Atualizar Registro</small> - Habilidade</h2>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('habilidade.index') }}">Habilidade</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('habilidade.edit', $habilidade->id) }}">Atualizar Registro</a></li>
        </ol>
    </nav>

    <div class="row padding-top-2em">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header titulo-1rem">
                    Formulário de Atualizacao
                </h5>
                <div class="card-body">

                    @component('template-admin.habilidade.component.form-create-edit', ['retornoTipoHabilidade' => $retornoTipoHabilidade, 'habilidade' => $habilidade])
                    @endcomponent
                
                </div>
                <div class="card-footer text-body-secondary">
                </div>
            </div>
        </div>
    </div>
@endsection