<div class="row padding-top-2em">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header titulo-1rem">
                Dados do Registro
            </h5>
            <div class="card-body">

                <form class="row g-3" >
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Status </label>
                        <select class="form-select" disabled>
                            <option >{{ $faleConosco->status->no_status }}</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-3">
                        <label class="form-label">Nome Internauta </label>
                        <input type="text" class="form-control" value="{{ $faleConosco->no_contato }}" disabled>
                    </div>

                    <div class="mb-3 col-md-3">
                        <label class="form-label">Assunto </label>
                        <input type="text" class="form-control" value="{{ $faleConosco->ds_assunto }}" disabled>
                    </div>

                    <div class="mb-3 col-md-3">
                        <label class="form-label">Data Registro </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
                            <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($faleConosco->created_at)->format('d/m/Y - H:i')}}" disabled>
                        </div>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="form-label">Descrição</label>
                        <textarea class="form-control" rows="3" disabled>{{ $faleConosco->ds_mensagem }}</textarea>
                    </div>

                    <div class="col-12">
                        <a href="{{ route('fale-conosco.index') }}" class="btn btn-secondary">Voltar</a>
                    </div>
                </form>
            </div>
            <div class="card-footer text-body-secondary">
            </div>
        </div>
    </div>
</div>