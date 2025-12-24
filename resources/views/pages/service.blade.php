@extends('layouts.public')

@section('title', 'Service & Leistungen - Autohändler')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
    <div class="text-center mb-16">
        <h1 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-slate-900 via-blue-600 to-slate-900 bg-clip-text text-transparent mb-6">Service & Leistungen</h1>
        <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
            Umfassende Serviceleistungen für Ihr Fahrzeug - von der Beratung bis zur Wartung
        </p>
    </div>

    <!-- Services Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
        <!-- Service 1 -->
        <div class="group bg-white/95 backdrop-blur-md rounded-3xl shadow-xl p-8 border border-slate-200/60 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold bg-gradient-to-r from-slate-900 to-slate-700 bg-clip-text text-transparent mb-3">Fahrzeugberatung</h3>
            <p class="text-slate-600 leading-relaxed">
                Professionelle Beratung bei der Auswahl Ihres Traumautos. Wir finden das perfekte Fahrzeug für Ihre Bedürfnisse.
            </p>
        </div>

        <!-- Service 2 -->
        <div class="group bg-white/95 backdrop-blur-md rounded-3xl shadow-xl p-8 border border-slate-200/60 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="w-16 h-16 bg-gradient-to-br from-slate-600 to-slate-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold bg-gradient-to-r from-slate-900 to-slate-700 bg-clip-text text-transparent mb-3">Finanzierung</h3>
            <p class="text-slate-600 leading-relaxed">
                Individuelle Finanzierungs- und Leasinglösungen. Wir finden die beste Option für Ihr Budget.
            </p>
        </div>

        <!-- Service 3 -->
        <div class="group bg-white/95 backdrop-blur-md rounded-3xl shadow-xl p-8 border border-slate-200/60 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold bg-gradient-to-r from-slate-900 to-slate-700 bg-clip-text text-transparent mb-3">Wartung & Reparatur</h3>
            <p class="text-slate-600 leading-relaxed">
                Professionelle Wartung und Reparatur durch zertifizierte Kfz-Meister. Ihr Fahrzeug in besten Händen.
            </p>
        </div>

        <!-- Service 4 -->
        <div class="group bg-white/95 backdrop-blur-md rounded-3xl shadow-xl p-8 border border-slate-200/60 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold bg-gradient-to-r from-slate-900 to-slate-700 bg-clip-text text-transparent mb-3">Garantie & Gewährleistung</h3>
            <p class="text-slate-600 leading-relaxed">
                Umfassende Garantie- und Gewährleistungsbedingungen für Ihr neues oder gebrauchtes Fahrzeug.
            </p>
        </div>

        <!-- Service 5 -->
        <div class="group bg-white/95 backdrop-blur-md rounded-3xl shadow-xl p-8 border border-slate-200/60 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="w-16 h-16 bg-gradient-to-br from-slate-600 to-slate-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold bg-gradient-to-r from-slate-900 to-slate-700 bg-clip-text text-transparent mb-3">Inzahlungnahme</h3>
            <p class="text-slate-600 leading-relaxed">
                Faire Bewertung und Inzahlungnahme Ihres aktuellen Fahrzeugs beim Kauf eines neuen.
            </p>
        </div>

        <!-- Service 6 -->
        <div class="group bg-white/95 backdrop-blur-md rounded-3xl shadow-xl p-8 border border-slate-200/60 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold bg-gradient-to-r from-slate-900 to-slate-700 bg-clip-text text-transparent mb-3">Ersatzteile</h3>
            <p class="text-slate-600 leading-relaxed">
                Original-Ersatzteile und Zubehör für alle gängigen Marken. Schnelle Lieferung garantiert.
            </p>
        </div>
    </div>

    <!-- Additional Services -->
    <div class="bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 rounded-3xl shadow-2xl p-10 md:p-14 text-white mb-16">
        <h2 class="text-4xl font-bold mb-8 text-center">Weitere Leistungen</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-xl font-semibold mb-3">Fahrzeuginspektion</h3>
                <p class="text-blue-100">
                    Umfassende technische Inspektion vor dem Kauf. Wir prüfen jedes Fahrzeug gründlich auf Mängel und geben Ihnen eine detaillierte Bewertung.
                </p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-3">Fahrzeugaufbereitung</h3>
                <p class="text-blue-100">
                    Professionelle Innen- und Außenaufbereitung. Ihr Fahrzeug erstrahlt in neuem Glanz durch unsere Spezialisten.
                </p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-3">Unfallschadenabwicklung</h3>
                <p class="text-blue-100">
                    Unterstützung bei der Abwicklung von Unfallschäden. Wir kümmern uns um die Koordination mit Versicherungen und Werkstätten.
                </p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-3">Fahrzeuglieferung</h3>
                <p class="text-blue-100">
                    Bequeme Lieferung Ihres neuen Fahrzeugs direkt zu Ihnen nach Hause. Deutschlandweit verfügbar.
                </p>
            </div>
        </div>
    </div>

    <!-- Service Hours -->
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100">
        <h2 class="text-2xl font-bold text-slate-900 mb-6 text-center">Servicezeiten</h2>
        <div class="max-w-2xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-3">Verkauf</h3>
                    <ul class="space-y-2 text-slate-600">
                        <li>Montag - Freitag: 09:00 - 18:00 Uhr</li>
                        <li>Samstag: 09:00 - 16:00 Uhr</li>
                        <li>Sonntag: Geschlossen</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-3">Werkstatt</h3>
                    <ul class="space-y-2 text-slate-600">
                        <li>Montag - Freitag: 07:30 - 17:00 Uhr</li>
                        <li>Samstag: 08:00 - 12:00 Uhr</li>
                        <li>Sonntag: Geschlossen</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

