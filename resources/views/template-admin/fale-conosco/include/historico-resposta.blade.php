<div class="row padding-top-2em">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header titulo-1rem">
                Histórico de Resposta
            </h5>
            <div class="card-body">


                <div class="table-responsive ">
                    <table class="table table-hover table-bordered border ">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Data Resposta</th>
                                <th scope="col">Descrição da Resposta</th>
                                <th scope="col">Notificação por E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($respostas AS $indice => $dadoResposta)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($dadoResposta->created_at)->format('d/m/Y - H:i')}}</td>
                                <td>{{ $dadoResposta->ds_resposta }}</td>
                                <td>
                                    @if ($dadoResposta->st_notificacao_email == 1)
                                        <i data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip-success" data-bs-placement="top" data-bs-title="COM envio de e-mail" class="bi bi-envelope-arrow-up-fill icon-success"></i></span>
                                    @else
                                        <i data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip-error" data-bs-placement="top" data-bs-title="SEM envio de e-mail" class="bi bi-envelope-slash-fill icon-error"></i>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>
                        {{ $respostas->links() }}
                        <b>Exibindo {{ $respostas->count() }} registros de {{ $respostas->total() }} (De {{ $respostas->firstItem() }} a {{ $respostas->lastItem() }})</b>
                    </p>
                </div>
            </div>
            <div class="card-footer text-body-secondary">
            </div>
        </div>
    </div>
</div>
