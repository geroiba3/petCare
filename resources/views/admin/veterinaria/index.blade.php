<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>veterinaria</title>
</head>
<body>
    <h1>veterinaria</h1>
    <a href="{{ route('veterinaria.create') }}">crear Usuario</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Teléfono</th>
                 <th>hora_apertura</th>
                 <th>hora_cierre</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($veterinaria as $key => $vet)
                @if ($key != null)
                    <tr>
                        <td>{{ $vet['nombre'] }}</td>
                        <td>{{ $vet['direccion'] }}</td>
                        <td>{{ $vet['telefono'] }}</td>
                        <td>{{ $vet['hora_apertura'] }}</td>
                        <td>{{ $vet['hora_cierre'] }}</td>
                       
                        <td>

                         <a href="{{ route('veterinaria.edit', $key) }}">Editar Veterinaria</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
</body>
</html>