@php
$heads = [
    'ID',
    'Nome',
    ['label' => 'Add', 'no-export' => true, 'width' => 10],
];

@endphp

@extends('adminlte::page')

@section('title', 'Vincular Permissões')

@section('content_header')
    <h1>Vincular permissões ao perfil:  <b>{{ $profile->nome }}</b></h1>
@stop



@section('content')
<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark"
        striped hoverable bordered compressed>

        <form action="{{ route('perfil.store.permissoes',$profile->id) }}" method="POST">
            @csrf

            @foreach ($permissions as $permission)
            <tr>
                <td>
                    {{ $permission->id }}
                </td>
                <td>
                    {{ $permission->nome }}
                </td>
                <td>
                    <input type="checkbox" name="permissoes[]" value="{{ $permission->id }}">
                </td>

            </tr>

            @endforeach

            <tr>
                @include('admin.includes.alerts')
                <td colspan="500" class="text-center">
                    <button type="submit" class="btn btn-success">Vincular</button>
                </td>
            </tr>

        </form>

        </x-adminlte-datatable>
    </div>

</div>

@stop
