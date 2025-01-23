<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 link-menu-header" href="{{ route('internauta.index') }}" target="_blank">Home Internauta</a>

    <ul class="navbar-nav flex-row">
        <li class="nav-item text-nowrap">
            <a class="nav-link px-3 link-menu-header" 
                data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip-dark"
                data-bs-title="Data e Hora Último Acesso: {{ date('d/m/Y - H:i', strtotime($_SESSION['dt_ultimo_acesso'])) }} ">
                <i class="bi bi-person-walking"></i>
            </a>
        </li>
        <li class="nav-item text-nowrap">
            <a class="nav-link px-3 link-menu-header">
                <img 
                    src="{{ $_SESSION['ds_url_foto_usuario'] ? asset('storage/' . $_SESSION['ds_url_foto_usuario']) : asset('default/felipe-akel.jpg') }}"
                    alt="Imagem do usuário Felipe Akel" width="32" height="32" 
                    class="rounded-circle"
                >
                {{ $_SESSION['no_usuario_portfolio'] }}
            </a>
        </li>
        <li class="nav-item text-nowrap">
            <a href="{{ route('admin.logoff') }}" class="nav-link px-3 link-menu-header" 
                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-dark"
                data-bs-title="Sair">
                <i class="bi bi-box-arrow-right"></i>
            </a>
        </li>
    </ul>

    <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
        </li>
    </ul>

</header>
