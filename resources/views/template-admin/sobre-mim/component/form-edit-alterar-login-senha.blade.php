@if ($update === true)
<form class="row g-3" action="{{ route('sobre-mim.alterar-login-senha-update', $sobreMim->id) }}" method="POST">
    @csrf
    @method('PATCH')
@else
    <form class="row g-3">
@endif

    <div class="mb-3 col-md-6">
        <label for="no_login" class="form-label">Login <span class="required">*</span></label>
        <input 
            type="text" 
            class="form-control {{ $errors->has('no_login') ? 'is-invalid' : '' }}" 
            name="no_login" id="no_login" value="{{ $sobreMim->no_login }}"
            {{ $update === true ? '' : 'disabled' }}
        >
        @error('no_login')
            <div class="invalid-feedback">
                {{ $errors->first('no_login') }}
            </div>
        @enderror
    </div>

    @if ($update === true)
        <div class="mb-3 col-md-6">
            <label for="ds_senha_antiga" class="form-label">Senha Antiga <span class="required">*</span></label>
            <input type="password" class="form-control {{ $errors->has('ds_senha_antiga') ? 'is-invalid' : '' }}" name="ds_senha_antiga" id="ds_senha_antiga" value="">
            @error('ds_senha_antiga')
                <div class="invalid-feedback">
                    {{ $errors->first('ds_senha_antiga') }}
                </div>
            @enderror
        </div>

        <div class="mb-3 col-md-6">
            <label for="ds_senha" class="form-label">Senha Nova <span class="required">*</span></label>
            <input type="password" class="form-control {{ $errors->has('ds_senha') ? 'is-invalid' : '' }}" name="ds_senha" id="ds_senha" value="">
            @error('ds_senha')
                <div class="invalid-feedback">
                    {{ $errors->first('ds_senha') }}
                </div>
            @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label for="ds_senha_confirmation" class="form-label">Repita Nova Senha <span class="required">*</span></label>
            <input type="password" class="form-control {{ $errors->has('ds_senha_confirmation') ? 'is-invalid' : '' }}" name="ds_senha_confirmation" id="ds_senha_confirmation" value="">
            @error('ds_senha_confirmation')
                <div class="invalid-feedback">
                    {{ $errors->first('ds_senha_confirmation') }}
                </div>
            @enderror
        </div>

        <div class="col-12">
            <a href="{{ route('sobre-mim.alterar-login-senha-show') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    @endif
</form>
