{{-- @include('admin.includes.alerts') --}}
<div class="form-group">
    <label>Nome da Permissão</label>
    <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ $permission->nome ?? old('nome')}}">
</div>
<div class="form-group">
    <label>Descricão</label>
    <textarea class="form-control" name="descricao" rows="3">{{ $permission->descricao ?? old('descricao') }}</textarea>
</div>
<div class="form-group">
    <label>Nível da Permissão</label>
    <select class="form-control" name="nivel">
        <option value="0" @if ($permission->nivel == 0) selected @endif >0</option>
        <option value="1" @if ($permission->nivel == 1) selected @endif >1</option>
        <option value="2" @if ($permission->nivel == 2) selected @endif >2</option>
        <option value="3" @if ($permission->nivel == 3) selected @endif >3</option>
    </select>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
