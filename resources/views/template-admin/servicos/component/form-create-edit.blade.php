@if (isset($servico->id))
<form class="row g-3" action="{{ route('servicos.update', $servico->id) }}" method="POST">
    @method('PUT')
@else
<form class="row g-3" action="{{ route('servicos.store') }}" method="POST">
@endif
    @csrf
    <div class="mb-3 col-md-3">
        <label for="no_servico" class="form-label">Serviço </label>
        <input type="text" class="form-control {{ $errors->has('no_servico') ? 'is-invalid' : '' }}" name="no_servico" id="no_servico" value="{{ $servico->no_servico ?? old('no_servico') }}" >
        @if($errors->has('no_servico'))
        <div class="invalid-feedback">
            {{ $errors->first('no_servico') }}
        </div>
        @endif
    </div>

    <div class="mb-3 col-md-12">
        <label for="ds_servico" class="form-label">Descrição</label>
        <textarea class="form-control {{ $errors->has('no_servico') ? 'is-invalid' : '' }}" rows="3" name="ds_servico" id="ds_servico" >{{ $servico->ds_servico ?? old('ds_servico') }}</textarea>
        @if($errors->has('no_servico'))
        <div class="invalid-feedback">
            {{ $errors->first('no_servico') }}
        </div>
        @endif
    </div>

    <div class="mb-3 col-md-6">
        <label for="ds_url_icon_svg" class="form-label">Icone - Upload arquivo .svg</label>
        <input class="form-control {{ $errors->has('ds_url_icon_svg') ? 'is-invalid' : '' }}" type="file" name="ds_url_icon_svg" id="ds_url_icon_svg">
        @if($errors->has('ds_url_icon_svg'))
        <div class="invalid-feedback">
            {{ $errors->first('ds_url_icon_svg') }}
        </div>
        @endif
    </div>

    <div class="mb-3 col-md-6">
        <label for="ds_url_img" class="form-label">Imagem - Upload arquivo .png, .jpg</label>
        <input class="form-control {{ $errors->has('ds_url_img') ? 'is-invalid' : '' }}" type="file" name="ds_url_img" id="ds_url_img">
        @if($errors->has('ds_url_img'))
        <div class="invalid-feedback">
            {{ $errors->first('ds_url_img') }}
        </div>
        @endif
    </div>

    <div class="col-12">
        <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn {{ isset($servico->id) ? 'btn-primary' : 'btn-success' }}">{{ isset($servico->id) ? 'Atualizar' : 'Cadastrar' }}</button>
    </div>
</form>




