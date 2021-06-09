@php
$heads = [
    'ID',
    'Nome',
    'Sigla',
    'Setor',
    ['label' => 'Actions', 'no-export' => true, 'width' => 10],
];

@endphp
@extends('adminlte::page')

@section('title', 'Posicões')

@section('content_header')
    <h1>Posicões <a href="{{ route('posicoes.create') }}" class="btn btn-success"><i class="fa fa-lg fa-fw fa-plus"></i></a></h1>
@stop



@section('content')
<div class="card">
    <div class="card-header">
        Posicões
    </div>
    <div class="card-body">
        <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark"
        striped hoverable bordered compressed>
        @foreach ($posicoes as $posicao)
            <tr>
                <td>
                    {{ $posicao->id }}
                </td>
                <td>
                    {{ $posicao->nome }}
                </td>
                <td>
                    {{ $posicao->sigla }}
                </td>
                <td>
                    {{ $posicao->setor }}
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
