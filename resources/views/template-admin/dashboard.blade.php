@extends('template-admin.layout.index')

@section('active-dashboard', 'active')

@section('titulo-pag', 'Deshboard')

@section('conteudo')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Dashboard</h2>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="card-group">
                <div class="card text-center">
                    <h5 class="card-header titulo-1rem"><i class="bi bi-award-fill"></i> Carreira Profissional</h5>
                    <div class="card-body">
                    <h5 class="card-title">Resultados</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            Escolaridade
                            <span class="badge text-bg-primary rounded-pill">5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            Escolaridade
                            <span class="badge text-bg-primary rounded-pill">5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            Escolaridade
                            <span class="badge text-bg-primary rounded-pill">5</span>
                        </li>
                    </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('carreira-profissional.index') }}"><small class="text-body-secondary">Veja Registros</small></a>
                    </div>
                </div>
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
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
                    <th scope="col">Header</th>
                    <th scope="col">Header</th>
                    <th scope="col">Header</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group me-2" role="group" aria-label="First group">
                                <button type="button" class="btn btn-info btn-sm" 
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-info"
                                    data-bs-title="Visualizar Registro"
                                ><i class="bi bi-card-text"></i></button>
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
                            <div class="btn-group" role="group" aria-label="Four group">
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-dark"
                                    data-bs-title="Outras Ações"
                                ><i class="bi bi-suit-heart-fill"></i></button>
                            </div>
                        </div>
                    </td>
                    <td>1,001</td>
                    <td>random</td>
                    <td>data</td>
                    <td>placeholder</td>
                </tr>
                <tr>
                    <td>1,002</td>
                    <td>placeholder</td>
                    <td>irrelevant</td>
                    <td>visual</td>
                    <td>layout</td>
                </tr>
                <tr>
                    <td>1,003</td>
                    <td>data</td>
                    <td>rich</td>
                    <td>dashboard</td>
                    <td>tabular</td>
                </tr>
                <tr>
                    <td>1,003</td>
                    <td>information</td>
                    <td>placeholder</td>
                    <td>illustrative</td>
                    <td>data</td>
                </tr>
                <tr>
                    <td>1,004</td>
                    <td>text</td>
                    <td>random</td>
                    <td>layout</td>
                    <td>dashboard</td>
                </tr>
                <tr>
                    <td>1,005</td>
                    <td>dashboard</td>
                    <td>irrelevant</td>
                    <td>text</td>
                    <td>placeholder</td>
                </tr>
                <tr>
                    <td>1,006</td>
                    <td>dashboard</td>
                    <td>illustrative</td>
                    <td>rich</td>
                    <td>data</td>
                </tr>
                <tr>
                    <td>1,007</td>
                    <td>placeholder</td>
                    <td>tabular</td>
                    <td>information</td>
                    <td>irrelevant</td>
                </tr>
                <tr>
                    <td>1,008</td>
                    <td>random</td>
                    <td>data</td>
                    <td>placeholder</td>
                    <td>text</td>
                </tr>
                <tr>
                    <td>1,009</td>
                    <td>placeholder</td>
                    <td>irrelevant</td>
                    <td>visual</td>
                    <td>layout</td>
                </tr>
                <tr>
                    <td>1,010</td>
                    <td>data</td>
                    <td>rich</td>
                    <td>dashboard</td>
                    <td>tabular</td>
                </tr>
                <tr>
                    <td>1,011</td>
                    <td>information</td>
                    <td>placeholder</td>
                    <td>illustrative</td>
                    <td>data</td>
                </tr>
                <tr>
                    <td>1,012</td>
                    <td>text</td>
                    <td>placeholder</td>
                    <td>layout</td>
                    <td>dashboard</td>
                </tr>
                <tr>
                    <td>1,013</td>
                    <td>dashboard</td>
                    <td>irrelevant</td>
                    <td>text</td>
                    <td>visual</td>
                </tr>
                <tr>
                    <td>1,014</td>
                    <td>dashboard</td>
                    <td>illustrative</td>
                    <td>rich</td>
                    <td>data</td>
                </tr>
                <tr>
                    <td>1,015</td>
                    <td>random</td>
                    <td>tabular</td>
                    <td>information</td>
                    <td>text</td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- <p>
        {{ $retornoCarreiraProfissional->links() }}
        <b>Exibindo {{ $retornoCarreiraProfissional->count() }} registros de {{ $retornoCarreiraProfissional->total() }} (De {{ $retornoCarreiraProfissional->firstItem() }} a {{ $retornoCarreiraProfissional->lastItem() }})</b>
    </p> --}}
@endsection
