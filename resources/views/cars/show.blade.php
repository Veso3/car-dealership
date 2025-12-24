@extends('layouts.public')

@section('title', $car->make . ' ' . $car->model . ' - Autohändler')

@section('content')
<div x-data="{
    lightboxOpen: false,
    currentImageIndex: 0,
    images: [
        @foreach($car->images as $img)
            '{{ Storage::url($img->image_path) }}'@if(!$loop->last),@endif
        @endforeach
    ],
    openLightbox(index) {
        this.currentImageIndex = index;
        this.lightboxOpen = true;
        document.body.style.overflow = 'hidden';
    },
    closeLightbox() {
        this.lightboxOpen = false;
        document.body.style.overflow = '';
    },
    nextImage() {
        if (this.images.length > 0) {
            if (this.currentImageIndex < this.images.length - 1) {
                this.currentImageIndex++;
            } else {
                this.currentImageIndex = 0;
            }
        }
    },
    prevImage() {
        if (this.images.length > 0) {
            if (this.currentImageIndex > 0) {
                this.currentImageIndex--;
            } else {
                this.currentImageIndex = this.images.length - 1;
            }
        }
    }
}" 
@keydown.escape.window="closeLightbox()"
@keydown.arrow-left.window="if(lightboxOpen) prevImage()"
@keydown.arrow-right.window="if(lightboxOpen) nextImage()"
class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 bg-gradient-to-b from-slate-50 via-white to-slate-50 min-h-screen">
    <a href="{{ route('home') }}" class="group mb-8 inline-flex items-center px-4 py-2 bg-white/80 backdrop-blur-sm text-blue-600 hover:text-blue-700 rounded-xl font-semibold transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-x-1">
        <svg class="w-5 h-5 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Zurück zur Übersicht
    </a>

    <div class="bg-white/95 backdrop-blur-md rounded-3xl shadow-2xl overflow-hidden border border-slate-200/60">
        <!-- Image Gallery -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8 lg:p-12">
            <div>
                @if($car->images->count() > 0)
                    <div class="mb-6 relative group cursor-pointer" @click="openLightbox(0)">
                        <img id="mainImage" src="{{ Storage::url($car->images->first()->image_path) }}" 
                             alt="{{ $car->make }} {{ $car->model }}" 
                             class="w-full h-[500px] object-cover rounded-3xl shadow-2xl transition-transform duration-500 group-hover:scale-[1.02]">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="bg-white/90 backdrop-blur-sm rounded-full p-4 shadow-2xl">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    @if($car->images->count() > 1)
                        <div class="grid grid-cols-4 gap-3">
                            @foreach($car->images as $index => $image)
                                <img src="{{ Storage::url($image->image_path) }}" 
                                     alt="Vorschaubild" 
                                     @click="openLightbox({{ $index }}); document.getElementById('mainImage').src='{{ Storage::url($image->image_path) }}'"
                                     class="w-full h-28 object-cover rounded-xl cursor-pointer hover:opacity-80 border-2 border-transparent hover:border-blue-500 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            @endforeach
                        </div>
                    @endif
                @else
                    <div class="w-full h-[500px] bg-gradient-to-br from-blue-50 via-slate-100 to-blue-50 flex items-center justify-center rounded-3xl border-2 border-dashed border-slate-300">
                        <span class="text-slate-400 font-medium">Kein Bild verfügbar</span>
                    </div>
                @endif
            </div>

            <!-- Car Info -->
            <div>
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <h1 class="text-5xl font-bold bg-gradient-to-r from-slate-900 via-blue-600 to-slate-900 bg-clip-text text-transparent mb-2">
                            {{ $car->make }} {{ $car->model }}
                        </h1>
                        <p class="text-2xl text-slate-600 mb-6 font-medium">{{ $car->year }}</p>
                    </div>
                    @if($car->is_featured)
                        <span class="inline-flex items-center bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 text-white px-4 py-2 rounded-full text-xs font-bold shadow-xl border border-amber-300/50">
                            ⭐ Empfohlen
                        </span>
                    @endif
                </div>
                
                <div class="mb-8 pb-6 border-b-2 border-slate-100">
                    <span class="text-5xl font-bold bg-gradient-to-r from-blue-600 to-blue-700 bg-clip-text text-transparent">{{ $car->formatted_price }}</span>
                </div>

                <!-- Key Specs -->
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100/50 p-5 rounded-2xl border border-blue-200/50 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <p class="text-xs text-slate-600 mb-2 font-semibold uppercase tracking-wide">Kilometerstand</p>
                        <p class="text-xl font-bold text-slate-900">{{ $car->formatted_mileage }}</p>
                    </div>
                    <div class="bg-gradient-to-br from-slate-50 to-slate-100/50 p-5 rounded-2xl border border-slate-200/50 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <p class="text-xs text-slate-600 mb-2 font-semibold uppercase tracking-wide">Kraftstoffart</p>
                        <p class="text-xl font-bold text-slate-900">{{ $car->german_fuel_type }}</p>
                    </div>
                    <div class="bg-gradient-to-br from-slate-50 to-slate-100/50 p-5 rounded-2xl border border-slate-200/50 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <p class="text-xs text-slate-600 mb-2 font-semibold uppercase tracking-wide">Getriebe</p>
                        <p class="text-xl font-bold text-slate-900">{{ $car->german_transmission }}</p>
                    </div>
                    <div class="bg-gradient-to-br from-slate-50 to-slate-100/50 p-5 rounded-2xl border border-slate-200/50 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <p class="text-xs text-slate-600 mb-2 font-semibold uppercase tracking-wide">Fahrzeugtyp</p>
                        <p class="text-xl font-bold text-slate-900">{{ $car->german_body_type }}</p>
                    </div>
                </div>

                <!-- Contact Info -->
                @if($car->contact_phone || $car->contact_email)
                    <div class="border-t border-slate-200 pt-6">
                        <h3 class="font-bold text-slate-900 mb-4 text-lg">Kontaktinformationen</h3>
                        @if($car->contact_phone)
                            <p class="text-slate-700 mb-2">Telefon: <a href="tel:{{ $car->contact_phone }}" class="text-blue-500 hover:text-blue-600 font-medium transition-colors">{{ $car->contact_phone }}</a></p>
                        @endif
                        @if($car->contact_email)
                            <p class="text-slate-700 mb-2">E-Mail: <a href="mailto:{{ $car->contact_email }}" class="text-blue-500 hover:text-blue-600 font-medium transition-colors">{{ $car->contact_email }}</a></p>
                        @endif
                        @if($car->location)
                            <p class="text-slate-700">Standort: <span class="font-medium">{{ $car->location }}</span></p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <!-- Detailed Specifications -->
        <div class="border-t border-slate-200 p-8">
            <h2 class="text-3xl font-bold mb-6 text-slate-900">Spezifikationen</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-slate-50 p-3 rounded-lg">
                    <span class="text-slate-600">Marke:</span>
                    <span class="font-bold ml-2 text-slate-900">{{ $car->make }}</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-lg">
                    <span class="text-slate-600">Modell:</span>
                    <span class="font-bold ml-2 text-slate-900">{{ $car->model }}</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-lg">
                    <span class="text-slate-600">Jahr:</span>
                    <span class="font-bold ml-2 text-slate-900">{{ $car->year }}</span>
                </div>
                <div class="bg-slate-50 p-3 rounded-lg">
                    <span class="text-slate-600">Zustand:</span>
                    <span class="font-bold ml-2 text-slate-900">{{ ucfirst($car->condition) }}</span>
                </div>
                @if($car->engine_size)
                    <div class="bg-slate-50 p-3 rounded-lg">
                        <span class="text-slate-600">Hubraum:</span>
                        <span class="font-bold ml-2 text-slate-900">{{ $car->engine_size }}L</span>
                    </div>
                @endif
                @if($car->power_hp)
                    <div class="bg-slate-50 p-3 rounded-lg">
                        <span class="text-slate-600">Leistung:</span>
                        <span class="font-bold ml-2 text-slate-900">{{ $car->power_hp }} HP</span>
                    </div>
                @endif
                @if($car->color)
                    <div class="bg-slate-50 p-3 rounded-lg">
                        <span class="text-slate-600">Farbe:</span>
                        <span class="font-bold ml-2 text-slate-900">{{ $car->color }}</span>
                    </div>
                @endif
                @if($car->doors)
                    <div class="bg-slate-50 p-3 rounded-lg">
                        <span class="text-slate-600">Türen:</span>
                        <span class="font-bold ml-2 text-slate-900">{{ $car->doors }}</span>
                    </div>
                @endif
                @if($car->seats)
                    <div class="bg-slate-50 p-3 rounded-lg">
                        <span class="text-slate-600">Sitze:</span>
                        <span class="font-bold ml-2 text-slate-900">{{ $car->seats }}</span>
                    </div>
                @endif
                @if($car->first_registration)
                    <div class="bg-slate-50 p-3 rounded-lg">
                        <span class="text-slate-600">Erstzulassung:</span>
                        <span class="font-bold ml-2 text-slate-900">{{ $car->first_registration->format('M Y') }}</span>
                    </div>
                @endif
                @if($car->vin)
                    <div class="bg-slate-50 p-3 rounded-lg">
                        <span class="text-slate-600">VIN:</span>
                        <span class="font-bold ml-2 text-slate-900">{{ $car->vin }}</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Features -->
        @if($car->features->count() > 0)
            <div class="border-t border-slate-200 p-8">
                <h2 class="text-3xl font-bold mb-6 text-slate-900">Ausstattung & Ausrüstung</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                    @foreach($car->features as $feature)
                        <div class="flex items-center bg-slate-50 p-3 rounded-lg border border-slate-100">
                            <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-slate-700 text-sm">{{ $feature->german_name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Description -->
        @if($car->description)
            <div class="border-t border-slate-200 p-8">
                <h2 class="text-3xl font-bold mb-4 text-slate-900">Beschreibung</h2>
                <p class="text-slate-700 whitespace-pre-line leading-relaxed">{{ $car->description }}</p>
            </div>
        @endif
    </div>

    <!-- Related Cars -->
    @if($relatedCars->count() > 0)
        <div class="mt-12">
            <h2 class="text-3xl font-bold mb-6 text-slate-900">Ähnliche Autos</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedCars as $relatedCar)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 border border-slate-100 group">
                        <a href="{{ route('cars.show', $relatedCar) }}">
                            @if($relatedCar->images->count() > 0)
                                <img src="{{ Storage::url($relatedCar->images->first()->image_path) }}" 
                                     alt="{{ $relatedCar->make }} {{ $relatedCar->model }}" 
                                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-48 bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                                    <span class="text-slate-400 text-sm">Kein Bild</span>
                                </div>
                            @endif
                        </a>
                        <div class="p-5">
                            <h3 class="font-bold text-slate-900 mb-1 group-hover:text-blue-600 transition-colors">
                                {{ $relatedCar->make }} {{ $relatedCar->model }}
                            </h3>
                            <p class="text-sm text-slate-600 mb-2">{{ $relatedCar->year }}</p>
                            <p class="text-xl font-bold text-blue-500 mb-3">{{ $relatedCar->formatted_price }}</p>
                            <a href="{{ route('cars.show', $relatedCar) }}" 
                               class="block w-full bg-blue-500 hover:bg-blue-600 text-white text-center px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 shadow-sm hover:shadow-md">
                                Details anzeigen
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Lightbox Modal -->
    <div x-show="lightboxOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click.self="closeLightbox()"
         class="fixed inset-0 z-[100] bg-black/95 backdrop-blur-sm flex items-center justify-center"
         style="display: none;"
         @keydown.escape.window="closeLightbox()">
        
        <!-- Close Button -->
        <button 
            @click="closeLightbox()"
            class="absolute top-4 right-4 md:top-8 md:right-8 text-white hover:text-blue-400 transition-all duration-200 z-10 bg-black/60 hover:bg-black/80 rounded-full p-3 md:p-4 shadow-xl"
            aria-label="Schließen">
            <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Previous Button -->
        <button 
            x-show="images.length > 1"
            @click="prevImage()"
            class="absolute left-4 md:left-8 top-1/2 -translate-y-1/2 text-white hover:text-blue-400 transition-all duration-200 z-10 bg-black/60 hover:bg-black/80 rounded-full p-3 md:p-4 shadow-xl"
            aria-label="Vorheriges Bild">
            <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        <!-- Next Button -->
        <button 
            x-show="images.length > 1"
            @click="nextImage()"
            class="absolute right-4 md:right-8 top-1/2 -translate-y-1/2 text-white hover:text-blue-400 transition-all duration-200 z-10 bg-black/60 hover:bg-black/80 rounded-full p-3 md:p-4 shadow-xl"
            aria-label="Nächstes Bild">
            <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        <!-- Image Container -->
        <div class="relative max-w-7xl mx-auto px-4 w-full h-full flex items-center justify-center">
            <div class="relative w-full h-full flex flex-col items-center justify-center">
                <!-- Car Info -->
                <div class="mb-4 text-center">
                    <h3 class="text-2xl md:text-3xl font-bold text-white mb-2">{{ $car->make }} {{ $car->model }}</h3>
                    <p class="text-white/70 text-sm md:text-base" x-show="images.length > 1">
                        Bild <span x-text="currentImageIndex + 1"></span> von <span x-text="images.length"></span>
                    </p>
                </div>

                <!-- Image -->
                <img 
                    :src="images[currentImageIndex]" 
                    alt="{{ $car->make }} {{ $car->model }}"
                    class="max-w-full max-h-[80vh] object-contain rounded-lg shadow-2xl"
                    @click.self="closeLightbox()"
                >

                <!-- Image Navigation Dots -->
                <div x-show="images.length > 1" class="mt-6 flex gap-2 flex-wrap justify-center">
                    <template x-for="(img, index) in images" :key="index">
                        <button 
                            @click="currentImageIndex = index;"
                            class="w-2 h-2 rounded-full transition-all duration-200"
                            :class="currentImageIndex === index ? 'bg-blue-500 w-8' : 'bg-white/30 hover:bg-white/50'"
                            :aria-label="'Bild ' + (index + 1) + ' anzeigen'">
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


