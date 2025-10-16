<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Usuarios</h1>
    <a href="{{ route('usuarios.create') }}">crear Usuario</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                 <th>password</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($usuarios as $key => $usuario)
                @if ($key != null)
                    <tr>
                        <td>{{ $usuario['nombre'] }}</td>
                        <td>{{ $usuario['email'] }}</td>
                        <td>{{ $usuario['telefono'] }}</td>
                        <td>{{ $usuario['password'] }}</td>
                       
                        <td>


                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
</body>
</html>