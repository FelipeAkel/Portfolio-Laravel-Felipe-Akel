<!-- TOPBAR -->
<div class="iknow_tm_topbar">
    <div class="container">
        <div class="topbar_inner">
            <div class="logo">
                <img src="{{ asset('default/logomarca-fa.png') }}" width="70px" alt="Logo Marcar Felipe Akel" />
            </div>
            <div class="right">
                <div class="iknow_tm_button">
                    <a href="{{ isset($sobreMim->ds_url_curriculo) ? asset("storage/$sobreMim->ds_url_curriculo") : asset('default/curriculo-felipe-akel.pdf') }}" download>Download CV</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /TOPBAR -->