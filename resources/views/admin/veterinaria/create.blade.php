<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Veterinario</title>
</head>
<body>
    <h1>Añadir Veterinario</h1>

    <form action="{{ route('veterinaria.store') }}" method="POST">
        @csrf

        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
            @error('nombre')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="direccion">Direccion:</label>
            <input type="text" id="direccion" name="direccion" value="{{ old('direccion') }}">
            @error('direccion')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}">
            @error('telefono')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
    <label for="hora_apertura">Horario de apertura:</label>
    <input type="time" id="hora_apertura" name="hora_apertura" value="{{ old('hora_apertura') }}">
    @error('hora_apertura')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="hora_cierre">Horario de cierre:</label>
    <input type="time" id="hora_cierre" name="hora_cierre" value="{{ old('hora_cierre') }}">
    @error('hora_cierre')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>

        <button type="submit">Crear Veterinario</button>
    </form>
</body>
</html>

