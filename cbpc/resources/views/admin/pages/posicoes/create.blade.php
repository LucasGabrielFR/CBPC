@extends('adminlte::page')

@section('title', 'Cadastrar Nova Posicão')

@section('content_header')
    <h1>Cadastrar Nova Posicão</h1>
@stop

@section('content')
<div class="col-6">
    <div class="card">
        <div class="card-body">

            <form action="{{ route('posicoes.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.posicoes._partials.form')
            </form>
        </div>
    </div>
</div>
@stop
