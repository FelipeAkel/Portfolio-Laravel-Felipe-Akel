@if (isset($habilidade->id))
<form action="{{ route('habilidade.update', $habilidade->id) }}" method="POST" class="row g-3">
    @method('PUT')
@else
<form action="{{ route('habilidade.store') }}" method="POST" class="row g-3">
@endif
    @csrf
    <div class="mb-3 col-md-4">
        <label for="id_tipo_habilidade" class="form-label">Tipo Habilidade <span class="required">*</span></label>
        <select class="form-select {{ $errors->has('id_tipo_habilidade') ? 'is-invalid' : '' }}" name="id_tipo_habilidade" id="id_tipo_habilidade" >
            <option>..Selecione..</option>
            @foreach ($retornoTipoHabilidade AS $indice => $dadosTipoHabilidade )
                <option value="{{ $dadosTipoHabilidade->id }}" {{ ($habilidade->id_tipo_habilidade ?? old('id_tipo_habilidade')) == $dadosTipoHabilidade->id ? 'selected' : '' }}>{{ $dadosTipoHabilidade->no_tipo_habilidade }}</option>
            @endforeach
        </select>
        @if ($errors->has('id_tipo_habilidade'))
            <div class="invalid-feedback">
                {{ $errors->first('id_tipo_habilidade') }}
            </div>
        @endif
    </div>

    <div class="mb-3 col-md-4">
        <label for="no_habilidade" class="form-label">Nome Habilidade <span class="required">*</span></label>
        <input type="text" class="form-control {{ $errors->has('no_habilidade') ? 'is-invalid' : '' }}" 
            name="no_habilidade" id="no_habilidade" maxlength="150" value="{{ $habilidade->no_habilidade ?? old('no_habilidade') }}" >
        @if ($errors->has('no_habilidade'))
            <div class="invalid-feedback">
                {{ $errors->first('no_habilidade') }}
            </div>
        @endif
    </div>

    <div class="mb-3 col-md-4">
        <label for="ds_habilidade" class="form-label">Descrição </label>
        <input type="text" class="form-control {{ $errors->has('ds_habilidade') ? 'is-invalid' : '' }}" 
            name="ds_habilidade" id="ds_habilidade" maxlength="150" value="{{ $habilidade->ds_habilidade ?? old('ds_habilidade') }}" >
        @if ($errors->has('ds_habilidade'))
            <div class="invalid-feedback">
                {{ $errors->first('ds_habilidade') }}
            </div>
        @endif
    </div>

    <div class="mb-3 col-md-3">
        <label for="nr_porcentagem" class="form-label">Porcentagem <span class="required">*</span></label>
        <select class="form-select {{ $errors->has('nr_porcentagem') ? 'is-invalid' : '' }}" name="nr_porcentagem" id="nr_porcentagem" >
            <option>.. Selecione ..</option>
            {{-- Bug Laravel ? Valores false são iguais a 0 ? está entrando na lógica do 0 --}}
            {{-- @dd($errors->has('nr_porcentagem')) --}}
            <option value="0" >0%</option>
            <option value="25" {{ ($habilidade->nr_porcentagem ?? old('nr_porcentagem')) == 25 ? 'selected' : '' }}>25%</option>
            <option value="50" {{ ($habilidade->nr_porcentagem ?? old('nr_porcentagem')) == 50 ? 'selected' : '' }}>50%</option>
            <option value="75" {{ ($habilidade->nr_porcentagem ?? old('nr_porcentagem')) == 75 ? 'selected' : '' }}>75%</option>
            <option value="100" {{ ($habilidade->nr_porcentagem ?? old('nr_porcentagem')) == 100 ? 'selected' : '' }}>100%</option>
        </select>
        @if ($errors->has('nr_porcentagem'))
            <div class="invalid-feedback">
                {{ $errors->first('nr_porcentagem') }}
            </div>
        @endif
    </div>

    <div class="mb-3 col-md-3">
        <label for="nr_ordenacao" class="form-label">Ordenação <span class="required">*</span></label>
        <input type="number" class="form-control {{ $errors->has('nr_ordenacao') ? 'is-invalid' : '' }}" 
            name="nr_ordenacao" id="nr_ordenacao" value="{{ $habilidade->nr_ordenacao ?? old('nr_ordenacao') }}">
        @if ($errors->has('nr_ordenacao'))
            <div class="invalid-feedback">
                {{ $errors->first('nr_ordenacao') }}
            </div>
        @endif
    </div>

    <div class="col-12">
        <a href="{{ route('habilidade.index') }}" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn {{ isset($habilidade->id) ? 'btn-primary' : 'btn-success' }}">{{ isset($habilidade->id) ? 'Atualizar' : 'Cadastrar' }}</button>
    </div>
</form>
