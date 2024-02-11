<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portfólio</title>

    @include('template-admin.layout.include.head-css')

    <link rel="stylesheet" href="{{ asset('template-admin/css/login.css') }}">

    @include('template-admin.layout.include.head-js')

</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

    @include('template-admin.layout.include.color-modes')


    <main class="form-signin w-100 m-auto">
        <form>
            <img class="mb-4" src="{{ asset('template-admin/img/undraw_login_re_4vu2.svg') }}" alt="" width="250" >
            
            <h1 class="h3 mb-3 fw-normal">Dados de Usuário</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="inLogin" placeholder="Login">
                <label for="inLogin">Login</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="inSenha" placeholder="Senha">
                <label for="inSenha">Senha</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
        </form>
    </main>

</body>

</html>
