@extends('template-admin.sobre-mim.index')

@section('active-sobre-mim', 'active')

@section('active-logs-sistema', 'active')

@section('conteudo-sobre-mim')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Logs do Sistema</h2>
    </div>
    
    <div class="list-group">
        @foreach ($logsSistema AS $indice => $dadoLog )
            @switch($dadoLog->id_status)
                @case(6)
                    @php $class="success"; @endphp
                    @break
                @case(7)
                    @php $class="primary"; @endphp
                    @break
                @case(8)
                    @php $class="danger"; @endphp
                    @break
                @case(9)
                    @php $class="info"; @endphp
                    @break
                @case(10)
                    @php $class="light"; @endphp
                    @break
                @default
                    @php $class="dark"; @endphp
            @endswitch
            <a class="list-group-item list-group-item-action list-group-item-{{ $class }}" >
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $dadoLog->status->no_status }}</h5>
                <small> {{ date('d/m/Y H:i', strtotime($dadoLog->created_at)) }} </small>
                </div>
                <p class="mb-1">{{ $dadoLog->ds_log_executado }}</p>
            </a>
        @endforeach
    </div>
    
    <p>
        {{ $logsSistema->links() }}
        <b>Exibindo {{ $logsSistema->count() }} registros de {{ $logsSistema->total() }} (De {{ $logsSistema->firstItem() }} a {{ $logsSistema->lastItem() }})</b>
    </p>
@endsection