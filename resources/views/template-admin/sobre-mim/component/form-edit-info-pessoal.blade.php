@if ($update == true)
<form class="row g-3" action="{{ route('sobre-mim.informacao-pessoal-update', $sobreMim->id) }}" method="POST" >
    @csrf
    @method('PUT')
@else
<form class="row g-3" >
@endif
    <div class="mb-3 col-md-6">
        <label for="no_usuario" class="form-label">Nome Completo <span class="required">*</span></label>
        <input type="text" class="form-control {{ $errors->has('no_usuario') ? 'is-invalid' : '' }}" 
            name="no_usuario" id="no_usuario" value="{{ $sobreMim->no_usuario }}" {{ $update == true ? '' : 'disabled' }}>
        @error('no_usuario')
            <div class="invalid-feedback">
                {{ $errors->first('no_usuario') }}
            </div>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label for="no_usuario_portfolio" class="form-label">Nome Usuário Portfólio <span class="required">*</span></label>
        <input type="text" class="form-control {{ $errors->has('no_usuario_portfolio') ? 'is-invalid' : '' }}" 
            name="no_usuario_portfolio" id="no_usuario_portfolio" value="{{ $sobreMim->no_usuario_portfolio }}" {{ $update == true ? '' : 'disabled' }}>
        @error('no_usuario_portfolio')
            <div class="invalid-feedback">
                {{ $errors->first('no_usuario_portfolio') }}
            </div>
        @enderror
    </div>
    

    <div class="mb-3 col-md-6">
        <label for="ds_email" class="form-label">E-mail <span class="required">*</span></label>
        <input type="text" class="form-control {{ $errors->has('ds_email') ? 'is-invalid' : '' }}" 
            name="ds_email" id="ds_email" value="{{ $sobreMim->ds_email }}" {{ $update == true ? '' : 'disabled' }}>
        @error('ds_email')
            <div class="invalid-feedback">
                {{ $errors->first('ds_email') }}
            </div>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label for="ds_telefone" class="form-label">Telefone <span class="required">*</span></label>
        <input type="text" class="form-control {{ $errors->has('ds_telefone') ? 'is-invalid' : '' }}" 
            name="ds_telefone" id="ds_telefone" value="{{ $sobreMim->ds_telefone }}" {{ $update == true ? '' : 'disabled' }}>
        @error('ds_telefone')
            <div class="invalid-feedback">
                {{ $errors->first('ds_telefone') }}
            </div>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label for="ds_cidade_uf" class="form-label">Cidade e Estado <span class="required">*</span></label>
        <input type="text" class="form-control {{ $errors->has('ds_cidade_uf') ? 'is-invalid' : '' }}" 
            name="ds_cidade_uf" id="ds_cidade_uf" value="{{ $sobreMim->ds_cidade_uf }}" {{ $update == true ? '' : 'disabled' }}>
        @error('ds_cidade_uf')
            <div class="invalid-feedback">
                {{ $errors->first('ds_cidade_uf') }}
            </div>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label for="ds_funcao" class="form-label">Função - Título <span class="required">*</span></label>
        <input type="text" class="form-control {{ $errors->has('ds_funcao') ? 'is-invalid' : '' }}" 
            name="ds_funcao" id="ds_funcao" value="{{ $sobreMim->ds_funcao }}" {{ $update == true ? '' : 'disabled' }}>
        @error('ds_funcao')
            <div class="invalid-feedback">
                {{ $errors->first('ds_funcao') }}
            </div>
        @enderror
    </div>

    <div class="mb-3 col-md-12">
        <label for="ds_subtitulo" class="form-label">Descrição - Subtítulo <span class="required">*</span></label>
        <input type="text" class="form-control {{ $errors->has('ds_subtitulo') ? 'is-invalid' : '' }}" 
            name="ds_subtitulo" id="ds_subtitulo" value="{{ $sobreMim->ds_subtitulo }}" {{ $update == true ? '' : 'disabled' }}>
        @error('ds_subtitulo')
            <div class="invalid-feedback">
                {{ $errors->first('ds_subtitulo') }}
            </div>
        @enderror
    </div>

    <div class="mb-3 col-md-12">
        <label for="ds_perfil" class="form-label">Descrição do Perfil <span class="required">*</span></label>
        <textarea class="form-control {{ $errors->has('ds_perfil') ? 'is-invalid' : '' }}" rows="5" 
            name="ds_perfil" id="ds_perfil" {{ $update == true ? '' : 'disabled' }}>{{ $sobreMim->ds_perfil }}</textarea>
        @error('ds_perfil')
            <div class="invalid-feedback">
                {{ $errors->first('ds_perfil') }}
            </div>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label for="ds_url_linkedin" class="form-label">URL do Linkedin</label>
        <div class="input-group">
            <a class="btn btn-outline-secondary {{ $sobreMim->ds_url_linkedin ? '' : 'disabled' }}" href="{{ $sobreMim->ds_url_linkedin }}" target="_blank">Acessar URL</a>
            <input type="text" class="form-control {{ $errors->has('ds_url_linkedin') ? 'is-invalid' : '' }}" 
                name="ds_url_linkedin" id="ds_url_linkedin" value="{{ $sobreMim->ds_url_linkedin }}" {{ $update == true ? '' : 'disabled' }}>
            @error('ds_url_linkedin')
                <div class="invalid-feedback">
                    {{ $errors->first('ds_url_linkedin') }}
                </div>
            @enderror
        </div>
    </div>

    <div class="mb-3 col-md-6">
        <label for="ds_url_github" class="form-label">URL do GitHub</label>
        <div class="input-group">
            <a class="btn btn-outline-secondary {{ $sobreMim->ds_url_github ? '' : 'disabled' }}" href="{{ $sobreMim->ds_url_github }}" target="_blank">Acessar URL</a>
            <input type="text" class="form-control {{ $errors->has('ds_url_github') ? 'is-invalid' : '' }}" 
                name="ds_url_github" id="ds_url_github" value="{{ $sobreMim->ds_url_github }}" {{ $update == true ? '' : 'disabled' }}>
            @error('ds_url_github')
                <div class="invalid-feedback">
                    {{ $errors->first('ds_url_github') }}
                </div>
            @enderror
        </div>
    </div>

    @if ($update == true)
        <div class="col-12">
            <a href="{{ route('sobre-mim.informacao-pessoal-show') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    @endif
</form>