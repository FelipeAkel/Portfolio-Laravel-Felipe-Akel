<!-- RESUME -->
<div id="resume" class="iknow_tm_main_section">
    <div class="iknow_tm_resume">
        <div class="iknow_tm_main_title">
            <span>Resumo</span>
            <h3>Habilidades e experiência</h3>
        </div>
        <div class="resume_inner">
            <div class="left">
                {{-- Loop para pegar os Tipo Experiencia --}}
                @foreach ($tipoCarreiraProfissional AS $indice => $dadosTipoCarreiraProfissional )
                <div class="info_list">
                    <div class="iknow_tm_resume_title">
                        <h3>{{ $dadosTipoCarreiraProfissional->no_tipo_experiencia }}</h3>
                        <span class="shape"></span>
                    </div>
                    <ul>
                        {{-- Loop para pegar as Experiencia --}}
                        @foreach ($carreiraProfissional AS $indice2 => $dadosCarreiraProfissional )
                            @if($dadosCarreiraProfissional->id_tipo_experiencia == $dadosTipoCarreiraProfissional->id)
                            <li>
                                <div class="list_inner">
                                    <div class="short">
                                        <div class="job">
                                            <h3>{{ $dadosCarreiraProfissional->no_experiencia }}</h3>
                                            <span>{{ $dadosCarreiraProfissional->no_empresa }}</span>
                                        </div>
                                        <div class="year">
                                            <span>
                                                @php
                                                    echo date('Y', strtotime($dadosCarreiraProfissional->dt_inicio));
                                                @endphp 
                                                @php
                                                    if(!empty($dadosCarreiraProfissional->dt_final)){
                                                    echo ' - ' . date('Y', strtotime($dadosCarreiraProfissional->dt_final));
                                                    }
                                                @endphp
                                                {{ $dadosCarreiraProfissional->st_trabalho_atual == 1 ? ' - Atual' : '' }}
                                                </span>
                                        </div>
                                    </div>
                                    @empty(!$dadosCarreiraProfissional->ds_formacao)
                                        <div class="text">
                                            <p>{!! nl2br(e($dadosCarreiraProfissional->ds_formacao)) !!}</p>
                                        </div>
                                    @endempty
                                    @empty(!$dadosCarreiraProfissional->ds_url)
                                        <div class="text">
                                            <a href="{{ $dadosCarreiraProfissional->ds_url }}" class="certificado" target="_blank">Certificado</a>
                                        </div>
                                    @endempty
                                </div>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @endforeach

                @if ($arrayDadosTotais['totalCursoComplementar'] != 0)
                <div class="info_list">
                    <div class="iknow_tm_resume_title">
                        <h3>Cursos Complementares</h3>
                        <span class="shape"></span>
                    </div>
                    <ul>
                        <li>
                            <div class="list_inner">
                                <div class="short">
                                    <div class="job">
                                        <h3>Total: <span class="total">{{ $arrayDadosTotais['totalCursoComplementar'] }}</span> concluídos</h3>
                                        <span>Total: <span class="total">{{ $arrayDadosTotais['totalHorasAulas'] }}</span> horas/aula</span>
                                    </div>
                                    <div class="ano_curso_complementar">
                                        <span>Visualizar</span>
                                    </div>
                                </div>
                                <div class="text espacamento">
                                    <div class="iknow_tm_curso_complementar">
                                        <a class="iknow_tm_full_link" href="#"></a>
                                        <div class="hidden_content">
                                            <div class="curso_complementar">
                                                {{-- <div class="image">
                                                    <img src="{{ asset('template-internauta/img/') }}/thumbs/4-2.jpg" alt="" />
                                                    <div class="main" data-img-url="URL_CERTIFICADO"></div>
                                                </div> --}}
                                                <div class="description">
                                                    <h3 class="titulo-modal" >Cursos Concluídos</h3>
                                                    <ul class="list-group">
                                                        @foreach ($cursoComplementar AS $indice => $dadosCursos )
                                                            <a href="{{ $dadosCursos->ds_url }}" class="list-group-item" target="_blank">
                                                                <span class="nome-curso">{{ $dadosCursos->no_experiencia }}</span>
                                                                <br> {{  date('d/m/Y', strtotime($dadosCursos->dt_inicio)) }} - <span class="none-empresa">{{ $dadosCursos->no_empresa }}</span> - {{ $dadosCursos->nr_total_horas }} horas/aula.
                                                            </a>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>
                @endif

            </div>

            <div class="right">
                {{-- Habilidade --}}
                @foreach ($tipoHabilidade AS $indice => $dadosTipoHabilidade )
                    <div class="skills_list">
                        <div class="iknow_tm_resume_title">
                            <h3>{{ $dadosTipoHabilidade->no_tipo_habilidade }}</h3>
                            <span class="shape"></span>
                        </div>
                        <div class="personal">
                            <div class="dodo_progress">
                                @foreach ( $habilidade AS $indice => $dadosHabilidade)
                                    @if ($dadosHabilidade->id_tipo_habilidade == $dadosTipoHabilidade->id)
                                    <div class="progress_inner" data-value="{{ $dadosHabilidade->nr_porcentagem }}">
                                        <span><span class="label">{{ $dadosHabilidade->no_habilidade }} <span style="color: #a7afbd;">{{ $dadosHabilidade->ds_habilidade }}</span></span></span>
                                        <div class="background"><div class="bar"><div class="bar_in"></div></div></div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- FIM - Habilidade --}}
            </div>
        </div>
    </div>
</div>
<!-- /RESUME -->