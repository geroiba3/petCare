<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Usuarios</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $key => $usuario)
                <tr>
                    <td>{{ $usuario['nombre'] }}</td>
                    <td>{{ $usuario['email'] }}</td>
                    <td>{{ $usuario['telefono'] }}</td>
                    <td>

                    
                    </td>
                </tr>
            @endforeach
        </tbody>
</body>
</html>