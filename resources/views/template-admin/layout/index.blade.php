<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('titulo-pag') </title>

    @include('template-admin.layout.include.head-css')

    <link rel="stylesheet" href="{{ asset('template-admin/css/dashboard.css') }}">

    @include('template-admin.layout.include.head-js')

</head>

<body>

    @include('template-admin.layout.include.color-modes')

    @include('template-admin.layout.include.header')


    <div class="container-fluid">
        <div class="row">
            
            @include('template-admin.layout.include.menu')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                
                @yield('conteudo')

            </main>
        </div>
    </div>

</body>

</html>
