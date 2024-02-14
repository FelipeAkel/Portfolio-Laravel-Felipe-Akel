{{-- 'id_tipo_experiencia',
        'no_experiencia',
        'no_empresa',
        'dt_inicio',
        'dt_final',
            'ds_formacao',
        'nr_total_horas',
        'ds_url' --}}

<form action="#" method="POST" class="row g-3">
    <div class="mb-3 col-md-4">
        <label for="id_tipo_experiencia" class="form-label">Tipo Experiência</label>
        <select name="id_tipo_experiencia" id="id_tipo_experiencia" class="form-select is-invalid">
            <option selected>.. Selecione ..</option>
            
        </select>
        <div class="invalid-feedback">
            Please choose a username.
        </div>
    </div>
    <div class="mb-3 col-md-4">
        <label for="no_experiencia" class="form-label">Nome Experiência</label>
        <input type="text" class="form-control is-invalid" name="no_experiencia" id="no_experiencia">
        <div class="invalid-feedback">
            Please choose a username.
        </div>
    </div>
    <div class="mb-3 col-md-4">
        <label for="no_experiencia" class="form-label">Nome Empresa</label>
        <input type="text" class="form-control is-invalid" name="no_experiencia" id="no_experiencia">
        <div class="invalid-feedback">
            Please choose a username.
        </div>
    </div>
    <div class="mb-3 col-md-3">
        <label for="dt_inicio" class="form-label">Data Início</label>
        <input type="date" class="form-control is-invalid" name="dt_inicio" id="dt_inicio">
        <div class="invalid-feedback">
            Please choose a username.
        </div>
    </div>
    <div class="mb-3 col-md-3">
        <label for="dt_final" class="form-label">Data Final</label>
        <input type="date" class="form-control is-invalid" name="dt_final" id="dt_final">
        <div class="invalid-feedback">
            Please choose a username.
        </div>
    </div>

    <div class="mb-3 col-md-3">
        <label for="nr_total_horas" class="form-label">Nº de horas aulas</label>
        <input type="number" step="0.01" class="form-control is-invalid" name="nr_total_horas" id="nr_total_horas">
        <div class="invalid-feedback">
            Please choose a username.
        </div>
    </div>

    <div class="mb-3 col-md-3">
        <label for="ds_url" class="form-label">URL do certificado</label>
        <input type="text" class="form-control is-invalid" name="ds_url" id="ds_url">
        <div class="invalid-feedback">
            Please choose a username.
        </div>
    </div>
    
    <div class="mb-3 col-md-12">
        <label for="ds_formacao" class="form-label">Descrição</label>
        <textarea class="form-control is-invalid" name="ds_formacao" id="ds_formacao" rows="3"></textarea>
        <div class="invalid-feedback">
            Please choose a username.
        </div>
    </div>

    <div class="col-12">
        <a href="#" class="btn btn-secondary">Cancelar <i class="bi bi-arrow-counterclockwise"></i></a>
        <button type="submit" class="btn btn-success">Pesquisar <i class="bi bi-plus-lg"></i></button>
    </div>
</form>