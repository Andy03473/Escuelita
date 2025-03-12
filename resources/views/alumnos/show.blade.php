<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Detalles del Alumno</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> {{ $alumno->id }}</p>
                <p><strong>Nombre:</strong> {{ $alumno->nombre }}</p>
                <p><strong>Correo:</strong> {{ $alumno->correo }}</p>
                <p><strong>Fecha de Nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</p>
                <p><strong>Ciudad:</strong> {{ $alumno->ciudad }}</p>
            </div>
        </div>
        <a href="{{ route('alumnos.index') }}" class="btn btn-primary mt-3">Volver a la lista</a>
        <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-warning mt-3">Editar</a>
    </div>
</body>
</html>