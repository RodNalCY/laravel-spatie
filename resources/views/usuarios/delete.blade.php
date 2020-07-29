<form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display: inline-block">
   @method('DELETE')
   @csrf
   <button type="submit" class="btn btn-danger"> Eliminar </button>
</form>
