<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Verde bandera con letras blancas */
        .btn-ver {
            background-color: #006400 !important; /* Verde bandera */
            color: white !important;
            border: none;
        }

        /* Morado más fuerte */
        .btn-editar {
            background-color: #800080 !important; /* Púrpura clásico */
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
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <h1>Lista de Alumnos</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Ciudad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->id }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->correo }}</td>
                        <td>{{ $alumno->fecha_nacimiento }}</td>
                        <td>{{ $alumno->ciudad }}</td>
                        <td>
                            <a href="{{ route('alumnos.show', $alumno) }}" class="btn btn-ver btn-sm">Ver</a>
                            <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-editar btn-sm">Editar</a>
                            <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar a {{ $alumno->nombre }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('alumnos.create') }}" class="btn btn-registrar">Registrar nuevo alumno</a>
    </div>
</body>
</html>