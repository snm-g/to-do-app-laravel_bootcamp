<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <script src="{{ asset('js/script.js') }}" defer></script>
        <title>P3-TODO-LIST</title>
    </head>
    <body>
        <div class="title-div">
            <h2>LISTA DE TAREAS</h2>
        </div>
        <div class="navigation-div">
            <a class="navigation-item" href="{{ route('task.index') }}">Tareas</a>
            <a class="navigation-item" href="{{ route('category.index') }}">Categorias</a>
            <a class="navigation-item" href="{{ route('tag.index') }}">Etiquetas</a>
        </div>
        <div class="tables-div">
          @yield('table-content')
        </div>
    </body>
</html>
