<!DOCTYPE html>
<html>
<head>
    <title>Registrar Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Verde bandera con letras blancas */
        .btn-ver, .btn-guardar {
            background-color: #006400 !important; /* Verde bandera */
            color: white !important;
            border: none;
        }

        /* Azul rey más oscuro con letras blancas */
        .btn-registrar {
            background-color: #00008B !important; /* Azul oscuro */
            color: white !important;
            border: none;
        }
    </style>
</head>
<body>
<body>
    <div class="container mt-4">
        <h1>Registrar Nuevo Alumno</h1>
        <form action="{{ route('alumnos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" name="correo" id="correo" class="form-control" value="{{ old('correo') }}" required>
                @error('correo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" required>
                @error('fecha_nacimiento')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad:</label>
                <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{ old('ciudad') }}" required>
                @error('ciudad')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-guardar">Guardar</button>
        </form>
        <a href="{{ route('alumnos.index') }}" class="btn btn-registrar mt-3">Ver lista de alumnos</a>
    </div>
</body>
</body>
</html>