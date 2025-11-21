<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 link-menu @yield('active-dashboard')" aria-current="page" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-bar-chart-fill"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 link-menu @yield('active-sobre-mim')" aria-current="page" href="{{ route('sobre-mim.informacao-pessoal-show') }}">
                        <i class="bi bi-person-vcard"></i>
                        Sobre Mim
                    </a>
                </li>
            </ul>

            <h6 class="d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-body-secondary"
                data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="true"
            >
                <span >Resumo</span>
                <a class="link-secondary" href="#" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                    </svg>
                </a>
            </h6>
            <div class="collapse show" id="account-collapse" style="">
                <ul class="nav flex-column mb-auto" >
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2 link-menu @yield('active-carreira-profissional')" href="{{ route('carreira-profissional.index') }}">
                            <i class="bi bi-award-fill"></i>
                            Carreira Profissional
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2 link-menu @yield('active-habilidade')" href="{{ route('habilidade.index') }}">
                            <i class="bi bi-graph-up-arrow"></i>
                            Habilidade
                        </a>
                    </li>

                </ul>
                <hr class="my-3">
            </div>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 link-menu @yield('active-portfolio')" href="{{ route('portfolio.index') }}">
                        <i class="bi bi-journal-richtext"></i>
                        Portfólio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 link-menu @yield('active-servicos')" href="{{ route('servicos.index') }}">
                        <i class="bi bi-stack-overflow"></i>
                        Serviços
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 link-menu @yield('active-fale-conosco')" href="{{ route('fale-conosco.index') }}">
                        <i class="bi bi-wechat"></i>
                        Fale Conosco
                    </a>
                </li>
            </ul>

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 dropdown-toggle link-menu" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <img 
                            src="{{ $_SESSION['ds_url_foto_usuario'] ? asset_path('storage/'. $_SESSION['ds_url_foto_usuario']) : asset_path('default/felipe-akel.jpg') }}" 
                            alt="'Imagem do usuário Felipe Akel'" width="32" height="32" 
                            class="rounded-circle">
                        {{ $_SESSION['no_usuario_portfolio'] }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" style="">
                        <li><a class="dropdown-item" href="{{ route('carreira-profissional.create') }}">Nova Experiência</a></li>
                        <li><a class="dropdown-item" href="{{ route('habilidade.create') }}">Nova Habilidade</a></li>
                        <li><a class="dropdown-item" href="{{ route('portfolio.create') }}">Novo Projeto</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('admin.logoff') }}">Sair</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 link-menu" href="{{ route('admin.logoff') }}">
                        <i class="bi bi-box-arrow-right"></i>
                        Sair
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
