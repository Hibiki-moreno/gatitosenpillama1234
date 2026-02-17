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
        /* Ajuste para que el mapa no tape los menús desplegables */
        #map { z-index: 0 !important; }
    </style>
</head>
<body class="bg-gray-50">
    <header class="fixed top-0 w-full bg-blue-700 text-white shadow-lg z-50">
        <div class="px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <i class="fas fa-tools text-2xl"></i>
                <h1 class="text-xl font-bold">Sistema de Reparaciones - Área Administrativa</h1>
            </div>
            
            @auth
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
        <nav class="fixed left-0 top-14 w-64 h-full bg-gray-800 text-white shadow-lg z-40 overflow-y-auto">
            <div class="p-4 mb-20"> <h2 class="text-lg font-semibold mb-6 border-b border-gray-700 pb-3">
                    <i class="fas fa-cogs mr-2"></i> Módulos
                </h2>
                
                <ul class="space-y-4">
                    <li>
                        <div class="text-gray-400 text-sm uppercase tracking-wider mb-1 px-3">
                            <i class="fas fa-users mr-2"></i> Clientes
                        </div>
                        <ul class="ml-3 space-y-1">
                            <li><a href="/clientes" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-list mr-2 text-xs"></i> Listado</a></li>
                            <li><a href="/clientes/crear" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-plus mr-2 text-xs"></i> Nuevo Cliente</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <div class="text-gray-400 text-sm uppercase tracking-wider mb-1 px-3">
                            <i class="fas fa-laptop mr-2"></i> Equipos
                        </div>
                        <ul class="ml-3 space-y-1">
                            <li><a href="/equipos" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-list mr-2 text-xs"></i> Listado</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <div class="text-gray-400 text-sm uppercase tracking-wider mb-1 px-3">
                            <i class="fas fa-ticket-alt mr-2"></i> Tickets
                        </div>
                        <ul class="ml-3 space-y-1">
                            <li><a href="/tickets" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-list mr-2 text-xs"></i> Listado</a></li>
                        </ul>
                    </li>

                    <li>
                        <div class="text-gray-400 text-sm uppercase tracking-wider mb-1 px-3">
                            <i class="fas fa-camera mr-2"></i> Evidencias
                        </div>
                        <ul class="ml-3 space-y-1">
                            <li><a href="/evidencias" class="block py-2 px-3 rounded sidebar-item"><i class="fas fa-images mr-2 text-xs"></i> Ver Todo</a></li>
                        </ul>
                    </li>

                    <li>
                        <div class="text-blue-400 text-sm uppercase tracking-wider mb-1 px-3">
                            <i class="fas fa-map-marked-alt mr-2"></i> Geolocalización
                        </div>
                        <ul class="ml-3 space-y-1">
                            <li>
                                <a href="{{ route('geo.index') }}" class="block py-2 px-3 rounded sidebar-item bg-blue-900/30">
                                    <i class="fas fa-map mr-2 text-xs"></i> Visor de Mapa
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="ml-64 pt-14 p-6">
            <div class="container mx-auto">
                @yield('content')
            </div>
        </main>
    @else
        <main class="pt-14 p-6 text-center">
            @yield('content')
        </main>
    @endauth
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>