@if (isset($servico->id))
<form class="row g-3" action="{{ route('servicos.update', $servico->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
<form class="row g-3" action="{{ route('servicos.store') }}" method="POST" enctype="multipart/form-data">
@endif
    @csrf
    <div class="mb-3 col-md-3">
        <label for="no_servico" class="form-label">Serviço <span class="required">*</span></label>
        <input type="text" class="form-control {{ $errors->has('no_servico') ? 'is-invalid' : '' }}" name="no_servico" id="no_servico" value="{{ $servico->no_servico ?? old('no_servico') }}" >
        @if($errors->has('no_servico'))
        <div class="invalid-feedback">
            {{ $errors->first('no_servico') }}
        </div>
        @endif
    </div>

    <div class="mb-3 col-md-12">
        <label for="ds_servico" class="form-label">Descrição <span class="required">*</span></label>
        <textarea class="form-control {{ $errors->has('no_servico') ? 'is-invalid' : '' }}" rows="3" name="ds_servico" id="ds_servico" >{{ $servico->ds_servico ?? old('ds_servico') }}</textarea>
        @if($errors->has('no_servico'))
        <div class="invalid-feedback">
            {{ $errors->first('no_servico') }}
        </div>
        @endif
    </div>

    <div class="mb-3 col-md-6">
        <label for="file_icon_svg" class="form-label">Icone <span class="required">*</span></label>
        <input class="form-control {{ $errors->has('file_icon_svg') ? 'is-invalid' : '' }}" type="file" name="file_icon_svg" id="file_icon_svg">
        <div id="file_icon_svg" class="form-text">
            Extensão: svg
        </div>
        @if($errors->has('file_icon_svg'))
            <div class="invalid-feedback">
                {{ $errors->first('file_icon_svg') }}
            </div>
        @endif
    </div>

    <div class="mb-3 col-md-6">
        <label for="file_img" class="form-label">Imagem </label>
        <input class="form-control {{ $errors->has('file_img') ? 'is-invalid' : '' }}" type="file" name="file_img" id="file_img">
        <div id="file_img" class="form-text">
            Extensão: png, jpg ou jpeg
        </div>
        @if($errors->has('file_img'))
            <div class="invalid-feedback">
                {{ $errors->first('file_img') }}
            </div>
        @endif
    </div>

    @if(isset($servico->id))
    <div class="mb-3 col-md-6">
        <div class="card text-center" style="width: 18rem;">
            <img src="{{ asset('storage/') }}/{{ $servico->ds_url_icon_svg }}" class="card-img-top img-proporcao-icon" alt="Icone de Serviço">
            <div class="card-body">
                <p class="card-text">Icone de Serviço</p>
            </div>
        </div>
    </div>
        @if (isset($servico->ds_url_img))
        <div class="mb-3 col-md-6">
            <div class="card text-center" style="width: 18rem;">
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalImgDestaque">
                    <img src="{{ asset('storage/') }}/{{ $servico->ds_url_img }}" class="card-img-top img-proporcao" alt="Imagem em Destaque">
                </a>
                <div class="card-body">
                    <p class="card-text">Imagem em Destaque</p>
                    <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalImgDestaque">
                        <i class="bi bi-search"></i> Ampliar
                    </a>
                </div>
            </div>
        </div>
        @endif
    @endif

    <div class="col-12">
        <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn {{ isset($servico->id) ? 'btn-primary' : 'btn-success' }}">{{ isset($servico->id) ? 'Atualizar' : 'Cadastrar' }}</button>
    </div>
</form>

<!-- Modal -->
@if (isset($servico->ds_url_img))
<div class="modal fade" id="modalImgDestaque" tabindex="-1" aria-labelledby="modalImgDestaqueLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalImgDestaqueLabel">Imagem em Destaque</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
            <figure class="figure">
                <img src="{{ asset('storage/') }}/{{ $servico->ds_url_img }}" class="figure-img img-fluid rounded" alt="Imagem em Destaque">
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


