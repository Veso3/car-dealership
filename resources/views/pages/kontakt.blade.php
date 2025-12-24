@extends('layouts.public')

@section('title', 'Kontakt - Autohändler')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
    <div class="text-center mb-16">
        <h1 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-slate-900 via-blue-600 to-slate-900 bg-clip-text text-transparent mb-6">Kontakt</h1>
        <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
            Wir sind für Sie da! Kontaktieren Sie uns gerne per Telefon, E-Mail oder besuchen Sie uns vor Ort.
        </p>
    </div>

    <div class="max-w-4xl mx-auto">
        <!-- Contact Information -->
        <div class="bg-white/95 backdrop-blur-md rounded-3xl shadow-2xl p-10 border border-slate-200/60">
            <h2 class="text-3xl font-bold bg-gradient-to-r from-slate-900 to-blue-600 bg-clip-text text-transparent mb-8">Kontaktinformationen</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="group flex items-start p-6 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl border border-blue-200/50 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex-shrink-0 p-3 bg-blue-600 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Telefon</h3>
                        <p class="text-slate-700 font-medium">+49 (0) 123 456 789</p>
                        <p class="text-slate-700 font-medium">+49 (0) 123 456 790</p>
                    </div>
                </div>

                <div class="group flex items-start p-6 bg-gradient-to-br from-slate-50 to-slate-100/50 rounded-2xl border border-slate-200/50 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex-shrink-0 p-3 bg-slate-700 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-slate-900 mb-2">E-Mail</h3>
                        <p class="text-slate-700 font-medium">info@autohaendler.de</p>
                        <p class="text-slate-700 font-medium">verkauf@autohaendler.de</p>
                    </div>
                </div>

                <div class="group flex items-start p-6 bg-gradient-to-br from-slate-50 to-slate-100/50 rounded-2xl border border-slate-200/50 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex-shrink-0 p-3 bg-slate-700 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Adresse</h3>
                        <p class="text-slate-700 font-medium">Musterstraße 123</p>
                        <p class="text-slate-700 font-medium">12345 Musterstadt</p>
                        <p class="text-slate-700 font-medium">Deutschland</p>
                    </div>
                </div>

                <div class="group flex items-start p-6 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl border border-blue-200/50 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex-shrink-0 p-3 bg-blue-600 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Öffnungszeiten</h3>
                        <p class="text-slate-700 font-medium">Montag - Freitag: 09:00 - 18:00 Uhr</p>
                        <p class="text-slate-700 font-medium">Samstag: 09:00 - 16:00 Uhr</p>
                        <p class="text-slate-700 font-medium">Sonntag: Geschlossen</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

