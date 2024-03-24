@extends('email.layout.template')

@section('conteudoEmail')
    {{-- Texto que é apresentado na lista geral antes de abrir o e-mail --}}
    <span class="preheader">Sua mensagem foi respondida!</span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="main">

    <!-- START MAIN CONTENT AREA -->
    <tr>
        <td class="wrapper">
        <p>Olá <b>{{ $parametrosEmail['nomeContato'] }}</b></p>
        <p>O senhor(a) enviou uma mensagem de assunto, <b>{{ $parametrosEmail['assunto'] }}</b>, através do formulário de contato e trago uma resposta!</p>
        <p><b>Menssagem</b>: {{ $parametrosEmail['mensagem'] }}</p>
        <p><b>Status</b>: {{ $parametrosEmail['status'] }}</p>
        <p><b>Resposta</b>: {{ $parametrosEmail['resposta'] }}</p>
        </td>
    </tr>
    <!-- END MAIN CONTENT AREA -->
    </table>
@endsection