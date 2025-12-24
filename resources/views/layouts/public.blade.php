<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Autohändler'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-b from-slate-50 to-white" x-data="{ mobileMenuOpen: false }">
        <nav class="bg-white/80 backdrop-blur-md shadow-sm border-b border-slate-200/60 sticky top-0 z-50 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-18 md:h-20">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                            <x-application-logo class="h-10 w-10 md:h-12 md:w-12 transition-all duration-300 group-hover:scale-110 group-hover:rotate-3" />
                            <span class="text-xl md:text-2xl font-bold bg-gradient-to-r from-slate-900 via-blue-600 to-slate-900 bg-clip-text text-transparent group-hover:from-blue-600 group-hover:via-slate-900 group-hover:to-blue-600 transition-all duration-300">Autohändler</span>
                        </a>
                    </div>
                    <nav class="hidden md:flex items-center space-x-1">
                        <a href="{{ route('home') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:text-blue-600 transition-all duration-200 hover:bg-blue-50 group">
                            <span class="relative z-10">Startseite</span>
                            <span class="absolute inset-0 bg-blue-100 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-200"></span>
                        </a>
                        <a href="{{ route('pages.service') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:text-blue-600 transition-all duration-200 hover:bg-blue-50 group">
                            <span class="relative z-10">Service & Leistungen</span>
                            <span class="absolute inset-0 bg-blue-100 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-200"></span>
                        </a>
                        <a href="{{ route('pages.ueber-uns') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:text-blue-600 transition-all duration-200 hover:bg-blue-50 group">
                            <span class="relative z-10">Über uns</span>
                            <span class="absolute inset-0 bg-blue-100 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-200"></span>
                        </a>
                        <a href="{{ route('pages.anfahrt') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:text-blue-600 transition-all duration-200 hover:bg-blue-50 group">
                            <span class="relative z-10">Anfahrt</span>
                            <span class="absolute inset-0 bg-blue-100 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-200"></span>
                        </a>
                        <a href="{{ route('pages.kontakt') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:text-blue-600 transition-all duration-200 hover:bg-blue-50 group">
                            <span class="relative z-10">Kontakt</span>
                            <span class="absolute inset-0 bg-blue-100 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-200"></span>
                        </a>
                        <a href="{{ route('pages.impressum') }}" class="relative px-4 py-2 rounded-lg text-sm font-medium text-slate-700 hover:text-blue-600 transition-all duration-200 hover:bg-blue-50 group">
                            <span class="relative z-10">Impressum</span>
                            <span class="absolute inset-0 bg-blue-100 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-200"></span>
                        </a>
                    </nav>
                    <div class="flex items-center space-x-2 md:space-x-3">
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('employee.dashboard') }}" class="hidden md:inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg text-sm font-medium transition-all duration-200 hover:from-blue-700 hover:to-blue-800 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                    Admin-Dashboard
                                </a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="hidden md:inline-flex items-center px-4 py-2 bg-slate-100 text-slate-700 rounded-lg text-sm font-medium transition-all duration-200 hover:bg-slate-200 hover:text-slate-900">
                                    Abmelden
                                </button>
                            </form>
                        @endauth
                        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 text-slate-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200">
                            <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div x-show="mobileMenuOpen" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-2"
                     class="md:hidden border-t border-slate-200/60 bg-white/95 backdrop-blur-md py-4"
                     style="display: none;">
                    <div class="flex flex-col space-y-1">
                        <a href="{{ route('home') }}" class="text-slate-700 hover:text-blue-600 hover:bg-blue-50 px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200">
                            Startseite
                        </a>
                        <a href="{{ route('pages.service') }}" class="text-slate-700 hover:text-blue-600 hover:bg-blue-50 px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200">
                            Service & Leistungen
                        </a>
                        <a href="{{ route('pages.ueber-uns') }}" class="text-slate-700 hover:text-blue-600 hover:bg-blue-50 px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200">
                            Über uns
                        </a>
                        <a href="{{ route('pages.anfahrt') }}" class="text-slate-700 hover:text-blue-600 hover:bg-blue-50 px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200">
                            Anfahrt
                        </a>
                        <a href="{{ route('pages.kontakt') }}" class="text-slate-700 hover:text-blue-600 hover:bg-blue-50 px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200">
                            Kontakt
                        </a>
                        <a href="{{ route('pages.impressum') }}" class="text-slate-700 hover:text-blue-600 hover:bg-blue-50 px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200">
                            Impressum
                        </a>
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('employee.dashboard') }}" class="mt-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 hover:from-blue-700 hover:to-blue-800">
                                    Admin-Dashboard
                                </a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="mt-2 text-left w-full bg-slate-100 text-slate-700 px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 hover:bg-slate-200">
                                    Abmelden
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <main class="min-h-screen">
            @yield('content')
        </main>

        <footer class="bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 text-slate-300 border-t border-slate-700/50 mt-20">
            <div class="max-w-7xl mx-auto py-16 md:py-20 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                    <div>
                        <h3 class="text-white font-bold text-xl mb-4 bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">Autohändler</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">
                            Ihr vertrauensvoller Partner bei der Suche nach dem perfekten Fahrzeug. Qualitätsautos, außergewöhnlicher Service.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-lg mb-4">Schnellzugriff</h3>
                        <ul class="space-y-3 text-sm">
                            <li>
                                <a href="{{ route('home') }}" class="text-slate-400 hover:text-white transition-all duration-200 hover:translate-x-1 inline-block">
                                    Autos durchsuchen
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pages.service') }}" class="text-slate-400 hover:text-white transition-all duration-200 hover:translate-x-1 inline-block">
                                    Service & Leistungen
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pages.ueber-uns') }}" class="text-slate-400 hover:text-white transition-all duration-200 hover:translate-x-1 inline-block">
                                    Über uns
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pages.kontakt') }}" class="text-slate-400 hover:text-white transition-all duration-200 hover:translate-x-1 inline-block">
                                    Kontakt
                                </a>
                            </li>
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <li>
                                        <a href="{{ route('employee.dashboard') }}" class="text-slate-400 hover:text-white transition-all duration-200 hover:translate-x-1 inline-block">
                                            Dashboard
                                        </a>
                                    </li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-lg mb-4">Rechtliches</h3>
                        <ul class="space-y-3 text-sm">
                            <li>
                                <a href="{{ route('pages.impressum') }}" class="text-slate-400 hover:text-white transition-all duration-200 hover:translate-x-1 inline-block">
                                    Impressum
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pages.anfahrt') }}" class="text-slate-400 hover:text-white transition-all duration-200 hover:translate-x-1 inline-block">
                                    Anfahrt
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-slate-700/50 pt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                        <p class="text-slate-400 text-sm">&copy; {{ date('Y') }} Autohändler. Alle Rechte vorbehalten.</p>
                        <div class="flex items-center space-x-6 text-sm text-slate-400">
                            <span>Mit Sorgfalt erstellt</span>
                            @guest
                                <a href="{{ route('login') }}" class="text-slate-500 hover:text-slate-300 text-xs opacity-60 hover:opacity-100 transition-opacity">
                                    Admin
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>


