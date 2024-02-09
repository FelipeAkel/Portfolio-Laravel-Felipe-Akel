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
                                <span><a href="https://api.whatsapp.com/send/?phone=5561991939043&text=Ol%C3%A1%2C+este+%C3%A9+o+contato+direto+para+conversar+com+o+Felipe+Akel+em+que+posso+ajuda-lo%3F&type=phone_number&app_absent=0" target="_blank">+55 (61) 9 9193-9043</a></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="list_inner">
                            <span class="icon"><img class="svg" src="{{ asset('template-internauta/img/') }}/svg/letter.svg" alt="" /></span>
                            <div class="short">
                                <h3>Enviar E-mail</h3>
                                <span><a href="mailto:felipe.akel01@gmail.com?subject='Sobre o Currículo e Portfólio'">felipe.akel01@gmail.com</a></span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="right">
                <div class="fields">
                    <form action="/" method="post" class="contact_form" id="contact_form" autocomplete="off">
                        <div class="returnmessage" data-success="Your message has been received, We will contact you soon."></div>
                        <div class="empty_notice"><span>Preencha os campos obrigatórios</span></div>
                        <div class="input_list">
                            <ul>
                                <li><input id="name" type="text" placeholder="Seu Nome" /></li>
                                <li><input id="email" type="text" placeholder="Seu E-mail" /></li>
                                <li><input id="phone" type="number" placeholder="Seu Contato" /></li>
                                <li><input id="subject" type="text" placeholder="Assunto" /></li>
                            </ul>
                        </div>
                        <div class="message_area">
                            <textarea id="message" placeholder="Sua Mensagem Aqui"></textarea>
                        </div>
                        <div class="iknow_tm_button">
                            <a id="send_message" href="#">Enviar Agora</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /CONTACT -->