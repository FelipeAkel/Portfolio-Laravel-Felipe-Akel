


@if ($update === true)
<form class="row g-3" action="{{ route('sobre-mim.mudar-arquivos-update', $sobreMim->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
@else
<form class="row g-3">
@endif

    <div class="mb-3 col-md-6">
        <h5 class="titulo-1rem">Currículo</h5>
        <a href="{{ isset($sobreMim->ds_url_curriculo) ? asset("storage/$sobreMim->ds_url_curriculo") : asset('default/curriculo-felipe-akel.pdf') }}" class="btn btn-info" target="_blank"><i class="bi bi-filetype-pdf"></i> - Visualizar PDF</a>
    </div>
    <div class="mb-3 col-md-6">
        <h5 class="titulo-1rem">Foto Usuário</h5>
        <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalFotoUsuario"><i class="bi bi-file-earmark-image"></i> - Visualizar Imagem</a>
    </div>

    @if ($update === true)
        <div class="mb-3 col-md-6">
            <label for="ds_url_curriculo" class="form-label">Arquivo PDF </label>
            <input 
                type="file" 
                class="form-control {{ $errors->has('ds_url_curriculo') ? 'is-invalid' : '' }}" 
                name="ds_url_curriculo" id="ds_url_curriculo"
            >
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
            <input 
                type="file" 
                class="form-control {{ $errors->has('ds_url_foto_usuario') ? 'is-invalid' : '' }}" 
                name="ds_url_foto_usuario" id="ds_url_foto_usuario"
            >
            <div id="ds_url_foto_usuario" class="form-text">
                Extensão: png, jpg ou jpeg
                <br>Dimenções 1000px de largura e altura
            </div>
            @error('ds_url_foto_usuario')
                <div class="invalid-feedback">
                    {{ $errors->first('ds_url_foto_usuario') }}
                </div>
            @enderror
            
        </div>

        <div class="col-12">
            <a href="{{ route('sobre-mim.mudar-arquivos-show') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    @endif

</form>

<!-- Modal -->
<div class="modal fade" id="modalFotoUsuario" tabindex="-1" aria-labelledby="modalFotoUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalFotoUsuarioLabel">Foto Usuário</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <figure class="figure">
                    <img src="{{ isset($sobreMim->ds_url_foto_usuario) ? asset("storage/$sobreMim->ds_url_foto_usuario") : asset('default/felipe-akel.jpg') }}" class="figure-img img-fluid rounded" alt="Imagem do Usuário Portfólio">
                    <figcaption class="figure-caption">Imagem do Usuário Portfólio</figcaption>
                </figure>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>