<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Incluir Bootstrap CSS desde el CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Vista Edición</title>
</head>

<body>
    <div class="container mt-5">
    <h1 class="mb-4">Edición de producto</h1>
    @if ($producto->isEmpty())
        <div class="alert alert-warning">No hay datos de producto</div>
    @else
        <form action="{{route('productos.update',$producto->cod)}}" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{$producto->nombre}}">
            <br>

            <label for="nombre_corto">Nombre Corto</label>
            <input type="text" name="nombre_corto" id="nombre_corto" value="{{$producto->nombre_corto}}">
            
            <br>
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" value="{{$producto->descripcion}}">
            
            <br>
            <label for="pvp">PVP</label>
            <input type="text" name="pvp" id="pvp" value="{{$producto->PVP}}">
            
            <br>
            <label for="familia">Familia</label>
            <input type="text" name="familia" id="familia" value="{{$producto->familia}}">
            <br>

            <button type="submit">Guardar cambios</button><br>
            <a href="{{route('productos.index')}}">Cancelar</a>

        </form>
    @endif
<!-- Incluir Bootstrap JS desde el CDN -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
