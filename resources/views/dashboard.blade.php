<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenido, {{ Auth::user()->name }}</h1>
    
    @if(Auth::user()->avatar)
        <img src="{{ Auth::user()->avatar }}" alt="Avatar" style="border-radius: 50%; width: 100px;">
    @endif
    
    <p>Email: {{ Auth::user()->email }}</p>
    
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>