@extends('template-admin.layout.index')

@section('active-servicos', 'active')

@section('titulo-pag', 'Serviços')

@section('conteudo')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Serviços</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('servicos.create') }}" class="btn btn-success">Novo Registro</a>
            </div>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ route('servicos.index') }}">Serviços</a></li>
        </ol>
    </nav>

    <hr class="border border-2 opacity-50">

    <h5 class="titulo-1rem">Resultado</h5>
    <div class="table-responsive ">
        <table class="table table-hover table-bordered border ">
            <thead class="table-primary">
                <tr>
                    <th scope="col" width="200px">Ações</th>
                    <th scope="col">ID</th>
                    <th scope="col">Serviço</th>
                    <th scope="col" class="text-center">Icone</th>
                    <th scope="col" class="text-center">Imagem</th>
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
                                <a href="{{ route('servicos.edit', $dadoServico->id) }}" class="btn btn-primary btn-sm" 
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-edit"
                                    data-bs-title="Editar Registro"
                                ><i class="bi bi-pencil-square"></i></a>
                            </div>
                            <div class="btn-group me-2" role="group" aria-label="Third group">
                                <form id="form_delete_{{ $dadoServico->id }}" action="{{ route('servicos.delete', $dadoServico->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a onclick="document.getElementById('form_delete_{{ $dadoServico->id }}').submit()"
                                        class="btn btn-danger btn-sm" 
                                        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-delete"
                                        data-bs-title="Deletar Registro"
                                    ><i class="bi bi-trash"></i></a>
                                </form>
                            </div>

                        </div>
                    </td>
                    <td>{{ $dadoServico->id }}</td>
                    <td>{{ $dadoServico->no_servico }}</td>
                    <td class="text-center"><img src="{{ asset('storage/') }}/{{$dadoServico->ds_url_icon_svg }}" style="width:30px;" class="rounded img-icon" alt="..."></td>
                    <td class="text-center">
                        @if (isset($dadoServico->ds_url_img))
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalImgDestaque{{ $indice }}" >Imagem</a>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse( $dadoServico->created_at)->format('d/m/Y - H:i')}} </td>
                </tr>

                @if (isset($dadoServico->ds_url_img))
                    <div class="modal fade" id="modalImgDestaque{{ $indice }}" tabindex="-1" aria-labelledby="modalImgDestaqueLabel{{ $indice }}" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalImgDestaqueLabel{{ $indice }}">Imagem em Destaque</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <figure class="figure">
                                    <img src="{{ asset('storage/') }}/{{ $dadoServico->ds_url_img }}" class="figure-img img-fluid rounded" alt="Imagem em Destaque">
                                    <figcaption class="figure-caption">Imagem em Destaque</figcaption>
                                </figure>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                            </div>
                        </div>
                    </div>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <p>
        {{ $servicos->links() }}
        <b>Exibindo {{ $servicos->count() }} registros de {{ $servicos->total() }} (De {{ $servicos->firstItem() }} a {{ $servicos->lastItem() }})</b>
    </p>
@endsection
