@extends('template-admin.layout.index')

@section('titulo-pag', 'Carreira Profissional')

@section('conteudo')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Carreira Profissional</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('carreira-profissional.create') }}" class="btn btn-success">Novo Registro </a>
            </div>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ route('carreira-profissional.index') }}">Carreira Profissional</a></li>
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

                            <form action="{{ route('carreira-profissional.index') }}" method="GET" class="row g-3">
                                <div class="col-md-4">
                                    <label for="no_experiencia" class="form-label">Nome Experiência</label>
                                    <input type="text" class="form-control" name="no_experiencia" id="no_experiencia">
                                    <div class="form-text">Dica: Nome do curso, certificado, cargo</div>

                                </div>
                                <div class="col-md-2">
                                    <label for="dt_inicio" class="form-label">Data Início</label>
                                    <input type="date" class="form-control" name="dt_inicio" id="dt_inicio">
                                </div>
                                <div class="col-md-2">
                                    <label for="dt_final" class="form-label">Data Final</label>
                                    <input type="date" class="form-control" name="dt_final" id="dt_final">
                                </div>
                                <div class="col-md-4">
                                    <label for="id_tipo_experiencia" class="form-label">Tipo Experiência</label>
                                    <select name="id_tipo_experiencia" id="id_tipo_experiencia" class="form-select">
                                        <option selected>.. Selecione ..</option>
                                        @foreach ($retornoTipoExperiencia as $indice => $dadosTipoExp)
                                            <option value="{{ $dadosTipoExp->id }}">{{ $dadosTipoExp->no_tipo_experiencia }}</option>
                                        @endforeach
                                    </select>
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


    <h5 class="">Resultado</h5>
    <div class="table-responsive ">
        <table class="table table-hover table-bordered border ">
            <thead class="table-primary">
                <tr>
                    <th scope="col" width="200px">Ações</th>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo Experiência</th>
                    <th scope="col">Nome Experiência</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Data Início</th>
                    <th scope="col">Data Final</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $retornoCarreiraProfissional as $indice => $dadosCarreiraProf)
                <tr>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group me-2" role="group" aria-label="First group">
                                <a href="{{ route('carreira-profissional.show', $dadosCarreiraProf->id) }}" class="btn btn-info btn-sm" 
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-info"
                                    data-bs-title="Visualizar Registro"
                                ><i class="bi bi-card-text"></i></a>
                            </div>
                            <div class="btn-group me-2" role="group" aria-label="Second group">
                                <a href="{{ route('carreira-profissional.edit', $dadosCarreiraProf->id) }}" class="btn btn-primary btn-sm" 
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-edit"
                                    data-bs-title="Editar Registro"
                                ><i class="bi bi-pencil-square"></i></a>
                            </div>
                            <div class="btn-group me-2" role="group" aria-label="Third group">
                                <form id="form_delete_{{ $dadosCarreiraProf->id }}" action="{{ route('carreira-profissional.delete', $dadosCarreiraProf->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a onclick="document.getElementById('form_delete_{{ $dadosCarreiraProf->id }}').submit()"
                                        class="btn btn-danger btn-sm" 
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-delete"
                                        data-bs-title="Deletar Registro"
                                    ><i class="bi bi-trash"></i></a>
                                </form>
                            </div>
                        </div>
                    </td>
                    <td>{{ $dadosCarreiraProf->id }}</td>
                    <td>{{ $dadosCarreiraProf->no_tipo_experiencia }}</td>
                    <td>{{ $dadosCarreiraProf->no_experiencia }}</td>
                    <td>{{ $dadosCarreiraProf->no_empresa }}</td>
                    <td>{{ $dadosCarreiraProf->dt_inicio }}</td>
                    <td>{{ $dadosCarreiraProf->dt_final }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <p>
        {{ $retornoCarreiraProfissional->links() }}
        <b>Exibindo {{ $retornoCarreiraProfissional->count() }} registros de {{ $retornoCarreiraProfissional->total() }} (De {{ $retornoCarreiraProfissional->firstItem() }} a {{ $retornoCarreiraProfissional->lastItem() }})</b>
    </p>
@endsection
