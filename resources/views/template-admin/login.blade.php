<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portfólio</title>

    @include('template-admin.layout.include.head-css')

    <link rel="stylesheet" href="{{ asset_path('template-admin/css/login.css') }}">

    @include('template-admin.layout.include.head-js')

</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

    @include('template-admin.layout.include.color-modes')

    <main class="form-signin w-100 m-auto">
        <form action="{{ route('admin.login-validacao') }}" method="POST">
            @csrf
            <img class="mb-4" src="{{ asset_path('template-admin/img/undraw_login_re_4vu2.svg') }}" alt="" width="250" >
            
            <h1 class="h3 mb-3 fw-normal">Dados de Usuário</h1>

            <div class="form-floating">
                <input type="text" class="form-control {{ $errors->has('no_login') ? 'is-invalid' : '' }}" 
                    name="no_login" id="no_login" value="{{ old('no_login') ?? '' }}" placeholder="Login">
                <label for="no_login">Login</label>
                @error('no_login')
                    <div class="invalid-feedback">
                        {{ $errors->first('no_login') }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control {{ $errors->has('ds_senha') ? 'is-invalid' : '' }}" name="ds_senha" id="ds_senha" placeholder="Senha">
                <label for="ds_senha">Senha</label>
                @error('ds_senha')
                    <div class="invalid-feedback">
                        {{ $errors->first('ds_senha') }}
                    </div>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>
                <a href="{{ route('internauta.index') }}" class="btn btn-secondary w-100 py-2" >Voltar</a>
            </div>

            <p class="mt-5 mb-3 text-body-secondary">Todos os Direitos Reservados <br>&copy; 
                @if ($sobreMim->ds_url_linkedin != '' || $sobreMim->ds_url_github != '')
                <a href="{{ $sobreMim->ds_url_linkedin != '' ? $sobreMim->ds_url_linkedin : $sobreMim->ds_url_github }}" 
                    class="link-footer" target="_blank"
                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-dark"
                    data-bs-title="Rede Social">
                    {{ $sobreMim->no_usuario }}
                </a>
                @else
                <b>{{ $sobreMim->no_usuario }}</b>
                @endif
            </p>
        </form>
    </main>

    {{-- Ao colocar no head-js, compoente não funciona! --}}
    <script src="{{ asset_path('template-admin/toastr/jquery.js') }}" ></script>
    <script src="{{ asset_path('template-admin/toastr/toastr.js') }}"></script>
    {!! Toastr::message() !!}
</body>

</html>
