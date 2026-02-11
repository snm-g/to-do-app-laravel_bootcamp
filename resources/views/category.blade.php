@extends('layouts.index')
@section('table-content')
<div class="button-add-div">
    <button class="button-add" id="button-add-category">Agregar nueva categoria</button>
</div>

<div class="table-div">
    <table class="table">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td style="font-weight: bold;">{{ $category->name }}</td>          
              
                <td>
                    <button class="button-edit-category" data-id="{{ $category->id }}" data-name="{{ $category->name }}" data-url="{{ route('category.update', $category->id) }}">Editar</button>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE') 
                        <button type="submit" class="btn-delete" onclick="return confirm('¿Estás seguro de borrar esta categoria?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div id="modal-create-category" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">NUEVA CATEGORÍA</h5>
        <span class="close-create-cat">&times;</span>
      </div>
      <div class="modal-body">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" class="form-input" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel close-modal-create-cat">Cancelar</button>
                <button type="submit" class="btn-save">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="modal-edit-category" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">EDITAR CATEGORÍA</h5>
        <span class="close-edit-cat">&times;</span>
      </div>
      <div class="modal-body">
        <form id="form-edit-category" action="" method="POST">
            @csrf
            @method('PUT') <div class="form-group">
                <label>Nombre</label>
                <input type="text" id="input-edit-category-name" name="name" class="form-input" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel close-modal-edit-cat">Cancelar</button>
                <button type="submit" class="btn-save">Actualizar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


