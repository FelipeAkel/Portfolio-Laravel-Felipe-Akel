@extends('template-admin.layout.index')

@section('titulo-pag', 'Serviços')

@section('conteudo')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Serviços</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-success">Novo Registro</button>
            </div>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ route('servicos.index') }}">Serviços</a></li>
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
                    <th scope="col">Serviço</th>
                    <th scope="col">Icone</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Data Criação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicos AS $indice => $dadoServico )
                <tr>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group me-2" role="group" aria-label="First group">
                                <a href="{{ route('servicos.show', $dadoServico->id) }}" class="btn btn-info btn-sm" 
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-info"
                                    data-bs-title="Visualizar Registro"
                                ><i class="bi bi-card-text"></i></a>
                            </div>
                            <div class="btn-group me-2" role="group" aria-label="Second group">
                                <button type="button" class="btn btn-primary btn-sm" 
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-edit"
                                    data-bs-title="Editar Registro"
                                ><i class="bi bi-pencil-square"></i></button>
                            </div>
                            <div class="btn-group me-2" role="group" aria-label="Third group">
                                <button type="button" class="btn btn-danger btn-sm" 
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-delete"
                                    data-bs-title="Deletar Registro"
                                ><i class="bi bi-trash"></i></button>
                            </div>
                        </div>
                    </td>
                    <td>{{ $dadoServico->id }}</td>
                    <td>{{ $dadoServico->no_servico }}</td>
                    <td>{{ $dadoServico->ds_url_icon_svg }}</td>
                    <td>{{ $dadoServico->ds_url_img }}</td>
                    <td>{{ $dadoServico->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <p>
        {{ $servicos->links() }}
        <b>Exibindo {{ $servicos->count() }} registros de {{ $servicos->total() }} (De {{ $servicos->firstItem() }} a {{ $servicos->lastItem() }})</b>
    </p>
@endsection
