@extends('template-admin.layout.index')

@section('titulo-pag', 'Portfólio')

@section('conteudo')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Portfólio</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('portfolio.create') }}" class="btn btn-success">Novo Registro</a>
            </div>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('portfolio.index') }}">Portfólio</a></li>
        </ol>
    </nav>

    <hr class="border border-2 opacity-50">

    <h5 class="">Resultado</h5>
    <div class="table-responsive ">
        <table class="table table-hover table-bordered border ">
            <thead class="table-primary">
                <tr>
                    <th scope="col" width="200px">Ações</th>
                    <th scope="col">ID</th>
                    <th scope="col">Projeto</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">URL Projeto</th>
                    <th scope="col">URL Repositório</th>
                    <th scope="col">IMG Destaque</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($portfolio AS $indice => $dadoProjeto )
                    <tr>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group me-2" role="group" aria-label="First group">
                                    <a href="{{ route('portfolio.show', $dadoProjeto->id) }}" class="btn btn-info btn-sm" 
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-info"
                                        data-bs-title="Visualizar Registro"
                                    ><i class="bi bi-card-text"></i></a>
                                </div>
                                <div class="btn-group me-2" role="group" aria-label="Second group">
                                    <a href="{{ route('portfolio.edit', $dadoProjeto->id) }}" class="btn btn-primary btn-sm" 
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-edit"
                                        data-bs-title="Editar Registro"
                                    ><i class="bi bi-pencil-square"></i></a>
                                </div>
                                <div class="btn-group me-2" role="group" aria-label="Third group">
                                    <button type="button" class="btn btn-danger btn-sm" 
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-delete"
                                        data-bs-title="Deletar Registro"
                                    ><i class="bi bi-trash"></i></button>
                                </div>
                                <div class="btn-group" role="group" aria-label="Four group">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-dark"
                                        data-bs-title="Outras Ações"
                                    ><i class="bi bi-suit-heart-fill"></i></button>
                                </div>
                            </div>
                        </td>
                        <td>{{ $dadoProjeto->id }}</td>
                        <td>{{ $dadoProjeto->no_projeto }}</td>
                        <td>{{ $dadoProjeto->ds_tipo_projeto }}</td>
                        <td><a href="{{ $dadoProjeto->ds_url_projeto }}" target="_blank">Link</a></td>
                        <td><a href="{{ $dadoProjeto->ds_url_repositorio }}" target="_blank">Link</a></td>
                        <td>IMG</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <p>
        {{ $portfolio->links() }}
        <b>Exibindo {{ $portfolio->count() }} registros de {{ $portfolio->total() }} (De {{ $portfolio->firstItem() }} a {{ $portfolio->lastItem() }})</b>
    </p>
@endsection
