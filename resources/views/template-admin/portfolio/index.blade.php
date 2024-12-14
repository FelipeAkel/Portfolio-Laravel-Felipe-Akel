@extends('template-admin.layout.index')

@section('active-portfolio', 'active')

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
                @forelse ($portfolio AS $indice => $dadoProjeto )
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
                                    <form id="form_delete_{{ $dadoProjeto->id }}" action="{{ route('portfolio.delete', $dadoProjeto->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a onclick="document.getElementById('form_delete_{{ $dadoProjeto->id }}').submit()"
                                            class="btn btn-danger btn-sm" 
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-delete"
                                            data-bs-title="Deletar Registro"
                                        ><i class="bi bi-trash"></i></a>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>{{ $dadoProjeto->id }}</td>
                        <td>{{ $dadoProjeto->no_projeto }}</td>
                        <td>{{ $dadoProjeto->ds_tipo_projeto }}</td>
                        <td><a href="{{ $dadoProjeto->ds_url_projeto }}" target="_blank">Link</a></td>
                        <td><a href="{{ $dadoProjeto->ds_url_repositorio }}" target="_blank">Link</a></td>
                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#modalImgDestaque{{ $indice }}">IMG</a></td>
                    </tr>

                    <div class="modal fade" id="modalImgDestaque{{ $indice }}" tabindex="-1" aria-labelledby="modalImgDestaqueLabel{{ $indice }}" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalImgDestaqueLabel{{ $indice }}">Imagem em Destaque</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <figure class="figure">
                                    <img src="{{ asset('storage/') }}/{{ $dadoProjeto->ds_url_img_destaque }}" class="figure-img img-fluid rounded" alt="Imagem em Destaque">
                                    <figcaption class="figure-caption">Imagem em Destaque</figcaption>
                                </figure>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            <span class="text-warning fw-bold fs-6"> <i class="bi bi-exclamation-diamond-fill"></i> Nenhum dado encontrado</span> 
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <p>
        {{ $portfolio->links() }}
        <b>Exibindo {{ $portfolio->count() }} registros de {{ $portfolio->total() }} (De {{ $portfolio->firstItem() }} a {{ $portfolio->lastItem() }})</b>
    </p>

@endsection
