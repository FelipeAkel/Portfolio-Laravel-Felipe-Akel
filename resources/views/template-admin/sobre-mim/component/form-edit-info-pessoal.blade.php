<form class="row g-3" >
    <div class="mb-3 col-md-6">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control is-invalid" value="" disabled>
        {{-- @error('ds_url_linkedin') --}}
            <div class="invalid-feedback">
                Texto
            </div>
        {{-- @enderror --}}
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label">E-mail</label>
        <input type="text" class="form-control is-invalid" value="" disabled>
        {{-- @error('ds_url_linkedin') --}}
            <div class="invalid-feedback">
                Texto
            </div>
        {{-- @enderror --}}
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label">Telefone</label>
        <input type="text" class="form-control is-invalid" value="" disabled>
        {{-- @error('ds_url_linkedin') --}}
            <div class="invalid-feedback">
                Texto
            </div>
        {{-- @enderror --}}
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label">Cidade e Estado</label>
        <input type="text" class="form-control is-invalid" value="" disabled>
        {{-- @error('ds_url_linkedin') --}}
            <div class="invalid-feedback">
                Texto
            </div>
        {{-- @enderror --}}
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label">Função - Título</label>
        <input type="text" class="form-control is-invalid" value="" disabled>
        {{-- @error('ds_url_linkedin') --}}
            <div class="invalid-feedback">
                Texto
            </div>
        {{-- @enderror --}}
    </div>

    <div class="mb-3 col-md-12">
        <label class="form-label">Descrição - Subtítulo </label>
        <input type="text" class="form-control is-invalid" value="" disabled>
        {{-- @error('ds_url_linkedin') --}}
            <div class="invalid-feedback">
                Texto
            </div>
        {{-- @enderror --}}
    </div>

    <div class="mb-3 col-md-12">
        <label class="form-label">Descrição do Perfil </label>
        <textarea class="form-control is-invalid" rows="3" disabled></textarea>
        {{-- @error('ds_url_linkedin') --}}
            <div class="invalid-feedback">
                Texto
            </div>
        {{-- @enderror --}}
    </div>

    <div class="mb-3 col-md-12">
        <label for="ds_url_linkedin" class="form-label">URL do Linkedin</label>
        <div class="input-group">
            <a class="btn btn-outline-secondary disabled" href="#" target="_blank">Acessar URL</a>
            <input type="text" class="form-control is-invalid" 
                name="ds_url_linkedin" id="ds_url_linkedin" value="" > 
            {{-- @error('ds_url_linkedin') --}}
                <div class="invalid-feedback">
                    Texto
                </div>
            {{-- @enderror --}}
        </div>
    </div>

    <h5 class="titulo-1rem">Currículo</h5>

    <div class="mb-3 col-md-12">
        <label for="file_img_destaque" class="form-label">Arquivo PDF <span class="required">*</span></label>
        <input class="form-control is-invalid" type="file" name="file_img_destaque" id="file_img_destaque">
        <div class="invalid-feedback">
            Texto
        </div>
    </div>

    <div class="col-12">
        <a href="{{ route('sobre-mim.informacao-pessoal-show') }}" class="btn btn-secondary">Cancelar</a>
        <a href="{{ route('sobre-mim.informacao-pessoal-show') }}" class="btn btn-primary">Atualizar</a>
    </div>
</form>