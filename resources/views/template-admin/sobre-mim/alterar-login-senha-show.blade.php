@extends('template-admin.sobre-mim.index')

@section('active-sobre-mim', 'active')

@section('active-login-senha', 'active')

@section('conteudo-sobre-mim')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Alterar Login e Senha</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('sobre-mim.alterar-login-senha-edit') }}" class="btn btn-primary">Atualizar Dados</a>
        </div>
    </div>
</div>

<div class="row padding-top-2em">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header titulo-1rem">
                Visualizar Dados
            </h5>
            <div class="card-body">
                @component('template-admin.sobre-mim.component.form-edit-alterar-login-senha', ['update' => false, 'sobreMim' => $sobreMim])
                @endcomponent
            </div>
            <div class="card-footer text-body-secondary">
            </div>
        </div>
    </div>
</div>
@endsection