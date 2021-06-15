@php
$heads = [
    'ID',
    'Nome',
    'Time',
    ['label' => 'Actions', 'no-export' => true, 'width' => 10],
];

@endphp
@extends('adminlte::page')

@section('title', 'Jogadores')

@section('content_header')
    <h1>Jogadores <a href="{{ route('jogadores.create') }}" class="btn btn-success"><i class="fa fa-lg fa-fw fa-plus"></i></a></h1>
@stop



@section('content')
<div class="card">
    <div class="card-header">
        Posicões
    </div>
    <div class="card-body">
        <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark"
        striped hoverable bordered compressed>
        @foreach ($jogadores as $jogador)
            <tr>
                <td>
                    {{ $jogador->id }}
                </td>
                <td>
                    {{ $jogador->nome }}
                </td>
                <td>
                    <div class="row">
                        <a class="btn btn-xs btn-default text-primary mx-1 shadow align-self-center" href="{{ route('posicoes.edit',$posicao->id) }}">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>

                        <x-adminlte-button data-toggle="modal" data-target="#modalExcluir{{ $posicao->id }}" theme="default" icon="fa fa-trash" class="btn btn-default text-danger mx-1 shadow"/>
                    </div>
                </td>
            </tr>
            <x-adminlte-modal id="modalExcluir{{ $posicao->id }}" title="Confirmar Exclusão" size="sm" theme="danger"
            icon="fas fa-trash" v-centered static-backdrop scrollable>
                Você deseja realmente excluir <b>{{ $posicao->nome }}</b>?
                <x-slot name="footerSlot">
                    <form action="{{ route('posicoes.destroy',$posicao->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-adminlte-button class="mr-auto" theme="danger" label="Excluir" type="submit"/>
                    </form>
                    <x-adminlte-button theme="dark" label="Cancelar" data-dismiss="modal"/>
                </x-slot>
            </x-adminlte-modal>
        @endforeach
        </x-adminlte-datatable>
    </div>

</div>

@stop
