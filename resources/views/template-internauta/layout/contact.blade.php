<!-- CONTACT -->
<div id="contact" class="iknow_tm_main_section">
    <div class="iknow_tm_contact">
        <div class="iknow_tm_main_title">
            <span>Contate-me</span>
            <h3>Entrar em contato</h3>
        </div>
        <div class="wrapper">
            <div class="left">
                <ul>
                    <li>
                        <div class="list_inner">
                            <span class="icon"><img class="svg" src="{{ asset('template-internauta/img/') }}/svg/whatsapp.svg" alt="" /></span>
                            {{-- <span class="icon"><i class="svg bi bi-whatsapp" style="font-size: 30px;"></i></span> --}}
                            <div class="short">
                                <h3>Me mande um WhatsApp</h3>
                                <span><a href="https://api.whatsapp.com/send/?phone=5561991939043&text=Ol%C3%A1%2C+este+%C3%A9+o+contato+direto+para+conversar+com+o+Felipe+Akel+em+que+posso+ajuda-lo%3F&type=phone_number&app_absent=0" target="_blank">+55 {{ $sobreMim->ds_telefone }}</a></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="list_inner">
                            <span class="icon"><img class="svg" src="{{ asset('template-internauta/img/') }}/svg/letter.svg" alt="" /></span>
                            <div class="short">
                                <h3>Enviar E-mail</h3>
                                <span><a href="mailto:{{ $sobreMim->ds_email }}?subject='Sobre seu Currículo e Portfólio'">{{ $sobreMim->ds_email }}</a></span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="right">
                <div class="fields">
                    <form action="{{ route('internauta.contato.store') }}" method="post" class="contact_form" id="form_contato" autocomplete="off">
                        @csrf
                        @if ($errors->has('no_contato') || $errors->has('ds_email') || $errors->has('ds_assunto') || $errors->has('ds_mensagem'))
                        <div class="empty_notice" ><span>
                            Todos os campos são obigatório.<br>
                            E-mail deve ser um dado válido.<br>
                            O campo Nome, E-mail e Assunto são limitados a 70 caracteres.
                        </span></div>
                        @endif
                        
                        <div class="input_list">
                            <ul>
                                <li><input name="no_contato" id="no_contato" type="text" placeholder="Seu Nome" value="{{ old('no_contato') }}" required/></li>
                                <li><input name="ds_email" id="ds_email" type="text" placeholder="Seu E-mail" value="{{ old('ds_email') }}" required/></li>
                                <li><input name="ds_assunto" id="ds_assunto" type="text" placeholder="Assunto" value="{{ old('ds_assunto') }}" required/></li>
                            </ul>
                        </div>
                        <div class="message_area">
                            <textarea name="ds_mensagem" id="ds_mensagem" placeholder="Sua Mensagem Aqui" required>{{ old('ds_mensagem') }}</textarea>
                        </div>
                        <div class="iknow_tm_button">
                            <a href="#" onClick="document.getElementById('form_contato').submit();" >Enviar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /CONTACT -->