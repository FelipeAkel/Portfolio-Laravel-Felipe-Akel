@extends('template-admin.layout.index')

@section('titulo-pag', 'Habilidade')

@section('conteudo')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Habilidade</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('habilidade.create') }}" class="btn btn-success">Novo Registro</a>
            </div>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('habilidade.index') }}">Habilidade</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">

            <div class="accordion" id="accordionFiltro">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFiltro" aria-expanded="false" aria-controls="collapseFiltro">
                            Filtros
                        </button>
                    </h2>
                    <div id="collapseFiltro" class="accordion-collapse collapse" data-bs-parent="#accordionFiltro">
                        <div class="accordion-body">

                            <form class="row g-3">
                                <div class="mb-3 col-md-3">
                                    <label for="id_tipo_habilidade" class="form-label">Tipo Experiência</label>
                                    <select name="id_tipo_habilidade" id="id_tipo_habilidade" class="form-select">
                                        <option>.. Selecione ..</option>
                                        @foreach ($retornoTipoHabilidade AS $indice => $tipoHabilidade )
                                            <option value="{{ $tipoHabilidade->id }}">{{ $tipoHabilidade->no_tipo_habilidade }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="nr_porcentagem" class="form-label">Porcentagem</label>
                                    <select name="nr_porcentagem" id="nr_porcentagem" class="form-select">
                                        <option>.. Selecione ..</option>
                                        <option value="0">0%</option>
                                        <option value="25">25%</option>
                                        <option value="50">50%</option>
                                        <option value="75">75%</option>
                                        <option value="100">100%</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Data Criação</label>
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control" name="dt_created_inicio" >
                                        <span class="input-group-text icone"><i class="bi bi-calendar4-week"></i></span>
                                        <input type="date" class="form-control" name="dt_created_final">
                                    </div>
                                    {{-- <div class="form-text" >Entre as data X e Y</div> --}}
                                </div>
                                <div class="mb-3 col-12">
                                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <hr class="border border-2 opacity-50">

    <h5 class="titulo-1rem">Resultado</h5>
    <div class="table-responsive ">
        <table class="table table-hover table-bordered border ">
            <thead class="table-primary">
                <tr>
                    <th scope="col" width="200px">Ações</th>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo Habilidade</th>
                    <th scope="col">Habilidade</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Porcentagem</th>
                    <th scope="col">Data de Criação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($retornoHabilidade AS $indice => $dadosHabilidade)
                <tr>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group me-2" role="group" aria-label="Second group">
                                <a href="{{ route('habilidade.edit', $dadosHabilidade->id) }}" class="btn btn-primary btn-sm" 
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-edit"
                                    data-bs-title="Editar Registro"
                                ><i class="bi bi-pencil-square"></i></a>
                            </div>
                            <div class="btn-group me-2" role="group" aria-label="Third group">
                                <form id="form_delete_{{ $dadosHabilidade->id }}" action="{{ route('habilidade.delete', $dadosHabilidade->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a onclick="document.getElementById('form_delete_{{ $dadosHabilidade->id }}').submit()"
                                        class="btn btn-danger btn-sm" 
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-delete"
                                        data-bs-title="Deletar Registro"
                                    ><i class="bi bi-trash"></i></a>
                                </form>
                            </div>
                        </div>
                    </td>
                    <td>{{ $dadosHabilidade->id }}</td>
                    <td>{{ $dadosHabilidade->tipoHabilidade->no_tipo_habilidade }}</td>
                    <td>{{ $dadosHabilidade->no_habilidade }}</td>
                    <td>{{ $dadosHabilidade->ds_habilidade }}</td>
                    <td>
                        @switch($dadosHabilidade->nr_porcentagem)
                            @case(0)
                                <span class="badge text-bg-danger">{{ $dadosHabilidade->nr_porcentagem }}%</span>
                                @break
                            @case(25)
                                <span class="badge text-bg-danger">{{ $dadosHabilidade->nr_porcentagem }}%</span>
                                @break
                            @case(50)
                                <span class="badge text-bg-warning">{{ $dadosHabilidade->nr_porcentagem }}%</span>
                                @break
                            @case(75)
                                <span class="badge text-bg-success">{{ $dadosHabilidade->nr_porcentagem }}%</span>
                                @break
                            @case(100)
                                <span class="badge text-bg-success">{{ $dadosHabilidade->nr_porcentagem }}%</span>
                                @break
                            @default
                                {{ $dadosHabilidade->nr_porcentagem }}%
                        @endswitch
                    </td>
                    <td>{{ $dadosHabilidade->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <p>
        {{ $retornoHabilidade->links() }}
        <b>Exibindo {{ $retornoHabilidade->count() }} registros de {{ $retornoHabilidade->total() }} (De {{ $retornoHabilidade->firstItem() }} a {{ $retornoHabilidade->lastItem() }})</b>
    </p>
@endsection
