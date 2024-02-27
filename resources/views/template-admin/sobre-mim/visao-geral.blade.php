@extends('template-admin.sobre-mim.index')

@section('active-visao-geral', 'active')

@section('conteudo-sobre-mim')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Logs do Sistema</h2>
</div>

    
    <div class="list-group">
        <a class="list-group-item list-group-item-action list-group-item-success" >
            <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Cadastro de Registros</h5>
            <small>20/02/2024</small>
            </div>
            <p class="mb-1">Carreira Profissional</p>
        </a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-primary">
            <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Atualização de Registro</h5>
            <small class="text-body-secondary">19/02/2024</small>
            </div>
            <p class="mb-1">Habilidades</p>
        </a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-danger">
            <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Delete de Registro</h5>
            <small class="text-body-secondary">15/022024</small>
            </div>
            <p class="mb-1">Serviço</p>
        </a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-info">
            <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Fale Conosco Respondido</h5>
            <small class="text-body-secondary">15/022024</small>
            </div>
            <p class="mb-1">Serviço</p>
        </a>
    </div>
    
    {{-- <p>
        {{ $portfolio->links() }}
        <b>Exibindo {{ $portfolio->count() }} registros de {{ $portfolio->total() }} (De {{ $portfolio->firstItem() }} a {{ $portfolio->lastItem() }})</b>
    </p> --}}
@endsection