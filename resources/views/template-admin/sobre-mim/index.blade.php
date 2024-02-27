@extends('template-admin.layout.index')

@section('titulo-pag', 'Sobre Mim')

@section('conteudo')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Sobre Mim</h2>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ route('sobre-mim.visao-geral') }}">Sobre Mim</a></li>
        </ol>
    </nav>

    <div class="row padding-top-2em justify-content-center">
        <div class="col col-md-4 ">

            <div class="row justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('template-internauta/img/about/') }}/felipe-akel.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Felipe Akel Carvalho Florentino</h5>
                        <p class="card-text">Programador PHP | Laravel</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">10 Projetos</li>
                        <li class="list-group-item">3 Serviços</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Currículo</a>
                        <a href="#" class="card-link">Linkedin</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="col col-md-8">
           
            <div class="card ">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link @yield('menu-visao-geral')" href="{{ route('sobre-mim.visao-geral') }}">Visão Geral</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('menu-informacao-pessoal')" href="{{ route('sobre-mim.informacao-pessoal-show') }}">Informação pessoal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('menu-mudar-foto')" href="{{ route('sobre-mim.mudar-foto') }}">Mudar Foto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('menu-login-senha')" href="{{ route('sobre-mim.alterar-login-senha') }}">Alterar login e senha</a>
                    </li>
                    </ul>
                </div>
                <div class="card-body">

                        
                    @yield('conteudo-sobre-mim')

{{-- @include('template-admin.sobre-mim.informacao-pessoal-show') --}}

                </div>
            </div>

        </div>
    </div>
@endsection