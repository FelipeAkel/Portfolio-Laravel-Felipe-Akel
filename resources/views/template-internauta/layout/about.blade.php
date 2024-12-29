<!-- ABOUT -->
<div id="about" class="iknow_tm_main_section">
    <div class="iknow_tm_about">
        <div class="left">
            <div class="left_inner">
                <div class="image">
                    <img src="{{ asset('template-internauta/img/') }}/thumbs/35-44.jpg" alt="" />
                    <div class="main" data-img-url="{{ asset('storage/') }}/{{ $sobreMim->ds_url_foto_usuario }}"></div>
                </div>
                <div class="details">
                    <ul>
                        <li>
                            <h3>Nome</h3>
                            <span>{{ $sobreMim->no_usuario }}</span>
                        </li>
                        <li>
                            <h3>E-mail</h3>
                            <span>{{ $sobreMim->ds_email }}</span>
                        </li>
                        <li>
                            <h3>Telefone</h3>
                            <span>+55 {{ $sobreMim->ds_telefone }}</span>
                        </li>
                        <li>
                            <h3>Estado</h3>
                            <span>{{ $sobreMim->ds_cidade_uf }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="iknow_tm_main_title">
                <span>Sobre Mim</span>
                <h3>{{ $sobreMim->ds_funcao }}</h3>
            </div>
            <div class="bigger_text">
                <p>{{ $sobreMim->ds_subtitulo }}</p>
            </div>
            <div class="text">
                <p>{!! nl2br(e($sobreMim->ds_perfil)) !!}</p>
            </div>
            <div class="iknow_tm_button">
                <a href="{{ asset('storage/') }}/{{ $sobreMim->ds_url_curriculo }}" download>Download CV</a>
            </div>
        </div>
    </div>
</div>
<!-- /ABOUT -->