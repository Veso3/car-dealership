@extends('layouts.public')

@section('title', 'Über uns - Autohändler')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">Über uns</h1>
        <p class="text-lg text-slate-600 max-w-2xl mx-auto">
            Seit über 30 Jahren sind wir Ihr vertrauensvoller Partner für qualitativ hochwertige Fahrzeuge
        </p>
    </div>

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl shadow-xl p-8 md:p-12 mb-12 text-white">
        <div class="max-w-3xl">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Unsere Geschichte</h2>
            <p class="text-lg text-blue-100 leading-relaxed">
                Gegründet im Jahr 1990, haben wir uns von einem kleinen Familienbetrieb zu einem der 
                führenden Autohändler in der Region entwickelt. Unser Erfolg basiert auf Qualität, 
                Transparenz und dem Vertrauen unserer Kunden.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <!-- Our Values -->
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100">
            <h2 class="text-2xl font-bold text-slate-900 mb-6">Unsere Werte</h2>
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-2 flex items-center">
                        <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Qualität
                    </h3>
                    <p class="text-slate-600">
                        Wir bieten ausschließlich geprüfte und zertifizierte Fahrzeuge höchster Qualität an.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-2 flex items-center">
                        <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Vertrauen
                    </h3>
                    <p class="text-slate-600">
                        Transparenz und Ehrlichkeit stehen im Mittelpunkt unserer Geschäftsbeziehungen.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-2 flex items-center">
                        <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Service
                    </h3>
                    <p class="text-slate-600">
                        Unser erfahrenes Team steht Ihnen mit Rat und Tat zur Seite - vor und nach dem Kauf.
                    </p>
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100">
            <h2 class="text-2xl font-bold text-slate-900 mb-6">Unsere Zahlen</h2>
            <div class="grid grid-cols-2 gap-6">
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-600 mb-2">30+</div>
                    <div class="text-slate-600">Jahre Erfahrung</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-600 mb-2">5000+</div>
                    <div class="text-slate-600">Zufriedene Kunden</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-600 mb-2">200+</div>
                    <div class="text-slate-600">Fahrzeuge im Bestand</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-600 mb-2">98%</div>
                    <div class="text-slate-600">Kundenzufriedenheit</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 border border-slate-100">
        <h2 class="text-2xl font-bold text-slate-900 mb-8 text-center">Unser Team</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-32 h-32 bg-slate-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-16 h-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-900 mb-1">Max Mustermann</h3>
                <p class="text-slate-600 text-sm mb-2">Geschäftsführer</p>
                <p class="text-slate-500 text-sm">Über 20 Jahre Erfahrung in der Automobilbranche</p>
            </div>
            <div class="text-center">
                <div class="w-32 h-32 bg-slate-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-16 h-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-900 mb-1">Anna Schmidt</h3>
                <p class="text-slate-600 text-sm mb-2">Verkaufsleiterin</p>
                <p class="text-slate-500 text-sm">Spezialistin für Premium-Fahrzeuge</p>
            </div>
            <div class="text-center">
                <div class="w-32 h-32 bg-slate-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-16 h-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-900 mb-1">Thomas Weber</h3>
                <p class="text-slate-600 text-sm mb-2">Serviceleiter</p>
                <p class="text-slate-500 text-sm">Zertifizierter Kfz-Meister seit 15 Jahren</p>
            </div>
        </div>
    </div>
</div>
@endsection

