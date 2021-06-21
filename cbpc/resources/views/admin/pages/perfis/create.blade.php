@extends('adminlte::page')

@section('title', 'Cadastrar Nova Permissão')

@section('content_header')
    <h1>Cadastrar Novo Perfil</h1>
@stop

@section('content')
<div class="col-6">
    <div class="card">
        <div class="card-body">

            <form action="{{ route('perfis.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.perfis._partials.form')
            </form>
        </div>
    </div>
</div>
@stop
