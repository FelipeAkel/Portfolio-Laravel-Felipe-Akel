{{-- 'id_tipo_experiencia',
        'no_experiencia',
        'no_empresa',
        'dt_inicio',
        'dt_final',
            'ds_formacao',
        'nr_total_horas',
        'ds_url' --}}

<form action="{{ route('carreira-profissional.store') }}" method="POST" class="row g-3">
    @csrf
    <div class="mb-3 col-md-4">
        <label for="id_tipo_experiencia" class="form-label">Tipo Experiência</label>
        <select name="id_tipo_experiencia" id="id_tipo_experiencia" class="form-select {{ $errors->has('id_tipo_experiencia') ? 'is-invalid' : '' }}">
            <option value="">.. Selecione ..</option>
            @foreach ($retornoTipoExperiencia as $indice => $dadosTipoExp)
                <option value="{{ $dadosTipoExp->id }}" {{ old('id_tipo_experiencia') == $dadosTipoExp->id ? 'selected' : ''  }} >{{ $dadosTipoExp->no_tipo_experiencia }}</option>
            @endforeach
        </select>
        @if ($errors->has('id_tipo_experiencia'))
            <div class="invalid-feedback">
                {{ $errors->first('id_tipo_experiencia') }}
            </div>
        @endif
    </div>
    <div class="mb-3 col-md-4">
        <label for="no_experiencia" class="form-label">Nome Experiência</label>
        <input type="text" class="form-control {{ $errors->has('no_experiencia') ? 'is-invalid' : '' }}" 
            name="no_experiencia" id="no_experiencia" value="{{ old('no_experiencia') }}"
            placeholder="Dica: Formação, curso, cargo">
        @if ($errors->has('no_experiencia'))
            <div class="invalid-feedback">
                {{ $errors->first('no_experiencia') }}
            </div>
        @endif
    </div>
    <div class="mb-3 col-md-4">
        <label for="no_empresa" class="form-label">Nome Empresa</label>
        <input type="text" class="form-control {{ $errors->has('no_empresa') ? 'is-invalid' : '' }}" 
            name="no_empresa" id="no_empresa" value="{{ old('no_empresa') }}"
            placeholder="Dica: Empresa prestadora do serviço,">
        @if ($errors->has('no_empresa'))
            <div class="invalid-feedback">
                {{ $errors->first('no_empresa') }}
            </div>
        @endif
    </div>
    <div class="mb-3 col-md-3">
        <label for="dt_inicio" class="form-label">Data Início</label>
        <div class="input-group mb-3">
            <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
            <input type="date" class="form-control {{ $errors->has('dt_inicio') ? 'is-invalid' : '' }}" 
            name="dt_inicio" id="dt_inicio" value="{{ old('dt_inicio') }}">
            @if ($errors->has('dt_inicio'))
                <div class="invalid-feedback">
                    {{ $errors->first('dt_inicio') }}
                </div>
            @endif
        </div>
        
    </div>
    <div class="mb-3 col-md-3">
        <label for="dt_final" class="form-label">Data Final</label>
        <div class="input-group mb-3">
            <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
            <input type="date" class="form-control {{ $errors->has('dt_final') ? 'is-invalid' : '' }}" 
                name="dt_final" id="dt_final" value="{{ old('dt_final') }}">
            @if ($errors->has('dt_final'))
                <div class="invalid-feedback">
                    {{ $errors->first('dt_final') }}
                </div>
            @endif
        </div>
    </div>

    <div class="mb-3 col-md-2">
        <label for="nr_total_horas" class="form-label">Nº de horas aulas</label>
        <input type="number" step="0.01" class="form-control {{ $errors->has('nr_total_horas') ? 'is-invalid' : '' }}" 
            name="nr_total_horas" id="nr_total_horas" value="{{ old('nr_total_horas') }}">
        @if ($errors->has('nr_total_horas'))
            <div class="invalid-feedback">
                {{ $errors->first('nr_total_horas') }}
            </div>
        @endif
    </div>

    <div class="mb-3 col-md-4">
        <label for="ds_url" class="form-label">URL do certificado</label>
        <div class="input-group">
            <a class="btn btn-outline-secondary disabled" role="button" aria-disabled="true" href="https://www.google.com.br/?hl=pt-BR" target="_blank">Acessar URL</a>
            <input type="text" class="form-control {{ $errors->has('ds_url') ? 'is-invalid' : '' }}" 
                name="ds_url" id="ds_url" value="{{ old('ds_url') }}" >
            @if ($errors->has('ds_url'))
                <div class="invalid-feedback">
                    {{ $errors->first('ds_url') }}
                </div>
            @endif
        </div>
    </div>
    
    <div class="mb-3 col-md-12">
        <label for="ds_formacao" class="form-label">Descrição</label>
        <textarea class="form-control {{ $errors->has('ds_formacao') ? 'is-invalid' : '' }}" name="ds_formacao" id="ds_formacao" rows="3">{{ old('ds_formacao') }}</textarea>
        @if ($errors->has('ds_formacao'))
            <div class="invalid-feedback">
                {{ $errors->first('ds_formacao') }}
            </div>
        @endif
    </div>

    <div class="col-12">
        <a href="{{ route('carreira-profissional.index') }}" class="btn btn-secondary">Cancelar <i class="bi bi-arrow-counterclockwise"></i></a>
        <button type="submit" class="btn btn-success">Pesquisar <i class="bi bi-plus-lg"></i></button>
    </div>
</form>