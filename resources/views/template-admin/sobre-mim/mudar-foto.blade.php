@extends('template-admin.sobre-mim.index')

@section('active-mudar-foto', 'active')

@section('conteudo-sobre-mim')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Mudar Foto</h2>
</div>

<div class="row padding-top-2em">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header titulo-1rem">
                Formulário de Atualização
            </h5>
            <div class="card-body">

                <form class="row g-3" >
                    <div class="mb-3 col-md-12">
                        <label for="file_img_destaque" class="form-label">Arquivo IMG <span class="required">*</span></label>
                        <input class="form-control is-invalid" type="file" name="file_img_destaque" id="file_img_destaque">
                        <div id="passwordHelpBlock" class="form-text">
                            Imagens png, jpg...<br>
                            Dimenção 100px por 200px;
                        </div>
                        <div class="invalid-feedback">
                            Texto
                        </div>
                    </div>

                    <div class="col-12">
                        <a href="{{ route('sobre-mim.logs-sistema') }}" class="btn btn-primary">Atualizar</a>
                    </div>
                </form>
            
            </div>
            <div class="card-footer text-body-secondary">
            </div>
        </div>
    </div>
</div>
@endsection