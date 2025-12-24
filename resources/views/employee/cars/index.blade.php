<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Meine Autos
            </h2>
            <a href="{{ route('employee.cars.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200 shadow-sm hover:shadow-md">
                Neues Auto hinzufügen
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative mb-6" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if($cars->count() > 0)
                <div class="mb-6">
                    @php
                        $carCount = $cars->count();
                        // Determine grid columns based on car count
                        if ($carCount == 1) {
                            $gridCols = 'grid-cols-1';
                        } elseif ($carCount == 2) {
                            $gridCols = 'grid-cols-1 md:grid-cols-2';
                        } elseif ($carCount == 3) {
                            $gridCols = 'grid-cols-1 md:grid-cols-3';
                        } else {
                            // 4+ cars: 3 per row, then remaining in subsequent rows
                            $gridCols = 'grid-cols-1 md:grid-cols-3';
                        }
                    @endphp
                    <div class="grid {{ $gridCols }} gap-6">
                        @foreach($cars as $index => $car)
                            @php
                                $cardClasses = 'bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 overflow-hidden group max-w-full';
                                
                                // For 4+ cars, handle items beyond the 3rd
                                if ($carCount >= 4 && $index >= 3) {
                                    $remainingCount = $carCount - 3;
                                    $positionInRemaining = $index - 2; // Position in the remaining items (1-based)
                                    
                                    // Calculate which row this item is in (after the first row of 3)
                                    $rowNumber = ceil($positionInRemaining / 3);
                                    $positionInRow = (($positionInRemaining - 1) % 3) + 1;
                                    $itemsInThisRow = min(3, $remainingCount - (($rowNumber - 1) * 3));
                                    
                                    // Apply column span based on items in this row
                                    if ($itemsInThisRow == 1) {
                                        // 1 item: full width (spans all 3 columns)
                                        $cardClasses .= ' md:col-span-3';
                                    } elseif ($itemsInThisRow == 2) {
                                        // 2 items: each spans 1 column in a 3-column grid
                                        // They'll take 2 of 3 columns total
                                        $cardClasses .= ' md:col-span-1';
                                    } else {
                                        // 3 items: normal grid behavior (33.33% each)
                                        $cardClasses .= ' md:col-span-1';
                                    }
                                }
                            @endphp
                            <div class="{{ $cardClasses }}">
                                <!-- Car Image -->
                                <a href="{{ route('cars.show', $car) }}" class="block relative overflow-hidden bg-slate-50">
                                    @if($car->images->count() > 0)
                                        <img 
                                            src="{{ Storage::url($car->images->first()->image_path) }}" 
                                            alt="{{ $car->make }} {{ $car->model }}" 
                                            class="w-full h-32 object-cover group-hover:scale-105 transition-transform duration-500"
                                        >
                                    @else
                                        <div class="w-full h-32 bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                                            <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <!-- Status Badges -->
                                    <div class="absolute top-3 left-3 flex flex-col gap-2">
                                        @if($car->is_active)
                                            <span class="px-3 py-1.5 bg-green-500 text-white rounded-full text-xs font-bold shadow-lg backdrop-blur-sm">
                                                Aktiv
                                            </span>
                                        @else
                                            <span class="px-3 py-1.5 bg-gray-500 text-white rounded-full text-xs font-bold shadow-lg backdrop-blur-sm">
                                                Inaktiv
                                            </span>
                                        @endif
                                        @if($car->is_featured)
                                            <span class="px-3 py-1.5 bg-gradient-to-r from-amber-400 to-amber-500 text-amber-900 rounded-full text-xs font-bold shadow-lg backdrop-blur-sm">
                                                Empfohlen
                                            </span>
                                        @endif
                                    </div>
                                </a>

                                <!-- Car Details -->
                                <div class="p-4">
                                    <h3 class="text-base font-bold text-slate-900 mb-1 group-hover:text-blue-600 transition-colors duration-200 line-clamp-1">
                                        <a href="{{ route('cars.show', $car) }}">
                                            {{ $car->make }} {{ $car->model }}
                                        </a>
                                    </h3>
                                    <p class="text-xs text-slate-500 mb-2">{{ $car->year }} • {{ $car->formatted_mileage }}</p>
                                    
                                    <div class="flex items-baseline justify-between mb-2">
                                        <span class="text-xl font-bold text-slate-900">{{ $car->formatted_price }}</span>
                                    </div>

                                    <div class="text-xs text-slate-500 mb-3">
                                        <span>{{ $car->created_at->format('M d, Y') }}</span>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex gap-1.5 pt-2 border-t border-slate-100">
                                        <a 
                                            href="{{ route('employee.cars.edit', $car) }}" 
                                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center px-2 py-1.5 rounded-lg text-xs font-semibold transition-all duration-200 shadow-sm hover:shadow-md"
                                        >
                                            Bearbeiten
                                        </a>
                                        <a 
                                            href="{{ route('cars.show', $car) }}" 
                                            class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-800 text-center px-2 py-1.5 rounded-lg text-xs font-semibold transition-all duration-200 shadow-sm hover:shadow-md"
                                        >
                                            Anzeigen
                                        </a>
                                        <form 
                                            method="POST" 
                                            action="{{ route('employee.cars.destroy', $car) }}" 
                                            onsubmit="return confirm('Sind Sie sicher, dass Sie dieses Auto löschen möchten?');"
                                            class="flex-1"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                class="w-full bg-red-600 hover:bg-red-700 text-white px-2 py-1.5 rounded-lg text-xs font-semibold transition-all duration-200 shadow-sm hover:shadow-md"
                                            >
                                                Löschen
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pagination -->
                <div class="mt-6 flex justify-center">
                    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-2">
                        {{ $cars->links() }}
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg rounded-2xl border border-slate-100">
                    <div class="p-12 text-center">
                        <svg class="w-20 h-20 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-slate-600 text-lg font-medium mb-2">Sie haben noch keine Autoanzeigen erstellt.</p>
                        <p class="text-slate-500 text-sm mb-6">Beginnen Sie mit der Erstellung Ihrer ersten Autoanzeige.</p>
                        <a 
                            href="{{ route('employee.cars.create') }}" 
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-200 shadow-sm hover:shadow-md"
                        >
                            Erstellen Sie Ihre erste Anzeige
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
