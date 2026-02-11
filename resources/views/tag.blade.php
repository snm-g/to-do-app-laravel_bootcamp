@extends('layouts.index')
@section('table-content')
<div class="button-add-div">
    <button class="button-add" id="button-add-tag">Agregar nueva etiqueta</button>
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
            @foreach($tags as $tag)
            <tr>
                <td style="font-weight: bold;">{{ $tag->name }}</td>          
              
                <td>
                    <button class="button-edit-tag" data-id="{{ $tag->id }}" data-name="{{ $tag->name }}" data-url="{{ route('tag.update', $tag->id) }}">Editar</button>

                    <form action="{{ route('tag.destroy', $tag->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE') 
                        <button type="submit" class="btn-delete" onclick="return confirm('¿Estás seguro de borrar esta etiqueta?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div id="tag-modal-create" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">NUEVA ETIQUETA</h5>
        <span class="close-btn-create">&times;</span>
      </div>
      <div class="modal-body">
        <form action="{{ route('tag.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" class="form-input" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel close-modal-create">Cancelar</button>
                <button type="submit" class="btn-save">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="tag-modal-edit" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">EDITAR ETIQUETA</h5>
        <span class="close-btn-edit">&times;</span>
      </div>
      <div class="modal-body">
        <form id="form-edit-tag" action="" method="POST">
            @csrf
            @method('PUT') <div class="form-group">
                <label>Nombre</label>
                <input type="text" id="input-edit-name" name="name" class="form-input" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel close-modal-edit">Cancelar</button>
                <button type="submit" class="btn-save">Actualizar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


