<!-- PORTFOLIO -->
<div id="portfolio" class="iknow_tm_main_section">
    <div class="iknow_tm_portfolio">
        <div class="iknow_tm_main_title">
            <span>Resumo</span>
            <h3>Meus trabalhos e projetos</h3>
        </div>
        <div class="portfolio_filter">
            <ul>
                <li><a href="#" class="current" data-filter="*">Todos</a></li>
                <li><a href="#" data-filter=".php-laravel">PHP | Laravel</a></li>
                <li><a href="#" data-filter=".website">Website</a></li>
                <li><a href="#" data-filter=".landing-page">Landing Page</a></li>
                <li><a href="#" data-filter=".angular">Angular</a></li>
            </ul>
        </div>
        <div class="portfolio_list">
            <ul class="gallery_zoom">
                @foreach ($portfolio AS $indice => $dadosProjeto)
                    @if (isset($dadosProjeto->no_cliente) || isset(($dadosProjeto->ds_url_projeto)) || isset($dadosProjeto->ds_url_repositorio))
                        @php $width_100_boolean = false; @endphp
                    @else
                        @php $width_100_boolean = true; @endphp
                    @endif
                    @php
                        // Imagem icone
                        $verifica_php_laravel = strpos($dadosProjeto->ds_tipo_projeto, 'php-laravel');
                        $verifica_php_laravel === false ? $img_svg = 'website-one-page' : $img_svg = 'laravel-2';

                        $verifica_angular = strpos($dadosProjeto->ds_tipo_projeto, 'angular');
                        $verifica_angular === false ? $img_svg = 'website-one-page' : $img_svg = 'angular';
                    @endphp

                    <li class="{{ $dadosProjeto->ds_tipo_projeto }}">
                        <div class="list_inner">
                            <div class="image">
                                <img src="{{ asset('template-internauta/img/') }}/thumbs/1-1.jpg" alt="" />
                                <div class="main" data-img-url="{{ asset('storage/') }}/{{ $dadosProjeto->ds_url_img_destaque }}"></div>
                            </div>
                            <div class="overlay"></div>
                            <img class="svg" src="{{ asset('template-internauta/img/svg/') }}/{{ $img_svg }}.svg" alt="" />
                            <div class="details">
                                <span>Detalhes</span>
                                <h3> {{ $dadosProjeto->no_projeto }} </h3>
                            </div>
                            <a class="iknow_tm_full_link portfolio_popup" href="#"></a>
                            
                            <div class="hidden_content">
                                <div class="popup_details">
                                    <div class="main_details">
                                        <div class="textbox" style="{{ $width_100_boolean == true ? 'width: 100%;' : '' }}" >
                                            <p>{{ $dadosProjeto->ds_projeto }}</p>
                                            <h5 class="titulo-portfolio" > Tecnologias </h5>
                                            <p>{{ $dadosProjeto->ds_tecnologia }}</p>
                                        </div>
                                        @if ( $width_100_boolean == false)
                                            <div class="detailbox">
                                                <ul>
                                                    @if (isset($dadosProjeto->no_cliente))
                                                        <li>
                                                            <span class="first">Cliente</span>
                                                            <span>{{ $dadosProjeto->no_cliente }}</span>
                                                        </li>
                                                    @endif
                                                    @if (isset($dadosProjeto->ds_url_projeto))
                                                        <li>
                                                            <span class="first">Projeto</span>
                                                            <span><a class="links-portfolio" href="{{ $dadosProjeto->ds_url_projeto }}" target="_blank">Visualizar</a></span>
                                                        </li>
                                                    @endif
                                                    @if (isset($dadosProjeto->ds_url_repositorio))
                                                        <li>
                                                            <span class="first">Repositório</span>
                                                            <span><a class="links-portfolio" href="{{ $dadosProjeto->ds_url_repositorio }}" target="_blank">GitHub</a></span>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="additional_images">
                                        <ul>
                                            <li>
                                                <div class="list_inner">
                                                    <div class="my_image">
                                                        <img src="{{ asset('template-internauta/img/') }}/thumbs/4-2.jpg" alt="" />
                                                        <div class="main" data-img-url="{{ asset('storage/') }}/{{ $dadosProjeto->ds_url_img_1_galeria }}"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="list_inner">
                                                    <div class="my_image">
                                                        <img src="{{ asset('template-internauta/img/') }}/thumbs/4-2.jpg" alt="" />
                                                        <div class="main" data-img-url="{{ asset('storage/') }}/{{ $dadosProjeto->ds_url_img_2_galeria }}"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="list_inner">
                                                    <div class="my_image">
                                                        <img src="{{ asset('template-internauta/img/') }}/thumbs/4-2.jpg" alt="" />
                                                        <div class="main" data-img-url="{{ asset('storage/') }}/{{ $dadosProjeto->ds_url_img_3_galeria }}"></div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
<!-- /PORTFOLIO -->