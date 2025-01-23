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
                        $img_svg = 'website-one-page';

                        if (strpos($dadosProjeto->ds_tipo_projeto, 'angular') !== false) {
                            $img_svg = 'angular';
                        }
                        if (strpos($dadosProjeto->ds_tipo_projeto, 'php-laravel') !== false) {
                            $img_svg = 'laravel-2';
                        }
                    @endphp

                    <li class="{{ $dadosProjeto->ds_tipo_projeto }}">
                        <div class="list_inner">
                            <div class="image">
                                {{-- A dimenções da imagem eram 1x1 --}}
                                <img src="{{ isset($dadosProjeto->ds_url_img_destaque) ? asset("storage/$dadosProjeto->ds_url_img_destaque") : asset('default/default-projeto.png') }}" alt="Imagem do Projeto" />
                                <div class="main" data-img-url="{{ isset($dadosProjeto->ds_url_img_destaque) ? asset("storage/$dadosProjeto->ds_url_img_destaque") : asset('default/default-projeto.png') }}"></div>
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
                                            <p>{!! nl2br(e($dadosProjeto->ds_projeto)) !!}</p>
                                            <h5 class="titulo-portfolio" > Tecnologias </h5>
                                            <p>{!! nl2br(e($dadosProjeto->ds_tecnologia)) !!}</p>
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
                                    @if ($dadosProjeto->ds_url_img_1_galeria != null && $dadosProjeto->ds_url_img_2_galeria != null && $dadosProjeto->ds_url_img_3_galeria != null)
                                        <div class="additional_images">
                                            <ul>
                                                @if ($dadosProjeto->ds_url_img_1_galeria)
                                                    <li>
                                                        <div class="list_inner">
                                                            <div class="my_image">
                                                                {{-- A dimenções da imagem eram 4x2 --}}
                                                                <img src="{{ asset('storage/') }}/{{ $dadosProjeto->ds_url_img_1_galeria }}" alt="" />
                                                                <div class="main" data-img-url="{{ asset('storage/') }}/{{ $dadosProjeto->ds_url_img_1_galeria }}"></div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                                @if ($dadosProjeto->ds_url_img_2_galeria)
                                                    <li>
                                                        <div class="list_inner">
                                                            <div class="my_image">
                                                                {{-- A dimenções da imagem eram 4x2 --}}
                                                                <img src="{{ asset('storage/') }}/{{ $dadosProjeto->ds_url_img_2_galeria }}" alt="" />
                                                                <div class="main" data-img-url="{{ asset('storage/') }}/{{ $dadosProjeto->ds_url_img_2_galeria }}"></div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                                @if ($dadosProjeto->ds_url_img_3_galeria)
                                                    <li>
                                                        <div class="list_inner">
                                                            <div class="my_image">
                                                                {{-- A dimenções da imagem eram 4x2 --}}
                                                                <img src="{{ asset('storage/') }}/{{ $dadosProjeto->ds_url_img_3_galeria }}" alt="" />
                                                                <div class="main" data-img-url="{{ asset('storage/') }}/{{ $dadosProjeto->ds_url_img_3_galeria }}"></div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    @endif
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