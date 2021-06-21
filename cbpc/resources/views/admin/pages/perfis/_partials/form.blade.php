{{-- @include('admin.includes.alerts') --}}
<div class="form-group">
    <label>Nome do Perfil</label>
    <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ $profile->nome ?? old('nome')}}">
</div>
<div class="form-group">
    <label>Descricão</label>
    <textarea class="form-control" name="descricao" rows="3">{{ $profile->descricao ?? old('descricao') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
