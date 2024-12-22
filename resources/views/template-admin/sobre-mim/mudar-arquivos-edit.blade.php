@extends('template-admin.sobre-mim.index')

@section('active-sobre-mim', 'active')

@section('active-mudar-arquivos', 'active')

@section('conteudo-sobre-mim')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Mudar Arquivos</h2>
    </div>

    <div class="row padding-top-2em">
        <div class="col-12">
            <div class="card bg-info bg-opacity-10 border-info">
                <h5 class="card-header titulo-1rem">
                    Formulário de Atualização
                </h5>
                <div class="card-body">
                    @component('template-admin.sobre-mim.component.form-edit-mudar-arquivos', ['update' => true, 'sobreMim' => $sobreMim])
                    @endcomponent
                </div>
                <div class="card-footer text-body-secondary">
                </div>
            </div>
        </div>
    </div>
@endsection
