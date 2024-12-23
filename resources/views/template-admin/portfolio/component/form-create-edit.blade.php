@if (isset($portfolio->id))
<form class="row g-3" action="{{ route('portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
<form class="row g-3" action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
    
@endif

    @csrf
    <div class="mb-3 col-md-4">
        <label class="form-label">Tipo de Projeto <span class="required">*</span></label>
        <div class="form-check">
            <input class="form-check-input {{ $errors->has('tipo_projeto') || $errors->has('php-laravel') ? 'is-invalid' : '' }}" 
                name="tipo_php_laravel" id="tipo_php_laravel" value="php-laravel" type="checkbox" 
                {{ ($portfolio->tipo_php_laravel ?? old('tipo_php_laravel')) == 'php-laravel' ? 'checked' : '' }} >
            <label class="form-check-label " for="tipo_php_laravel">
                PHP | Laravel
            </label>
            @error('tipo_php_laravel')
                <div class="invalid-feedback">
                    {{ $errors->first('tipo_php_laravel') }}
                </div>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input {{ $errors->has('tipo_projeto') || $errors->has('tipo_website') ? 'is-invalid' : '' }}"
                name="tipo_website" id="tipo_website" value="website" type="checkbox" 
                {{ ($portfolio->tipo_website ?? old('tipo_website')) == 'website' ? 'checked' : '' }} >
            <label class="form-check-label" for="tipo_website">
                Website
            </label>
            @error('tipo_website')
                <div class="invalid-feedback">
                    {{ $errors->first('tipo_website') }}
                </div>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input {{ $errors->has('tipo_projeto') || $errors->has('tipo_landing_page') ? 'is-invalid' : '' }}" 
                name="tipo_landing_page" id="tipo_landing_page" value="landing-page" type="checkbox" 
                {{ ($portfolio->tipo_landing_page ?? old('tipo_landing_page')) == 'landing-page' ? 'checked' : '' }} >
            <label class="form-check-label" for="tipo_landing_page">
                Landing Page
            </label>
            @error('tipo_landing_page')
                <div class="invalid-feedback">
                    {{ $errors->first('tipo_landing_page') }}
                </div>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input {{ $errors->has('tipo_projeto') || $errors->has('tipo_angular') ? 'is-invalid' : '' }}" 
                name="tipo_angular" id="tipo_angular" value="angular" type="checkbox" 
                {{ ($portfolio->tipo_angular ?? old('tipo_angular')) == 'angular' ? 'checked' : '' }} >
            <label class="form-check-label" for="tipo_angular">
                Angular
            </label>
            @error('tipo_angular')
                <div class="invalid-feedback">
                    {{ $errors->first('tipo_angular') }}
                </div>
            @enderror
        </div>

        @if ($errors->has('tipo_projeto'))
            <div class="invalid-feedback d-block">
                {{ $errors->first('tipo_projeto') }}
            </div>
        @endif
        
    </div>

    <div class="mb-3 col-md-4">
        <label for="no_projeto" class="form-label">Nome Projeto <span class="required">*</span></label>
        <input type="text" class="form-control {{ $errors->has('no_projeto') ? 'is-invalid' : '' }}" 
            name="no_projeto" id="no_projeto" value="{{ $portfolio->no_projeto ?? old('no_projeto') }}" >
        @error('no_projeto')
            <div class="invalid-feedback">
                {{ $errors->first('no_projeto') }}
            </div>
        @enderror
    </div>

    <div class="mb-3 col-md-4">
        <label for="no_cliente" class="form-label">Nome do Cliente </label>
        <input type="text" class="form-control {{ $errors->has('no_cliente') ? 'is-invalid' : '' }}" 
            name="no_cliente" id="no_cliente" value="{{ $portfolio->no_cliente ?? old('no_cliente') }}" >
        @error('no_cliente')
            <div class="invalid-feedback">
                {{ $errors->first('no_cliente') }}
            </div>
        @enderror
    </div>

    <div class="mb-3 col-md-3">
        <label for="dt_inicio" class="form-label">Data Início </label>
        <div class="input-group mb-3">
            <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
            <input type="date" class="form-control {{ $errors->has('dt_inicio') ? 'is-invalid' : '' }}" 
                name="dt_inicio" id="dt_inicio" value="{{ $portfolio->dt_inicio ?? old('dt_inicio') }}" >
            @error('dt_inicio')
                <div class="invalid-feedback">
                    {{ $errors->first('dt_inicio') }}
                </div>
            @enderror
        </div>
    </div>

    <div class="mb-3 col-md-3">
        <label for="dt_finalizacao" class="form-label">Data Finalização </label>
        <div class="input-group mb-3">
            <span class="input-group-text icone" ><i class="bi bi-calendar4-event"></i></span>
            <input type="date" class="form-control {{ $errors->has('dt_finalizacao') ? 'is-invalid' : '' }}" 
                name="dt_finalizacao" id="dt_finalizacao" value="{{ $portfolio->dt_finalizacao ?? old('dt_finalizacao') }}" >
            @error('dt_finalizacao')
                <div class="invalid-feedback">
                    {{ $errors->first('dt_finalizacao') }}
                </div>
            @enderror
        </div>
    </div>

    <div class="mb-3 col-md-3">
        <label for="ds_url_projeto" class="form-label">URL do Projeto</label>
        <div class="input-group">
            <a class="btn btn-outline-secondary {{ isset($portfolio->ds_url_projeto) ? '' : 'disabled' }}" href="#" target="_blank">Acessar URL</a>
            <input type="text" class="form-control {{ $errors->has('ds_url_projeto') ? 'is-invalid' : '' }}" 
                name="ds_url_projeto" id="ds_url_projeto" value="{{ $portfolio->ds_url_projeto ?? old('ds_url_projeto') }}" > 
            @error('ds_url_projeto')
                <div class="invalid-feedback">
                    {{ $errors->first('ds_url_projeto') }}
                </div>
            @enderror
        </div>
    </div>

    <div class="mb-3 col-md-3">
        <label for="ds_url_repositorio" class="form-label">URL do Repositório</label>
        <div class="input-group">
            <a class="btn btn-outline-secondary {{ isset($portfolio->ds_url_repositorio) ? '' : 'disabled' }}" href="#" target="_blank">Acessar URL</a>
            <input type="text" class="form-control {{ $errors->has('ds_url_repositorio') ? 'is-invalid' : '' }}" 
                name="ds_url_repositorio" id="ds_url_repositorio" value="{{ $portfolio->ds_url_repositorio ?? old('ds_url_repositorio') }}" > 
            @error('ds_url_repositorio')
                <div class="invalid-feedback">
                    {{ $errors->first('ds_url_repositorio') }}
                </div>
            @enderror
        </div>
    </div>

    <div class="mb-3 col-md-12">
        <label for="ds_projeto" class="form-label">Descrição do Projeto <span class="required">*</span></label>
        <textarea class="form-control {{ $errors->has('ds_projeto') ? 'is-invalid' : '' }}" 
            name="ds_projeto" id="ds_projeto" rows="3" >{{ $portfolio->ds_projeto ?? old('ds_projeto') }}</textarea>
        @error('ds_projeto')
            <div class="invalid-feedback">
                {{ $errors->first('ds_projeto') }}
            </div>
        @enderror
    </div>

    <div class="mb-3 col-md-12">
        <label for="ds_tecnologia" class="form-label">Descrição Tecnologias <span class="required">*</span></label>
        <textarea class="form-control {{ $errors->has('ds_tecnologia') ? 'is-invalid' : '' }}" 
            name="ds_tecnologia" id="ds_tecnologia" rows="3" >{{ $portfolio->ds_tecnologia ?? old('ds_tecnologia') }}</textarea>
        <div class="form-text">
            Exemplos: HTML | CSS | PHP | Laravel | Angular | Bootstrap | MySQL...
        </div>
        @error('ds_tecnologia')
            <div class="invalid-feedback">
                {{ $errors->first('ds_tecnologia') }}
            </div>
        @enderror
    </div>

    <h5 class="titulo-1rem">Imagens do Projeto</h5>

    <div class="mb-3 col-md-6">
        <label for="file_img_destaque" class="form-label">Upload IMG - Destaque <span class="required">*</span></label>
        <input class="form-control {{ $errors->has('file_img_destaque') ? 'is-invalid' : '' }}" type="file" name="file_img_destaque" id="file_img_destaque">
        <div id="file_img_destaque" class="form-text">
            Extensão: png, jpg ou jpeg<br />
            Dimensões: 1x1, ou seja, img deve ser quadrada
        </div>
        @error('file_img_destaque')
            <div class="invalid-feedback">
                {{ $errors->first('file_img_destaque') }}
            </div>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label for="file_img_1_galeria" class="form-label">Upload IMG - 1º Imagem</label>
        <input class="form-control {{ $errors->has('file_img_1_galeria') ? 'is-invalid' : '' }}" type="file" name="file_img_1_galeria" id="file_img_1_galeria" multiple>
        <div class="form-text">
            Extensão: png, jpg ou jpeg
        </div>
        @error('file_img_1_galeria')
            <div class="invalid-feedback">
                {{ $errors->first('file_img_1_galeria') }}
            </div>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label for="file_img_2_galeria" class="form-label">Upload IMG - 2º Imagem</label>
        <input class="form-control {{ $errors->has('file_img_2_galeria') ? 'is-invalid' : '' }}" type="file" name="file_img_2_galeria" id="file_img_2_galeria" multiple>
        <div class="form-text">
            Extensão: png, jpg ou jpeg
        </div>
        @error('file_img_2_galeria')
            <div class="invalid-feedback">
                {{ $errors->first('file_img_2_galeria') }}
            </div>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label for="file_img_3_galeria" class="form-label">Upload IMG - 3º Imagem</label>
        <input class="form-control {{ $errors->has('file_img_3_galeria') ? 'is-invalid' : '' }}" type="file" name="file_img_3_galeria" id="file_img_3_galeria" multiple>
        <div class="form-text">
            Extensão: png, jpg ou jpeg
        </div>
        @error('file_img_3_galeria')
            <div class="invalid-feedback">
                {{ $errors->first('file_img_3_galeria') }}
            </div>
        @enderror
    </div>

    @if (isset($portfolio->id))
        <div class="mb-3 col-md-3">
            <div class="card text-center border-warning" style="width: 18rem;">
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalImgDestaque">
                    <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_destaque }}" class="card-img-top img-proporcao" alt="Imagem em Destaque">
                </a>
                <div class="card-body text-warning">
                    <p class="card-text">Imagem em Destaque</p>
                    <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalImgDestaque">
                        <i class="bi bi-search"></i> Ampliar
                    </a>
                </div>
            </div>
        </div>
        @if (isset($portfolio->ds_url_img_1_galeria))
            <div class="mb-3 col-md-3">
                <div class="card text-center" style="width: 18rem;">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalImgGaleria1">
                        <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_1_galeria }}" class="card-img-top img-proporcao" alt="1º Imagem Galeria Modal">
                    </a>
                    <div class="card-body">
                        <p class="card-text">1º Imagem da Galeria Modal</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalImgGaleria1">
                            <i class="bi bi-search"></i> Ampliar
                        </a>
                    </div>
                </div>
            </div>
        @endif
        @if (isset($portfolio->ds_url_img_2_galeria))
            <div class="mb-3 col-md-3">
                <div class="card text-center" style="width: 18rem;">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalImgGaleria2">
                        <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_2_galeria }}" class="card-img-top img-proporcao" alt="2º Imagem Galeria Modal">
                    </a>
                    <div class="card-body">
                        <p class="card-text">2º Imagem da Galeria Modal</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalImgGaleria2">
                            <i class="bi bi-search"></i> Ampliar
                        </a>
                    </div>
                </div>
            </div>
        @endif
        @if (isset($portfolio->ds_url_img_3_galeria))
            <div class="mb-3 col-md-3">
                <div class="card text-center" style="width: 18rem;">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalImgGaleria3">
                        <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_3_galeria }}" class="card-img-top img-proporcao" alt="3º Imagem Galeria Modal">
                    </a>
                    <div class="card-body">
                        <p class="card-text">3º Imagem da Galeria Modal</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalImgGaleria3">
                            <i class="bi bi-search"></i> Ampliar
                        </a>
                    </div>
                </div>
            </div>
        @endif
    @endif

    <div class="col-12">
        <a href="{{ route('portfolio.index') }}" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn {{ isset($portfolio->id) ? 'btn-primary' : 'btn-success' }}">{{ isset($portfolio->id) ? 'Atualizar' : 'Cadastrar' }}</button>
    </div>
</form>

<!-- Modal -->
@if (isset($portfolio->id))
<div class="modal fade" id="modalImgDestaque" tabindex="-1" aria-labelledby="modalImgDestaqueLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalImgDestaqueLabel">Imagem em Destaque</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <figure class="figure">
                <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_destaque }}" class="figure-img img-fluid rounded" alt="Imagem em Destaque">
                <figcaption class="figure-caption">Imagem em Destaque</figcaption>
            </figure>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
</div>
@endif
@if (isset($portfolio->ds_url_img_1_galeria))
<div class="modal fade" id="modalImgGaleria1" tabindex="-1" aria-labelledby="modalImgGaleria1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalImgGaleria1Label">1º Imagem Galeria Modal</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <figure class="figure">
                <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_1_galeria }}" class="figure-img img-fluid rounded" alt="1º Imagem Galeria Modal">
                <figcaption class="figure-caption">1º Imagem Galeria Modal</figcaption>
            </figure>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
</div>
@endif
@if (isset($portfolio->ds_url_img_2_galeria))
<div class="modal fade" id="modalImgGaleria2" tabindex="-1" aria-labelledby="modalImgGaleria2Label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalImgGaleria2Label">2º Imagem Galeria Modal</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <figure class="figure">
                <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_2_galeria }}" class="figure-img img-fluid rounded" alt="2º Imagem Galeria Modal">
                <figcaption class="figure-caption">2º Imagem Galeria Modal</figcaption>
            </figure>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
</div>
@endif
@if (isset($portfolio->ds_url_img_3_galeria))
<div class="modal fade" id="modalImgGaleria3" tabindex="-1" aria-labelledby="modalImgGaleria3Label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalImgGaleria3Label">3º Imagem Galeria Modal</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <figure class="figure">
                <img src="{{ asset('storage/') }}/{{ $portfolio->ds_url_img_3_galeria }}" class="figure-img img-fluid rounded" alt="3º Imagem Galeria Modal">
                <figcaption class="figure-caption">3º Imagem Galeria Modal</figcaption>
            </figure>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
</div>
@endif