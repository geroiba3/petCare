<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Mascota</h1>

    {{-- @dd($mascota) --}}

    <form action="{{ route('mascota.update', ['mascota' => $id]) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nombre --}}
        <div>
            <label for="nombre">Nombre:</label>
            <input 
                type="text" 
                id="nombre" 
                name="nombre" 
                value="{{ old('nombre', $usuario['nombre'] ?? '') }}"
            >
            @error('nombre')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Raza --}}
        <div>
            <label for="raza">Raza:</label>
            <input 
                type="text" 
                id="raza" 
                name="raza" 
                value="{{ old('raza', $usuario['raza'] ?? '') }}"
            >
            @error('raza')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Edad --}}
        <div>
            <label for="edad">Edad:</label>
            <input 
                type="text" 
                id="edad" 
                name="edad" 
                value="{{ old('edad', $usuario['edad'] ?? '') }}"
            >
            @error('edad')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Contraseña --}}
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password">
        </div>

        <button type="submit">Editar Mascota</button>
    </form>
</body>


</html>
