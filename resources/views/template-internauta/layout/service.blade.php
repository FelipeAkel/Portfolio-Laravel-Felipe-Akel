<!-- SERVICES -->
<div id="service" class="iknow_tm_main_section">
    <div class="iknow_tm_services">
        <div class="iknow_tm_main_title">
            <h3>Serviços</h3>
        </div>
        <div class="service_list">
            <ul>
                @foreach ($servicos AS $indice => $dadoServico )
                <li>
                    <div class="list_inner">
                        <span class="icon"><img class="svg" src="{{ asset('storage/') }}/{{ $dadoServico->ds_url_icon_svg }}" alt="" /></span>
                        <h3 class="title">{{ $dadoServico->no_servico }}</h3>
                        <p class="text">{{ mb_strimwidth($dadoServico->ds_servico, 0, 40, "...") }}</p>
                        <a class="iknow_tm_full_link" href="#"></a>
                        <div class="hidden_content">
                            <div class="service_informations">
                                <div class="image">
                                    <img src="{{ asset('template-internauta/img/') }}/thumbs/4-2.jpg" alt="" />
                                    <div class="main" data-img-url="{{ asset('storage/') }}/{{ $dadoServico->ds_url_img }}"></div>
                                </div>
                                <div class="description">
                                    <p>{{ $dadoServico->ds_servico }}</p>
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
<!-- /SERVICES -->