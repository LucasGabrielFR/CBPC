@extends('adminlte::page')

@section('title', 'Editar Permissão')

@section('content_header')
    <h1>Editar Permissão  <b>{{ $permission->nome }}</b></h1>
@stop

@section('content')
<div class="col-6">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissoes.update',$permission->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.permissoes._partials.form')
            </form>
        </div>
    </div>
</div>
@stop
