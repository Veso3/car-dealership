@extends('layouts.public')

@section('title', 'Anfahrt - Autohändler')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">Anfahrt</h1>
        <p class="text-lg text-slate-600 max-w-2xl mx-auto">
            So finden Sie uns - Wir freuen uns auf Ihren Besuch!
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
        <!-- Address & Directions -->
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100">
            <h2 class="text-2xl font-bold text-slate-900 mb-6">Unsere Adresse</h2>
            
            <div class="space-y-4 mb-8">
                <div>
                    <p class="text-lg font-semibold text-slate-900">Autohändler GmbH</p>
                    <p class="text-slate-600">Musterstraße 123</p>
                    <p class="text-slate-600">12345 Musterstadt</p>
                    <p class="text-slate-600">Deutschland</p>
                </div>

                <div class="pt-4 border-t border-slate-200">
                    <h3 class="text-lg font-semibold text-slate-900 mb-3">Mit dem Auto</h3>
                    <p class="text-slate-600 mb-2">Von der Autobahn A1:</p>
                    <ul class="list-disc list-inside text-slate-600 space-y-1">
                        <li>Ausfahrt 45 "Musterstadt" nehmen</li>
                        <li>Richtung Stadtzentrum fahren</li>
                        <li>Nach 2 km rechts in die Musterstraße abbiegen</li>
                        <li>Wir befinden uns auf der rechten Seite</li>
                    </ul>
                </div>

                <div class="pt-4 border-t border-slate-200">
                    <h3 class="text-lg font-semibold text-slate-900 mb-3">Mit öffentlichen Verkehrsmitteln</h3>
                    <p class="text-slate-600 mb-2">Bus & Bahn:</p>
                    <ul class="list-disc list-inside text-slate-600 space-y-1">
                        <li>Buslinie 123 bis Haltestelle "Musterstraße"</li>
                        <li>Straßenbahn Linie 5 bis Haltestelle "Zentrum"</li>
                        <li>Von dort 5 Minuten Fußweg</li>
                    </ul>
                </div>

                <div class="pt-4 border-t border-slate-200">
                    <h3 class="text-lg font-semibold text-slate-900 mb-3">Parkplätze</h3>
                    <p class="text-slate-600">
                        Wir bieten Ihnen kostenlose Parkplätze direkt vor unserem Autohaus. 
                        Zusätzlich stehen Ihnen 50 Stellplätze auf unserem Gelände zur Verfügung.
                    </p>
                </div>
            </div>
        </div>

        <!-- Map -->
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100">
            <h2 class="text-2xl font-bold text-slate-900 mb-6">Karte</h2>
            <div class="rounded-xl overflow-hidden h-96 border border-slate-200">
                <iframe 
                    src="https://www.openstreetmap.org/export/embed.html?bbox=13.4050%2C52.5200%2C13.4060%2C52.5210&layer=mapnik&marker=52.5205%2C13.4055"
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy"
                    class="w-full h-full">
                </iframe>
            </div>
            <div class="mt-4 flex flex-wrap gap-4">
                <a href="https://www.openstreetmap.org/?mlat=52.5205&mlon=13.4055&zoom=15" target="_blank"
                   class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                    <span>Größere Karte anzeigen</span>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
                <a href="https://maps.google.com/?q=Musterstraße+123,+12345+Musterstadt" target="_blank"
                   class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                    <span>In Google Maps öffnen</span>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

