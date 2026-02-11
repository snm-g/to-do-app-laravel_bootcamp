@extends('layouts.index')
@section('table-content')
<div class="button-add-div">
    <button class="button-add" id="button-add-task">Agregar nueva tarea</button>
</div>

<div class="table-div">
    <table class="table">
        <thead>
            <tr>
                <th>TITULO</th>
                <th>CATEGORIAS</th>
                <th>ETIQUETAS</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>

                <td>
                    <span class="badge-category">
                        {{ $task->category ? $task->category->name : 'Sin asignar' }}
                    </span>
                </td>

                <td>
                    @foreach($task->tags as $tag)
                        <span style="background: #eee; padding: 2px 5px; border-radius: 4px; font-size: 12px; margin-right: 2px;">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </td>

                <td>
                    @if($task->is_completed)
                        <span style="color: green; font-weight: bold;">Completada</span>
                    @else
                        <span style="color: orange; font-weight: bold;">Pendiente</span>
                    @endif
                </td>
                
                <td>
                    <button class="button-view-task" 
                        data-title="{{ $task->title }}"
                        data-description="{{ $task->description }}"
                        data-category="{{ $task->category ? $task->category->name : 'Sin asignar' }}"
                        data-status="{{ $task->is_completed ? 'Realizada' : 'Pendiente' }}"
                        data-tags="{{ $task->tags->pluck('name')->implode(', ') }}"
                    >Ver</button>

                    <button class="button-edit-task" 
                        data-id="{{ $task->id }}"
                        data-title="{{ $task->title }}"
                        data-description="{{ $task->description }}"
                        data-category-id="{{ $task->category_id }}"
                        data-status="{{ $task->is_completed }}"
                        data-url="{{ route('task.update', $task->id) }}"
                        data-tags-ids="{{ json_encode($task->tags->pluck('id')) }}"
                    >Editar</button>
                    
                    <form action="{{ route('task.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE') 
                        <button type="submit" class="btn-delete" onclick="return confirm('¿Estás seguro de borrar esta tarea?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="modal-create-task" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">NUEVA TAREA</h5>
        <span class="close-create-task">&times;</span>
      </div>
      <div class="modal-body">
        <form action="{{ route('task.store') }}" method="POST">
            @csrf
            <div class="form-group"><label>Título</label><input type="text" name="title" class="form-input" required></div>
            <div class="form-group"><label>Descripción</label><textarea name="description" class="form-input"></textarea></div>
            
            <div class="form-group"><label>Categoría</label>
                <select name="category_id" class="form-input" required>
                    <option value="">Selecciona...</option>
                    @foreach($categories as $cat) <option value="{{ $cat->id }}">{{ $cat->name }}</option> @endforeach
                </select>
            </div>

            <div class="form-group"><label>Etiquetas</label>
                <div class="checkbox-group">
                    @foreach($tags as $tag)
                        <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->name }}</label>
                    @endforeach
                </div>
            </div>

            <div class="form-group"><label>Estado</label>
                <select name="is_completed" class="form-input"><option value="0">Pendiente</option><option value="1">Realizada</option></select>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel close-modal-create-task">Cancelar</button>
                <button type="submit" class="btn-save">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="modal-view-task" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">DETALLES DE LA TAREA</h5>
        <span class="close-view-task">&times;</span>
      </div>
      <div class="modal-body">
        <div class="form-group"><label>Título</label>
            <input type="text" id="view-title" class="form-input" disabled></div>
        
        <div class="form-group"><label>Descripción</label>
            <textarea id="view-description" class="form-input" disabled></textarea></div>

        <div class="form-group"><label>Categoría</label>
            <input type="text" id="view-category" class="form-input" disabled></div>

        <div class="form-group"><label>Etiquetas</label>
            <input type="text" id="view-tags" class="form-input" disabled></div>

        <div class="form-group"><label>Estado</label>
            <input type="text" id="view-status" class="form-input" disabled></div>

        <div class="modal-footer">
            <button type="button" class="btn-cancel close-modal-view-task">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="modal-edit-task" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">EDITAR TAREA</h5>
        <span class="close-edit-task">&times;</span>
      </div>
      <div class="modal-body">
        <form id="form-edit-task" action="" method="POST">
            @csrf @method('PUT')
            
            <div class="form-group"><label>Título</label>
                <input type="text" id="edit-title" name="title" class="form-input" required></div>
            
            <div class="form-group"><label>Descripción</label>
                <textarea id="edit-description" name="description" class="form-input"></textarea></div>

            <div class="form-group"><label>Categoría</label>
                <select id="edit-category" name="category_id" class="form-input" required>
                    @foreach($categories as $cat) <option value="{{ $cat->id }}">{{ $cat->name }}</option> @endforeach
                </select>
            </div>

            <div class="form-group"><label>Etiquetas</label>
                <div class="checkbox-group">
                    @foreach($tags as $tag)
                        <label>
                            <input type="checkbox" class="edit-tag-checkbox" name="tags[]" value="{{ $tag->id }}"> 
                            {{ $tag->name }}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-group"><label>Estado</label>
                <select id="edit-status" name="is_completed" class="form-input">
                    <option value="0">Pendiente</option><option value="1">Realizada</option>
                </select>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-cancel close-modal-edit-task">Cancelar</button>
                <button type="submit" class="btn-save">Actualizar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


