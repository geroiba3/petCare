<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
    <h1>Mascotas</h1>
    <a href="{{ route('mascota.create') }}">Crear Mascota</a>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Raza</th>
                <th>Edad</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
                @foreach ($mascota as $key => $mascotaItem)
                @if ($key != null)
                    <tr>
                   <td>{{ $mascotaItem['nombre'] }}</td>
                   <td>{{ $mascotaItem['especie'] }}</td>
                   <td>{{ $mascotaItem['raza'] ?? '—' }}</td>
                   <td>{{ ucfirst($mascotaItem['sexo']) }}</td>
                   <td>{{ $mascotaItem['fecha_nacimiento'] ? \Carbon\Carbon::parse($mascotaItem['fecha_nacimiento'])->format('d/m/Y') : '—' }}</td> 
                   <td>{{ $mascotaItem['peso'] ? $mascotaItem['peso'] . ' kg' : '—' }}</td>

                            <a href="{{ route('mascota.edit', $key) }}">Editar</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>
