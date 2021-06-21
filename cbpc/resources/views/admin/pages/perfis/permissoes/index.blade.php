@php
$heads = [
    'ID',
    'Nome',
    ['label' => 'Actions', 'no-export' => true, 'width' => 10],
];

@endphp

@extends('adminlte::page')

@section('title', 'Permissoes do Perfil')

@section('content_header')
    <h1>Permissoes do perfil {{ $profile->name }} <a class="btn btn-success"><i class="fa fa-lg fa-fw fa-plus"></i></a></h1>
@stop



@section('content')
<div class="card">
    <div class="card-header">
        Permissoes do Perfil {{ $profile->name }}
    </div>
    <div class="card-body">
        <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark"
        striped hoverable bordered compressed>
        @foreach ($permissions as $permission)
            <tr>
                <td>
                    {{ $permission->id }}
                </td>
                <td>
                    {{ $permission->nome }}
                </td>
                <td>
                    <div class="row">
                        <a class="btn btn-xs btn-default text-primary mx-1 shadow align-self-center" href="{{ route('perfis.edit',$permission->id) }}">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <a class="btn btn-xs btn-default text-success mx-1 shadow align-self-center" href="{{ route('perfil.permissoes',$permission->id) }}">
                            <i class="fa fa-lg fa-fw fa-lock"></i>
                        </a>

                        <x-adminlte-button data-toggle="modal" data-target="#modalExcluir{{ $permission->id }}" theme="default" icon="fa fa-trash" class="btn btn-default text-danger mx-1 shadow"/>
                    </div>
                </td>
            </tr>
            <x-adminlte-modal id="modalExcluir{{ $permission->id }}" title="Confirmar Exclusão" size="sm" theme="danger"
            icon="fas fa-trash" v-centered static-backdrop scrollable>
                Você deseja realmente excluir <b>{{ $permission->nome }}</b>?
                <x-slot name="footerSlot">
                    <form action="{{ route('perfis.destroy',$permission->id) }}" method="POST">
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
