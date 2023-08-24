<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>

<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .pagination a {
        display: inline-block;
        margin: 0 5px;
        padding: 10px 15px;
        background-color: #fff;
        border: 1px solid #ddd;
        color: #333;
    }

    .pagination a:hover,
    .pagination a:focus {
        background-color: #f5f5f5;
    }

    .pagination .active a {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }

    .pagination .disabled a {
        opacity: .5;
        pointer-events: none;
    }
</style>
<body>

<div class="container">
    <h1 class="text-center my-4"> Catalogó de Prestamos</h1>

    <div class="card shadow mb-4">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col text-right">
                    <a href="{{route('prestamo.create')}}" class="btn btn-sm btn-success">Agregar Prestamo</a>
                    <a href="{{route('prestamo.index')}}" class="btn btn-sm btn-warning">Regresar</a>
                </div>
            </div>
        </div>
    </div>


    <form method="POST" action="{{ route('prestamos.store') }}">
        @csrf
        <div class="form-group">
            <label for="fecha_solicitud">Fecha de Solicitud</label>
            <input type="date" class="form-control" id="fecha_solicitud" name="fecha_solicitud" required>
        </div>
        <div class="form-group">
            <label for="fecha_prestamo">Fecha de Préstamo</label>
            <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo" required>
        </div>
        <div class="form-group">
            <label for="fecha_devolucion ">Fecha de Devolución</label>
            <input type="date" class="form-control" id="fecha_devolucion " name="fecha_devolucion " required>
        </div>
        <div class="form-group">
            <label for="libro_id ">Libro</label>
            <select class="form-control" id="libro_id " name="libro_id " required>
                @foreach ($libros as $libro)
                    <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="usuario_id ">Usuario</label>
            <select class="form-control" id="usuario_id " name="usuario_id " required>

                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear Préstamo</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
