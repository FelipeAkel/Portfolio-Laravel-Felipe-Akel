<div class="container-fluid">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
        <span class="mb-3 mb-md-0 text-body-secondary">Todos os Direitos Reservados &copy; 
        @if ($_SESSION['ds_url_linkedin'] != '' || $_SESSION['ds_url_github'] != '')
          <a href="{{ $_SESSION['ds_url_linkedin'] != '' ? $_SESSION['ds_url_linkedin'] : $_SESSION['ds_url_github'] }}" 
            class="link-footer" target="_blank"
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-dark"
            data-bs-title="Rede Social"
            ><b>{{ $_SESSION['no_usuario'] }}</b></a>
        @else
          <b>{{ $_SESSION['no_usuario'] }}</b>
        @endif
        </span>
    </div>
    @if ($_SESSION['ds_url_linkedin'] != '')
    <a href="{{ $_SESSION['ds_url_linkedin'] }}" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"
      data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-dark"
      data-bs-title="Rede Social Linkedin"
    >
        <i class="bi bi-linkedin link-footer"></i>
    </a>
    @endif
    @if ($_SESSION['ds_url_github'] != '')
      <a href="{{ $_SESSION['ds_url_github'] }}" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"
        data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-dark"
        data-bs-title="Rede Social GitHub"
      >
          <i class="bi bi-github link-footer"></i>
      </a>
    @endif
  </footer>
</div>