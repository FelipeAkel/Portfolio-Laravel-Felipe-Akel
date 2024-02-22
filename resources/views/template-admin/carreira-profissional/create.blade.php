@extends('template-admin.layout.index')

@section('titulo-pag', 'Cadastrar Registro - Carreira Profissional')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2><small class="text-body-secondary">Cadastrar Registro</small> - Carreira Profissional</h2>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('carreira-profissional.index') }}">Carreira Profissional</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('carreira-profissional.create') }}">Cadastrar Registro</a></li>
        </ol>
    </nav>

    <div class="row padding-top-2em">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header titulo-1rem">
                    Formulário de Cadastro
                </h5>
                <div class="card-body">

                    @component('template-admin.carreira-profissional.component.form-create-edit', ['retornoTipoExperiencia' => $retornoTipoExperiencia])
                    @endcomponent
                
                </div>
                <div class="card-footer text-body-secondary">
                </div>
            </div>
        </div>
    </div>
@endsection