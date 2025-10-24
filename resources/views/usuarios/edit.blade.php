<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>

<body>
    <h1>Editar Usuario</h1>

    {{-- @dd($usuario) --}}

    <form action="{{ route('usuarios.update', ['usuario' => $id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $usuario['nombre'] ?? '') }}">
            @error('nombre')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $usuario['email'] ?? '') }}">
            @error('email')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $usuario['telefono'] ?? '') }}">
            @error('telefono')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
 <label for="rol">Rol</label>
     <select name="rol" id="rol" class="form-control" required>
        <option value="">-- Selecciona un rol --</option>
        <option value="administrador">Administrador</option>
        <option value="usuario">Usuario</option>
        <option value="veterinario">Veterinario</option>
    </select>

        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password">
            @error('password')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Editar Usuario</button>
    </form>
</body>

</html>
