<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fase 2</title>

    @if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">


    <link rel="stylesheet" href="styles.css">


</head>
<body>


<div class="container-fluid">
    <br>
    <br>
    <center><h1 style="font-family: 'Century Schoolbook'">Biblioteca Virtual</h1></center>
    <br>
    <div class="row row-cols-1 row-cols-md-3 g-2">

        <div class="col">
            <div class="card">

                <div class="card-body">
                    <center><a href="{{ route('libro.index') }}" class="btn btn-lg btn-info" style="font-family:Gabriola">Libros</a></center>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">

                <div class="card-body">
                    <center><a href="{{ route('usuario.index') }}" class="btn btn-lg btn-info" style="font-family: Gabriola">Usuarios</a></center>
                </div>
            </div>
        </div>


        <div class="col">
            <div class="card">

                <div class="card-body">
                    <center><a href="{{ route('prestamo.index') }}" class="btn btn-lg btn-info" style="font-family:Gabriola">Prestamos</a></center>
                </div>
            </div>
        </div>

    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

</body>
</html>
