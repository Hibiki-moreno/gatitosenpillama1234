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
    <!-- HEADER -->
    <header class="fixed top-0 w-full bg-blue-700 text-white shadow-lg z-50">
        <div class="px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <i class="fas fa-tools text-2xl"></i>
                <h1 class="text-xl font-bold">Sistema de Reparaciones - Área Administrativa</h1>
            </div>
            <div class="flex items-center space-x-4">
                <span class="hidden md:inline">Admin</span>
                <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-blue-700"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- NAVBAR -->
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

    <!-- CONTENIDO PRINCIPAL -->
    <main class="ml-64 pt-14 p-6">
        <div class="container mx-auto">
            @yield('content')
        </div>
    </main>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>