@extends('template-admin.sobre-mim.index')

@section('active-sobre-mim', 'active')

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

                <form class="row g-3" enctype="multipart/form-data">
                    


                    <div class="mb-3 col-md-6">
                        <h5 class="titulo-1rem">Currículo</h5>

                        <a href="{{ asset('template-internauta/file/curriculo-felipe-akel.pdf') }}" class="btn btn-outline-info" target="_blank">Visualizar PDF</a>
                    </div>
                    <div class="mb-3 col-md-6">
                        <h5 class="titulo-1rem">Foto</h5>
                        <a href="{{ asset('template-internauta/img/about/felipe-akel.jpg') }}" class="btn btn-outline-info" target="_blank">Visualizar Imagem</a>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="file_pdf_curriculo" class="form-label">Arquivo PDF <span class="required">*</span></label>
                        <input class="form-control {{ $errors->has('file_pdf_curriculo') ? 'is-invalid' : 'is-invalid' }}" type="file" 
                            name="file_pdf_curriculo" id="file_pdf_curriculo">
                        @error('file_pdf_curriculo')
                            <div class="invalid-feedback">
                                {{ $errors->first('file_pdf_curriculo') }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
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