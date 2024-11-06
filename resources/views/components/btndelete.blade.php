<form action="{{ $actionBtn }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ $aletbtn }}');">Excluir</button>
</form>
