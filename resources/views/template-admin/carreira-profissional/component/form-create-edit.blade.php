
@if (isset($carreiraProfissional))
    <form action="{{ route('carreira-profissional.update', $carreiraProfissional->id) }}" method="POST" class="row g-3">
        @method('PUT')
    @else
    <form action="{{ route('carreira-profissional.store') }}" method="POST" class="row g-3">
@endif
    @csrf
    <div class="mb-3 col-md-4">
        <label for="id_tipo_experiencia" class="form-label">Tipo Experiência <span class="required">*</span></label>
        <select name="id_tipo_experiencia" id="id_tipo_experiencia" class="form-select {{ $errors->has('id_tipo_experiencia') ? 'is-invalid' : '' }}">
            <option value="">.. Selecione ..</option>
            @foreach ($retornoTipoExperiencia as $indice => $dadosTipoExp)
                <option value="{{ $dadosTipoExp->id }}" {{ ($carreiraProfissional->id_tipo_experiencia ?? old('id_tipo_experiencia')) == $dadosTipoExp->id ? 'selected' : ''  }} >{{ $dadosTipoExp->no_tipo_experiencia }}</option>
            @endforeach
        </select>
        @if ($errors->has('id_tipo_experiencia'))
            <div class="invalid-feedback">
                {{ $errors->first('id_tipo_experiencia') }}
            </div>
        @endif
    </div>
    <div class="mb-3 col-md-4">
        <label for="no_experiencia" class="form-label">Nome Experiência <span class="required">*</span></label>
        <input 
            type="text" 
            class="form-control {{ $errors->has('no_experiencia') ? 'is-invalid' : '' }}" 
            name="no_experiencia" id="no_experiencia" 
            maxlength="255" value="{{ $carreiraProfissional->no_experiencia ?? old('no_experiencia') }}"
        >
        <div class="form-text">Dica: Nome do curso, certificado, cargo</div>
        @if ($errors->has('no_experiencia'))
            <div class="invalid-feedback">
                {{ $errors->first('no_experiencia') }}
            </div>
        @endif
    </div>
    <div class="mb-3 col-md-4">
        <label for="no_empresa" class="form-label">Nome Empresa <span class="required">*</span></label>
        <input 
            type="text" 
            class="form-control {{ $errors->has('no_empresa') ? 'is-invalid' : '' }}" 
            name="no_empresa" id="no_empresa" 
            maxlength="255" value="{{ $carreiraProfissional->no_empresa ?? old('no_empresa') }}"
        >
        <div class="form-text">Dica: Empresa prestadora do serviço, contratada</div>
        @if ($errors->has('no_empresa'))
            <div class="invalid-feedback">
                {{ $errors->first('no_empresa') }}
            </div>
        @endif
    </div>
    <div class="mb-3 col-md-3">
        <label for="dt_inicio" class="form-label">Data Início <span class="required">*</span></label>
        <div class="input-group mb-3">
            <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
            <input type="date" class="form-control {{ $errors->has('dt_inicio') ? 'is-invalid' : '' }}" 
            name="dt_inicio" id="dt_inicio" value="{{ $carreiraProfissional->dt_inicio ?? old('dt_inicio') }}">
            @if ($errors->has('dt_inicio'))
                <div class="invalid-feedback">
                    {{ $errors->first('dt_inicio') }}
                </div>
            @endif
        </div>
        
        {{-- <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
            <label class="form-check-label" for="flexCheckIndeterminate">
                Trabalho ou estudo atualmente neste cargo ou curso
            </label>
        </div> --}}

    </div>
    <div class="mb-3 col-md-3">
        <label for="dt_final" class="form-label">Data Final</label>
        <div class="input-group mb-3">
            <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
            <input type="date" class="form-control {{ $errors->has('dt_final') ? 'is-invalid' : '' }}" 
                name="dt_final" id="dt_final" value="{{ $carreiraProfissional->dt_final ?? old('dt_final') }}">
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
            name="nr_total_horas" id="nr_total_horas" value="{{ $carreiraProfissional->nr_total_horas ?? old('nr_total_horas') }}">
        @if ($errors->has('nr_total_horas'))
            <div class="invalid-feedback">
                {{ $errors->first('nr_total_horas') }}
            </div>
        @endif
    </div>

    <div class="mb-3 col-md-4">
        <label for="ds_url" class="form-label">URL do certificado</label>
        <div class="input-group">
            <a class="btn btn-outline-secondary {{ isset($carreiraProfissional->ds_url) ? '' : 'disabled' }}" href="{{ isset($carreiraProfissional->ds_url) ?? '#' }}" target="_blank">Acessar URL</a>
            <input type="text" class="form-control {{ $errors->has('ds_url') ? 'is-invalid' : '' }}" 
                name="ds_url" id="ds_url" value="{{ $carreiraProfissional->ds_url ?? old('ds_url') }}" > 
            @if ($errors->has('ds_url'))
                <div class="invalid-feedback">
                    {{ $errors->first('ds_url') }}
                </div>
            @endif
        </div>
    </div>

    <div class="mb-3 col-md-4">
        <label for="st_trabalho_atual" class="form-label">Trabalho atualmente neste cargo? <span class="required">*</span></label>
        <div class="form-check">
            <input class="form-check-input {{ $errors->has('st_trabalho_atual') ? 'is-invalid' : '' }}" type="radio" name="st_trabalho_atual" id="sim" value="1" {{ ($carreiraProfissional->st_trabalho_atual ?? old('st_trabalho_atual')) == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="sim">
                Sim
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input {{ $errors->has('st_trabalho_atual') ? 'is-invalid' : '' }}" type="radio" name="st_trabalho_atual" id="nao" value="0" {{ ($carreiraProfissional->st_trabalho_atual ?? old('st_trabalho_atual')) == 0 ? 'checked' : '' }}>
            <label class="form-check-label" for="nao">
                Não
            </label>
            @if ($errors->has('st_trabalho_atual'))
                <div class="invalid-feedback">
                    {{ $errors->first('st_trabalho_atual') }}
                </div>
            @endif
        </div>
    </div>
    
    <div class="mb-3 col-md-8">
        <label for="ds_formacao" class="form-label">Descrição</label>
        <textarea class="form-control {{ $errors->has('ds_formacao') ? 'is-invalid' : '' }}" name="ds_formacao" id="ds_formacao" rows="3">{{ $carreiraProfissional->ds_formacao ?? old('ds_formacao') }}</textarea>
        @if ($errors->has('ds_formacao'))
            <div class="invalid-feedback">
                {{ $errors->first('ds_formacao') }}
            </div>
        @endif
    </div>

    <div class="col-12">
        <a href="{{ route('carreira-profissional.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn {{ isset($carreiraProfissional->id) ? 'btn-primary' : 'btn-success' }}">{{ isset($carreiraProfissional->id) ? 'Atualizar' : 'Cadastrar' }}</button>
    </div>
</form>