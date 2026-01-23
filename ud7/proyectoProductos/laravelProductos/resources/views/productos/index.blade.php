<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Incluir Bootstrap CSS desde el CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Vista Productos</title>
</head>

<body>
    <div class="container mt-5">
    <h1 class="mb-4">Listado de productos</h1>
    @if ($productos->isEmpty())
        <div class="alert alert-warning">No hay productos disponibles.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Nombre Corto</th>
                    <th>Descripción</th>
                    <th>PVP</th>
                    <th>Familia</th>
                    <th>Modificación</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->cod }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->nombre_corto }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->PVP }}</td>
                        <td>{{ $producto->familia }}</td>
                
                        <td><a href="{{route("productos.edit", $producto->cod)}}">Editar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
<!-- Incluir Bootstrap JS desde el CDN -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
