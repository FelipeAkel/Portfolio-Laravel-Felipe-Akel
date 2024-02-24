@extends('template-admin.layout.index')

@section('titulo-pag', 'Fale Conosco')

@section('conteudo')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Fale Conosco</h2>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('fale-conosco.index') }}">Fale Conosco</a></li>
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
                                <div class="col-md-3">
                                    <label for="id_status" class="form-label">Status</label>
                                    <select name="id_status" id="id_status" class="form-select">
                                        <option>..Selecione..</option>
                                        @foreach ($status AS $indice => $dadoStatus )
                                            <option value="{{ $dadoStatus->id }}">{{ $dadoStatus->no_status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Data Criação</label>
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control" name="dt_created_inicio" >
                                        <span class="input-group-text icone"><i class="bi bi-calendar4-week"></i></span>
                                        <input type="date" class="form-control" name="dt_created_final">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Pesquisar </button>
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
                    <th scope="col">Status</th>
                    <th scope="col">Internauta</th>
                    <th scope="col">Assunto</th>
                    <th scope="col">Data Criação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faleConosco AS $indice => $dadoFaleConosco )
                <tr 
                    @switch($dadoFaleConosco->id_status)
                        @case(1)
                            class="table-primary"
                            @break
                        @case(2)
                            class="table-warning"
                            @break
                        @case(3)
                            class="table-dark"
                            @break
                        @case(4)
                            class="table-success"
                            @break
                        @case(5)
                            class="table-danger"
                            @break
                        @default
                            
                    @endswitch
                >
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group me-2" role="group" aria-label="First group">
                                <a href="{{ route('fale-conosco.show', $dadoFaleConosco->id) }}" class="btn btn-info btn-sm" 
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-info"
                                    data-bs-title="Visualizar Registro"
                                ><i class="bi bi-card-text"></i></a>
                            </div>
                            <div class="btn-group" role="group" aria-label="Four group">
                                <a href="{{ route('fale-conosco.responder', $dadoFaleConosco->id) }}" class="btn btn-secondary btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-dark"
                                    data-bs-title="Responder"
                                ><i class="bi bi-chat-text-fill"></i></a>
                            </div>
                        </div>
                    </td>
                    <td>{{ $dadoFaleConosco->id }}</td>
                    <td>{{ $dadoFaleConosco->no_status }}</td>
                    <td>{{ $dadoFaleConosco->no_contato }}</td>
                    <td>{{ $dadoFaleConosco->ds_assunto }}</td>
                    <td>{{ $dadoFaleConosco->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <p>
        {{ $faleConosco->links() }}
        <b>Exibindo {{ $faleConosco->count() }} registros de {{ $faleConosco->total() }} (De {{ $faleConosco->firstItem() }} a {{ $faleConosco->lastItem() }})</b>
    </p>
@endsection
