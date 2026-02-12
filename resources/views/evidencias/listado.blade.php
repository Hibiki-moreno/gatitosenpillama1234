@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    
    <h1 class="text-3xl font-bold mb-8">Listado de Tickets</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
      @foreach($tickets as $ticket)
<div class="bg-neutral-primary-soft block max-w-sm border border-default rounded-base shadow-lg overflow-hidden mb-8">
    
    <div id="carousel-ticket-{{ $ticket->id }}" class="relative w-full" data-carousel="slide">
        
        <div class="relative h-64 overflow-hidden md:h-80">
            @forelse($ticket->evidencias as $index => $evidencia)
                <div class="hidden duration-700 ease-in-out" data-carousel-item="{{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $evidencia->ruta) }}" 
                         class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 transition-transform duration-500 hover:scale-110" 
                         alt="Evidencia {{ $index + 1 }}">
                    
                    @if($evidencia->descripcion)
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                            <p class="text-white text-xs font-light italic">
                                "{{ $evidencia->descripcion }}"
                            </p>
                        </div>
                    @endif
                </div>
            @empty
                <div class="flex flex-col items-center justify-center h-full bg-slate-100 text-slate-400">
                    <i class="fas fa-image-slash text-4xl mb-2"></i>
                    <span class="text-sm font-medium">Sin evidencias fotográficas</span>
                </div>
            @endforelse
        </div>

        @if($ticket->evidencias->count() > 1)
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                @foreach($ticket->evidencias as $index => $evidencia)
                    <button type="button" class="w-2 h-2 rounded-full border border-white shadow-sm" 
                            aria-current="{{ $index === 0 ? 'true' : 'false' }}" 
                            aria-label="Slide {{ $index + 1 }}" 
                            data-carousel-slide-to="{{ $index }}"></button>
                @endforeach
            </div>

            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-white/20 group-hover:bg-white/40 group-focus:ring-4 group-focus:ring-white/50">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                    </svg>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-base bg-white/20 group-hover:bg-white/40 group-focus:ring-4 group-focus:ring-white/50">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                    </svg>
                </span>
            </button>
        @endif
    </div>

    <div class="p-6 text-center bg-white">
        <span class="inline-flex items-center bg-blue-50 border border-blue-200 text-blue-700 text-[10px] uppercase tracking-widest font-bold px-2 py-0.5 rounded-full mb-3">
            <i class="fas fa-hashtag mr-1"></i> Ticket #{{ $ticket->id }}
        </span>

        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 leading-tight">
            {{ Str::headline($ticket->problema) }}
        </h5>
        
        <p class="mb-6 text-sm text-gray-500 line-clamp-2">
            Estado actual: <span class="font-semibold text-gray-700">{{ $ticket->estado }}</span>
        </p>

        <div class="flex flex-wrap justify-center gap-2">
            <a href="{{ route('tickets.show', $ticket->id) }}" 
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-base hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 transition-colors">
                Ver Detalles
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
            
            <a href="{{ route('tickets.evidencia', $ticket->id) }}" 
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-purple-600 rounded-base hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 transition-colors">
                <i class="fas fa-camera mr-2"></i> Agregar Foto
            </a>
        </div>
    </div>
</div>
@endforeach

    </div>
</div>
@endsection