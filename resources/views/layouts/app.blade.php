<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reparaciones</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar-item:hover {
            background-color: #4B5563;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- HEADER - Modificado para mostrar el usuario -->
    <header class="fixed top-0 w-full bg-blue-700 text-white shadow-lg z-50">
        <div class="px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <i class="fas fa-tools text-2xl"></i>
                <h1 class="text-xl font-bold">Sistema de Reparaciones - Área Administrativa</h1>
            </div>
            
            @auth
                {{-- Usuario autenticado --}}
                <div class="flex items-center space-x-4">
                    <span class="hidden md:inline">{{ Auth::user()->name }}</span>
                    @if(Auth::user()->avatar)
                        <img src="{{ Auth::user()->avatar }}" alt="Avatar" class="w-8 h-8 rounded-full border-2 border-white">
                    @else
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-blue-700"></i>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm bg-blue-600 hover:bg-blue-800 px-3 py-1 rounded transition">
                            <i class="fas fa-sign-out-alt mr-1"></i> Salir
                        </button>
                    </form>
                </div>
            @else
                {{-- Usuario NO autenticado --}}
                <div class="flex items-center space-x-4">
                    <span class="hidden md:inline">Invitado</span>
                    <a href="{{ route('login') }}" class="bg-white text-blue-700 px-4 py-2 rounded-lg hover:bg-gray-100 transition flex items-center">
                        <i class="fab fa-google mr-2"></i> Iniciar Sesión
                    </a>
                </div>
            @endauth
        </div>
    </header>

    @auth
        <!-- NAVBAR - Solo visible para usuarios autenticados -->
        <nav class="fixed left-0 top-14 w-64 h-full bg-gray-800 text-white shadow-lg z-40">
            <div class="p-4">
                <h2 class="text-lg font-semibold mb-6 border-b border-gray-700 pb-3">
                    <i class="fas fa-cogs mr-2"></i> Módulos del Sistema
                </h2>
                
                <ul class="space-y-1">
                    <!-- CLIENTES -->
                    <li class="mb-2">
                        <div class="text-gray-400 text-sm uppercase tracking-wider mb-1 px-3">
                            <i class="fas fa-users mr-2"></i> Clientes
                        </div>
                        <ul class="ml-3">
                            <li><a href="/clientes" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-list mr-2"></i> Listado</a></li>
                            <li><a href="/clientes/crear" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-plus mr-2"></i> Nuevo Cliente</a></li>
                        </ul>
                    </li>
                    
                    <!-- EQUIPOS -->
                    <li class="mb-2">
                        <div class="text-gray-400 text-sm uppercase tracking-wider mb-1 px-3">
                            <i class="fas fa-laptop mr-2"></i> Equipos
                        </div>
                        <ul class="ml-3">
                            <li><a href="/equipos" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-list mr-2"></i> Listado</a></li>
                            <li><a href="/equipos/crear" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-plus mr-2"></i> Nuevo Equipo</a></li>
                        </ul>
                    </li>
                    
                    <!-- TICKETS -->
                    <li class="mb-2">
                        <div class="text-gray-400 text-sm uppercase tracking-wider mb-1 px-3">
                            <i class="fas fa-ticket-alt mr-2"></i> Tickets
                        </div>
                        <ul class="ml-3">
                            <li><a href="/tickets" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-list mr-2"></i> Listado</a></li>
                            <li><a href="/tickets/crear" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-plus mr-2"></i> Nuevo Ticket</a></li>
                        </ul>
                    </li>
                    
                    <!-- REPARADORES -->
                    <li class="mb-2">
                        <div class="text-gray-400 text-sm uppercase tracking-wider mb-1 px-3">
                            <i class="fas fa-user-cog mr-2"></i> Reparadores
                        </div>
                        <ul class="ml-3">
                            <li><a href="/reparadores" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-list mr-2"></i> Listado</a></li>
                            <li><a href="/reparadores/crear" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-plus mr-2"></i> Nuevo Reparador</a></li>
                        </ul>
                    </li>
                    
                    <!-- MATERIALES -->
                    <li class="mb-2">
                        <div class="text-gray-400 text-sm uppercase tracking-wider mb-1 px-3">
                            <i class="fas fa-boxes mr-2"></i> Materiales
                        </div>
                        <ul class="ml-3">
                            <li><a href="/materiales" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-list mr-2"></i> Listado</a></li>
                            <li><a href="/materiales/crear" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-plus mr-2"></i> Nuevo Material</a></li>
                        </ul>
                    </li>
                    
                    <!-- EVIDENCIAS -->
                    <li class="mb-2">
                        <div class="text-gray-400 text-sm uppercase tracking-wider mb-1 px-3">
                            <i class="fas fa-camera mr-2"></i> Evidencias
                        </div>
                        <ul class="ml-3">
                            <li><a href="/evidencias" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-list mr-2"></i> Listado</a></li>
                            <li><a href="/evidencias/crear" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-plus mr-2"></i> Nueva Evidencia</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- CONTENIDO PRINCIPAL - Solo para usuarios autenticados -->
        <main class="ml-64 pt-14 p-6">
            <div class="container mx-auto">
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">
                        ¡Bienvenido, {{ Auth::user()->name }}!
                    </h2>
                    <p class="text-gray-600">
                        Has iniciado sesión correctamente. Usa el menú lateral para navegar por el sistema.
                    </p>
                </div>
                @yield('content')
            </div>
        </main>
    @else
        <!-- CONTENIDO PARA USUARIOS NO AUTENTICADOS -->
        <main class="pt-14 p-6">
            <div class="container mx-auto max-w-2xl">
                <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                    <i class="fas fa-tools text-6xl text-blue-700 mb-4"></i>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">
                        Sistema de Reparaciones
                    </h2>
                    <p class="text-gray-600 mb-8">
                        Accede al panel administrativo para gestionar clientes, equipos, tickets y más.
                    </p>
                    <a href="{{ route('login') }}" class="inline-flex items-center bg-blue-700 text-white px-6 py-3 rounded-lg hover:bg-blue-800 transition">
                        <i class="fab fa-google mr-2"></i>
                        Iniciar sesión con Google
                    </a>
                </div>
            </div>
        </main>
    @endauth
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>