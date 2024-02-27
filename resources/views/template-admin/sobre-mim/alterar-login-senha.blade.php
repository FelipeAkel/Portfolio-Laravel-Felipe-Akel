@extends('template-admin.sobre-mim.index')

@section('active-login-senha', 'active')

@section('conteudo-sobre-mim')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Alterar Login e Senha</h2>
</div>

<div class="row padding-top-2em">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header titulo-1rem">
                Formulário de Atualização
            </h5>
            <div class="card-body">

                <form class="row g-3" >
                    <div class="mb-3 col-md-6">
                        <label for="no_login" class="form-label">Login <span class="required">*</span></label>
                        <input type="text" class="form-control is-invalid" name="no_login" id="no_login" value="">
                        {{-- @error('ds_url_linkedin') --}}
                            <div class="invalid-feedback">
                                Texto
                            </div>
                        {{-- @enderror --}}
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="ds_senha_anterior" class="form-label">Senha Anterior <span class="required">*</span></label>
                        <input type="text" class="form-control is-invalid" name="ds_senha_anterior" id="ds_senha_anterior" value="">
                        {{-- @error('ds_url_linkedin') --}}
                            <div class="invalid-feedback">
                                Texto
                            </div>
                        {{-- @enderror --}}
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="ds_senha_nova" class="form-label">Senha Nova <span class="required">*</span></label>
                        <input type="text" class="form-control is-invalid" name="ds_senha_nova" id="ds_senha_nova" value="">
                        {{-- @error('ds_url_linkedin') --}}
                            <div class="invalid-feedback">
                                Texto
                            </div>
                        {{-- @enderror --}}
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="ds_senha_repetida" class="form-label">Repita Senha <span class="required">*</span></label>
                        <input type="text" class="form-control is-invalid" name="ds_senha_repetida" id="ds_senha_repetida" value="">
                        {{-- @error('ds_url_linkedin') --}}
                            <div class="invalid-feedback">
                                Texto
                            </div>
                        {{-- @enderror --}}
                    </div>

                    <div class="col-12">
                        <a href="{{ route('sobre-mim.visao-geral') }}" class="btn btn-primary">Atualizar</a>
                    </div>
                </form>
            
            </div>
            <div class="card-footer text-body-secondary">
            </div>
        </div>
    </div>
</div>
@endsection