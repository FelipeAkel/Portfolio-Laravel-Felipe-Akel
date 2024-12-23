@extends('template-admin.layout.index')

@section('active-habilidade', 'active')

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
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFiltro" aria-expanded="true" aria-controls="collapseFiltro">
                            Filtros
                        </button>
                    </h2>
                    <div id="collapseFiltro" class="accordion-collapse collapse show" data-bs-parent="#accordionFiltro">
                        <div class="accordion-body">

                            <form class="row g-3" 
                                action="{{ route('habilidade.index') }}" 
                                method="POST"
                            >
                                @csrf
                                <div class="mb-3 col-md-3">
                                    <label for="id_tipo_habilidade" class="form-label">Tipo Habilidade</label>
                                    <select 
                                        class="form-select {{ $errors->has('id_tipo_habilidade') ? 'is-invalid' : '' }}"
                                        name="id_tipo_habilidade" id="id_tipo_habilidade" 
                                    >
                                        <option value="">.. Selecione ..</option>
                                        @foreach ($retornoTipoHabilidade AS $indice => $tipoHabilidade )
                                            <option 
                                                value="{{ $tipoHabilidade->id }}"
                                                {{ old("id_tipo_habilidade") == $tipoHabilidade->id ? 'selected' : '' }}
                                            >
                                                {{ $tipoHabilidade->no_tipo_habilidade }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('id_tipo_habilidade'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('id_tipo_habilidade') }}
                                        </div>
                                    @endif

                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="nr_porcentagem" class="form-label">Porcentagem</label>
                                    <select 
                                        class="form-select {{ $errors->has('nr_porcentagem') ? 'is-invalid' : '' }}"
                                        name="nr_porcentagem" id="nr_porcentagem" 
                                    >
                                        <option value="">.. Selecione ..</option>
                                        <option value="0" {{ old("nr_porcentagem") === '0' ? 'selected' : ''}} >0%</option>
                                        <option value="25" {{ old("nr_porcentagem") === '25' ? 'selected' : ''}} >25%</option>
                                        <option value="50" {{ old("nr_porcentagem") === '50' ? 'selected' : ''}} >50%</option>
                                        <option value="75" {{ old("nr_porcentagem") === '75' ? 'selected' : ''}} >75%</option>
                                        <option value="100" {{ old("nr_porcentagem") === '100' ? 'selected' : '' }} >100%</option>
                                    </select>

                                    @if($errors->has('nr_porcentagem'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('nr_porcentagem') }}
                                        </div>
                                    @endif

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Data Criação</label>
                                    <div class="input-group mb-3">
                                        <input 
                                            type="date" 
                                            class="form-control 
                                            {{ $errors->has('dt_created_inicio') ? 'is-invalid' : '' }}" 
                                            name="dt_created_inicio" 
                                            value="{{ old("dt_created_inicio") }}"
                                        >
                                        <span class="input-group-text icone block" >Até</span>
                                        <input 
                                            type="date" 
                                            class="form-control 
                                            {{ $errors->has('dt_created_final') ? 'is-invalid' : '' }}" 
                                            name="dt_created_final"
                                            value="{{ old("dt_created_final") }}"
                                        >
                                        
                                        @if($errors->has('dt_created_inicio') || $errors->has('dt_created_final'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('dt_created_inicio') }}
                                                {{ $errors->first('dt_created_final') }}
                                            </div>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <button type="reset" class="btn btn-secondary"> Limpar </button>
                                    <button type="submit" class="btn btn-primary"> Pesquisar </button>
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
                    <th scope="col">Tipo Habilidade</th>
                    <th scope="col">Nome Habilidade</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Porcentagem</th>
                    <th scope="col">Ordenação</th>
                    <th scope="col">Dt Criação</th>
                    <th scope="col">Dt Atualização</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($retornoHabilidade AS $indice => $dadosHabilidade)
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
                        <td>{{ $dadosHabilidade->nr_ordenacao }}</td>
                        <td>{{ \Carbon\Carbon::parse($dadosHabilidade->created_at)->format('d/m/Y - H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($dadosHabilidade->updated_at)->format('d/m/Y - H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            <span class="text-warning fw-bold fs-6"> <i class="bi bi-exclamation-diamond-fill"></i> Nenhum dado encontrado</span> 
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <p>
        {{ $retornoHabilidade->links() }}
        <b>Exibindo {{ $retornoHabilidade->count() }} registros de {{ $retornoHabilidade->total() }} (De {{ $retornoHabilidade->firstItem() }} a {{ $retornoHabilidade->lastItem() }})</b>
    </p>
@endsection
