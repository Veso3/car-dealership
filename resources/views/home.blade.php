@extends('layouts.public')

@section('title', 'Startseite - Autohändler')

@section('content')
<div x-data="{ 
    sidebarOpen: true,
    init() {
        // Open sidebar by default on desktop, closed on mobile
        if (window.innerWidth < 1024) {
            this.sidebarOpen = false;
        }
        // Handle window resize - don't force sidebar state, let user control it
    }
}" class="min-h-screen bg-gradient-to-b from-white via-slate-50 to-white">
    <!-- Enhanced Hero Section with Dealership Image -->
    <div class="relative border-b border-slate-200/60 overflow-hidden">
        <div class="relative h-[450px] md:h-[550px] lg:h-[650px]">
            <!-- Dealership Image -->
            <img 
                src="https://images.unsplash.com/photo-1486754735734-325b5831c3ad?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                alt="Moderner Autohändler" 
                class="w-full h-full object-cover scale-105 transition-transform duration-700 hover:scale-100"
            >
            <!-- Overlay Gradient -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
            <!-- Animated Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
            </div>
            <!-- Content Overlay -->
            <div class="absolute inset-0 flex items-end">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 md:pb-20 w-full">
                    <div class="max-w-3xl transform transition-all duration-500 hover:translate-y-[-8px]">
                        <div class="inline-block mb-4">
                            <span class="px-4 py-1.5 bg-blue-600/90 backdrop-blur-sm text-white rounded-full text-xs font-semibold shadow-lg">
                                Premium Fahrzeuge
                            </span>
                        </div>
                        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-6 tracking-tight leading-tight drop-shadow-2xl">
                            Willkommen bei unserem<br>
                            <span class="bg-gradient-to-r from-blue-300 via-white to-blue-300 bg-clip-text text-transparent">Autohändler</span>
                        </h1>
                        <p class="text-xl md:text-2xl lg:text-3xl text-white/95 font-light leading-relaxed drop-shadow-lg mb-6">
                            Entdecken Sie unsere sorgfältig ausgewählte Sammlung von Qualitätsfahrzeugen
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <a href="#cars" class="inline-flex items-center px-6 py-3 bg-white text-slate-900 rounded-xl text-sm font-semibold transition-all duration-300 hover:bg-blue-50 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                                Autos entdecken
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                            <a href="{{ route('pages.kontakt') }}" class="inline-flex items-center px-6 py-3 bg-white/10 backdrop-blur-md text-white border-2 border-white/30 rounded-xl text-sm font-semibold transition-all duration-300 hover:bg-white/20 hover:border-white/50">
                                Kontakt aufnehmen
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-14" id="cars">
        <!-- Filter Toggle Button -->
        <div class="mb-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <button 
                    @click="sidebarOpen = !sidebarOpen"
                    class="group flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 font-medium text-sm"
                >
                    <svg x-show="!sidebarOpen" class="w-5 h-5 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                    </svg>
                    <svg x-show="sidebarOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    <span x-show="!sidebarOpen">Filter anzeigen</span>
                    <span x-show="sidebarOpen">Filter ausblenden</span>
                </button>
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-slate-900 to-slate-700 bg-clip-text text-transparent">
                        {{ $cars->total() }} Auto{{ $cars->total() !== 1 ? 's' : '' }} verfügbar
                    </h2>
                    <p class="text-sm text-slate-500 mt-1">Finden Sie Ihr Traumauto</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-6 lg:gap-8 relative">
            <!-- Mobile Overlay -->
            <div 
                x-show="sidebarOpen && window.innerWidth < 1024"
                x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="sidebarOpen = false"
                class="fixed inset-0 bg-black/50 z-40 lg:hidden"
                style="display: none;"
            ></div>

            <!-- Collapsible Filters Sidebar -->
            <aside 
                x-show="sidebarOpen"
                x-transition:enter="transition-transform duration-300 ease-in-out"
                x-transition:enter-start="-translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition-transform duration-300 ease-in-out"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full"
                :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
                class="fixed lg:sticky top-0 left-0 h-full lg:h-auto z-50 lg:z-auto w-80 lg:w-72 flex-shrink-0"
                style="max-height: 100vh; overflow-y: auto;"
            >
                <div class="bg-white/95 backdrop-blur-md h-full lg:h-auto border border-slate-200/60 rounded-2xl lg:rounded-2xl shadow-2xl lg:shadow-xl p-6 lg:sticky lg:top-4">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold bg-gradient-to-r from-slate-900 to-blue-600 bg-clip-text text-transparent">Filter</h2>
                        <button 
                            @click="sidebarOpen = false"
                            class="lg:hidden p-2 hover:bg-slate-100 rounded-lg transition-colors"
                        >
                            <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                        <button 
                            @click="sidebarOpen = !sidebarOpen"
                            class="hidden lg:flex p-2 hover:bg-slate-100 rounded-lg transition-colors"
                            title="Filter umschalten"
                            x-show="true"
                        >
                            <svg x-show="sidebarOpen" class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            <svg x-show="!sidebarOpen" class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                    </div>
                    
                    <form method="GET" action="{{ route('home') }}" class="space-y-6">
                        <!-- Search -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2.5">Suchen</label>
                            <input 
                                type="text" 
                                name="search" 
                                value="{{ request('search') }}" 
                                placeholder="Marke, Modell, Beschreibung..." 
                                class="w-full rounded-xl border border-slate-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 text-slate-900 bg-white px-4 py-3 transition-all duration-200 text-sm"
                            >
                        </div>

                        <!-- Make -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2.5">Marke</label>
                            <select name="make" class="w-full rounded-xl border border-slate-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 text-slate-900 bg-white px-4 py-3 transition-all duration-200 text-sm">
                                <option value="">Alle Marken</option>
                                @foreach($makes as $make)
                                    <option value="{{ $make }}" {{ request('make') == $make ? 'selected' : '' }}>{{ $make }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Fuel Type -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2.5">Kraftstoffart</label>
                            <select name="fuel_type" class="w-full rounded-xl border border-slate-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 text-slate-900 bg-white px-4 py-3 transition-all duration-200 text-sm">
                                <option value="">Alle Typen</option>
                                <option value="petrol" {{ request('fuel_type') == 'petrol' ? 'selected' : '' }}>Benzin</option>
                                <option value="diesel" {{ request('fuel_type') == 'diesel' ? 'selected' : '' }}>Diesel</option>
                                <option value="electric" {{ request('fuel_type') == 'electric' ? 'selected' : '' }}>Elektrisch</option>
                                <option value="hybrid" {{ request('fuel_type') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                            </select>
                        </div>

                        <!-- Transmission -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2.5">Getriebe</label>
                            <select name="transmission" class="w-full rounded-xl border border-slate-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 text-slate-900 bg-white px-4 py-3 transition-all duration-200 text-sm">
                                <option value="">Alle Typen</option>
                                <option value="manual" {{ request('transmission') == 'manual' ? 'selected' : '' }}>Manuell</option>
                                <option value="automatic" {{ request('transmission') == 'automatic' ? 'selected' : '' }}>Automatik</option>
                                <option value="semi_automatic" {{ request('transmission') == 'semi_automatic' ? 'selected' : '' }}>Halbautomatik</option>
                            </select>
                        </div>

                        <!-- Body Type -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2.5">Fahrzeugtyp</label>
                            <select name="body_type" class="w-full rounded-xl border border-slate-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 text-slate-900 bg-white px-4 py-3 transition-all duration-200 text-sm">
                                <option value="">Alle Typen</option>
                                <option value="sedan" {{ request('body_type') == 'sedan' ? 'selected' : '' }}>Limousine</option>
                                <option value="suv" {{ request('body_type') == 'suv' ? 'selected' : '' }}>SUV</option>
                                <option value="hatchback" {{ request('body_type') == 'hatchback' ? 'selected' : '' }}>Kombi</option>
                                <option value="coupe" {{ request('body_type') == 'coupe' ? 'selected' : '' }}>Coupé</option>
                                <option value="convertible" {{ request('body_type') == 'convertible' ? 'selected' : '' }}>Cabrio</option>
                                <option value="wagon" {{ request('body_type') == 'wagon' ? 'selected' : '' }}>Kombi</option>
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2.5">Preisspanne</label>
                            <div class="flex gap-2">
                                <input 
                                    type="number" 
                                    name="min_price" 
                                    value="{{ request('min_price') }}" 
                                    placeholder="Min" 
                                    class="w-1/2 rounded-xl border border-slate-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 text-slate-900 bg-white px-4 py-3 transition-all duration-200 text-sm"
                                >
                                <input 
                                    type="number" 
                                    name="max_price" 
                                    value="{{ request('max_price') }}" 
                                    placeholder="Max" 
                                    class="w-1/2 rounded-xl border border-slate-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 text-slate-900 bg-white px-4 py-3 transition-all duration-200 text-sm"
                                >
                            </div>
                        </div>

                        <!-- Year Range -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2.5">Jahrgang</label>
                            <div class="flex gap-2">
                                <input 
                                    type="number" 
                                    name="min_year" 
                                    value="{{ request('min_year') }}" 
                                    placeholder="Min" 
                                    class="w-1/2 rounded-xl border border-slate-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 text-slate-900 bg-white px-4 py-3 transition-all duration-200 text-sm"
                                >
                                <input 
                                    type="number" 
                                    name="max_year" 
                                    value="{{ request('max_year') }}" 
                                    placeholder="Max" 
                                    class="w-1/2 rounded-xl border border-slate-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 text-slate-900 bg-white px-4 py-3 transition-all duration-200 text-sm"
                                >
                            </div>
                        </div>

                        <!-- Sort -->
                        <div x-data="{ 
                            init() {
                                const currentSort = '{{ request('sort_by', 'created_at') }}';
                                const currentOrder = '{{ request('sort_order', 'desc') }}';
                                if (currentSort === 'price') {
                                    this.selectedValue = currentOrder === 'desc' ? 'price_desc' : 'price_asc';
                                } else {
                                    this.selectedValue = currentSort;
                                }
                            },
                            selectedValue: 'created_at'
                        }">
                            <label class="block text-sm font-semibold text-slate-700 mb-2.5">Sortieren nach</label>
                            <select 
                                x-model="selectedValue"
                                @change="
                                    const parts = $event.target.value.split('_');
                                    document.querySelector('[name=sort_by]').value = parts[0];
                                    document.querySelector('[name=sort_order]').value = parts[1] || 'desc';
                                "
                                class="w-full rounded-xl border border-slate-200 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 text-slate-900 bg-white px-4 py-3 transition-all duration-200 text-sm"
                            >
                                <option value="created_at">Neueste zuerst</option>
                                <option value="price_asc">Preis: Niedrig bis Hoch</option>
                                <option value="price_desc">Preis: Hoch bis Niedrig</option>
                                <option value="year">Jahr: Neueste</option>
                                <option value="mileage">Kilometerstand: Niedrigste</option>
                            </select>
                            <input type="hidden" name="sort_by" value="{{ request('sort_by', 'created_at') }}">
                            <input type="hidden" name="sort_order" value="{{ request('sort_order', 'desc') }}">
                        </div>

                        <div class="flex gap-3 pt-2">
                            <button 
                                type="submit" 
                                class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                            >
                                Filter anwenden
                            </button>
                            <a 
                                href="{{ route('home') }}" 
                                class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-800 px-4 py-3 rounded-xl text-sm font-semibold text-center transition-all duration-300 shadow-sm hover:shadow-md"
                            >
                                Zurücksetzen
                            </a>
                        </div>
                    </form>
                </div>
            </aside>

            <!-- Cars Grid -->
            <div class="flex-1 min-w-0">
                @if($cars->count() > 0)
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
                    <div class="grid {{ $gridCols }} gap-6 md:gap-6 lg:gap-6">
                        @foreach($cars as $index => $car)
                            @php
                                $cardClasses = 'bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-slate-200/60 overflow-hidden group transform hover:-translate-y-2';
                                
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
                                <a href="{{ route('cars.show', $car) }}" class="block relative overflow-hidden bg-gradient-to-br from-slate-50 to-slate-100">
                                    @if($car->images->count() > 0)
                                        <div class="relative overflow-hidden">
                                            <img 
                                                src="{{ Storage::url($car->images->first()->image_path) }}" 
                                                alt="{{ $car->make }} {{ $car->model }}" 
                                                class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-700"
                                            >
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                        </div>
                                    @else
                                        <div class="w-full h-72 bg-gradient-to-br from-blue-50 via-slate-100 to-blue-50 flex items-center justify-center">
                                            <svg class="w-20 h-20 text-slate-300 group-hover:text-blue-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    @if($car->is_featured)
                                        <span class="absolute top-5 right-5 bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 text-white px-4 py-2 rounded-full text-xs font-bold shadow-xl backdrop-blur-md border border-amber-300/50 animate-pulse">
                                            ⭐ Empfohlen
                                        </span>
                                    @endif
                                </a>
                                <div class="p-6 bg-white">
                                    <h3 class="text-2xl font-bold bg-gradient-to-r from-slate-900 to-slate-700 bg-clip-text text-transparent mb-2 group-hover:from-blue-600 group-hover:to-blue-800 transition-all duration-300">
                                        <a href="{{ route('cars.show', $car) }}" class="hover:underline">
                                            {{ $car->make }} {{ $car->model }}
                                        </a>
                                    </h3>
                                    <p class="text-sm text-slate-500 mb-4 font-medium flex items-center gap-2">
                                        <span class="inline-flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $car->year }}
                                        </span>
                                        <span>•</span>
                                        <span class="inline-flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                            </svg>
                                            {{ $car->formatted_mileage }}
                                        </span>
                                    </p>
                                    <div class="flex items-baseline justify-between mb-5 pb-4 border-b border-slate-100">
                                        <span class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-blue-700 bg-clip-text text-transparent">{{ $car->formatted_price }}</span>
                                    </div>
                                    <div class="flex flex-wrap gap-2 mb-6">
                                        <span class="px-3 py-1.5 bg-gradient-to-r from-blue-50 to-blue-100 text-blue-700 rounded-lg text-xs font-semibold border border-blue-200/50 shadow-sm">
                                            {{ $car->german_fuel_type }}
                                        </span>
                                        <span class="px-3 py-1.5 bg-gradient-to-r from-slate-50 to-slate-100 text-slate-700 rounded-lg text-xs font-semibold border border-slate-200/50 shadow-sm">
                                            {{ $car->german_transmission }}
                                        </span>
                                        @if($car->body_type)
                                            <span class="px-3 py-1.5 bg-gradient-to-r from-slate-50 to-slate-100 text-slate-700 rounded-lg text-xs font-semibold border border-slate-200/50 shadow-sm">
                                                {{ $car->german_body_type }}
                                            </span>
                                        @endif
                                    </div>
                                    <a 
                                        href="{{ route('cars.show', $car) }}" 
                                        class="block w-full bg-gradient-to-r from-slate-900 to-slate-800 hover:from-blue-600 hover:to-blue-700 text-white text-center px-4 py-3.5 rounded-xl text-sm font-bold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                                    >
                                        Details anzeigen →
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-10 flex justify-center">
                        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-2">
                            {{ $cars->links() }}
                        </div>
                    </div>
                @else
                    <div class="bg-white rounded-2xl shadow-sm p-16 text-center border border-slate-100">
                        <svg class="w-20 h-20 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-slate-600 text-lg font-medium mb-2">Keine Autos gefunden, die Ihren Kriterien entsprechen.</p>
                        <p class="text-slate-500 text-sm mb-6">Versuchen Sie, Ihre Filter anzupassen, um mehr Ergebnisse zu sehen.</p>
                        <a 
                            href="{{ route('home') }}" 
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-200 shadow-sm hover:shadow-md"
                        >
                            Alle Filter löschen
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
