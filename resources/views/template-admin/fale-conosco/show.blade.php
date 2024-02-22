@extends('template-admin.layout.index')

@section('titulo-pag', 'Visualizar Registro - Fale Conosco')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2><small class="text-body-secondary">Visualizar Registro</small> - Fale Conosco</h2>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('fale-conosco.index') }}">Fale Conosco</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('fale-conosco.show', $faleConosco->id ) }}">Visualizar Registro</a></li>
        </ol>
    </nav>

    @include('template-admin.fale-conosco.include.dados-registro-fale-conosco')

    @include('template-admin.fale-conosco.include.historico-resposta')

@endsection