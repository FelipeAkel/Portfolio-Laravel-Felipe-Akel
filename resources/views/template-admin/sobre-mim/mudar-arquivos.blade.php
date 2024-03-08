@extends('template-admin.sobre-mim.index')

@section('active-sobre-mim', 'active')

@section('active-mudar-arquivos', 'active')

@section('conteudo-sobre-mim')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Mudar Arquivos</h2>
</div>

<div class="row padding-top-2em">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header titulo-1rem">
                Formulário de Atualização
            </h5>
            <div class="card-body">
                <form class="row g-3" action="{{ route('sobre-mim.mudar-arquivos-update', $sobreMim->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 col-md-6">
                        <h5 class="titulo-1rem">Currículo</h5>
                        <a href="{{ asset('storage/') }}/{{ $sobreMim->ds_url_curriculo }}" class="btn btn-outline-info" target="_blank"><i class="bi bi-filetype-pdf"></i> - Visualizar PDF</a>
                    </div>
                    <div class="mb-3 col-md-6">
                        <h5 class="titulo-1rem">Foto Usuário</h5>
                        <a href="{{ asset('storage/') }}/{{ $sobreMim->ds_url_foto_usuario }}" class="btn btn-outline-info" target="_blank"><i class="bi bi-file-earmark-image"></i> - Visualizar Imagem</a>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="ds_url_curriculo" class="form-label">Arquivo PDF </label>
                        <input class="form-control {{ $errors->has('ds_url_curriculo') ? 'is-invalid' : '' }}" type="file" 
                            name="ds_url_curriculo" id="ds_url_curriculo">
                        <div id="ds_url_foto_usuario" class="form-text">
                            Extensão: pdf
                        </div>
                        @error('ds_url_curriculo')
                            <div class="invalid-feedback">
                                {{ $errors->first('ds_url_curriculo') }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="ds_url_foto_usuario" class="form-label">Arquivo IMG </label>
                        <input class="form-control {{ $errors->has('ds_url_foto_usuario') ? 'is-invalid' : '' }}" type="file" name="ds_url_foto_usuario" id="ds_url_foto_usuario">
                        <div id="ds_url_foto_usuario" class="form-text">
                            Extensão: png, jpg ou jpeg
                            {{-- <br> Dimenção 100px por 200px; --}}
                        </div>
                        @error('ds_url_foto_usuario')
                            <div class="invalid-feedback">
                                {{ $errors->first('ds_url_foto_usuario') }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            
            </div>
            <div class="card-footer text-body-secondary">
            </div>
        </div>
    </div>
</div>
@endsection