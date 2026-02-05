@extends('layouts.index')
@section('table-content')
<div class="button-add-div">
    <button class="button-add">Agregar nueva tarea</button>
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
                    <tr>
                        <td>titulo1</td>
                        <td>categoria1</td>
                        <td>etiqueta1</td>
                        <td>estado1</span></td>
                        <td>acciones1</span></td>
                    </tr>
                </tbody>
    </table>
</div>
@endsection


