<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir usuario</title>
</head>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mascota</title>
</head>
<body>
    <h1>Añadir Mascota</h1>

    <form action="{{ route('mascota.store') }}" method="POST">
        @csrf

        {{-- Nombre --}}
        <div>
            <label for="nombre">Nombre:</label>
            <input 
                type="text" 
                id="nombre" 
                name="nombre" 
                value="{{ old('nombre') }}"
            >
            @error('nombre')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Especie --}}
        <div>
            <label for="especie">Especie:</label>
            <input 
                type="text" 
                id="especie" 
                name="especie" 
                value="{{ old('especie') }}"
            >
            @error('especie')
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
                value="{{ old('raza') }}"
            >
            @error('raza')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Sexo --}}
        <div>
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="">-- Selecciona el sexo --</option>
                <option value="macho" {{ old('sexo') == 'macho' ? 'selected' : '' }}>Macho</option>
                <option value="hembra" {{ old('sexo') == 'hembra' ? 'selected' : '' }}>Hembra</option>
            </select>
            @error('sexo')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Fecha de nacimiento --}}
        <div>
            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input 
                type="date" 
                id="fecha_nacimiento" 
                name="fecha_nacimiento" 
                value="{{ old('fecha_nacimiento') }}"
            >
            @error('fecha_nacimiento')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Peso --}}
        <div>
            <label for="peso">Peso (kg):</label>
            <input
                id="peso" 
                name="peso" 
                value="{{ old('peso') }}"
            >
            @error('peso')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Crear Mascota</button>
    </form>
</body>



</html>

