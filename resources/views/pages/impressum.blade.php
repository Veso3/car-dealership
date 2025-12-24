@extends('layouts.public')

@section('title', 'Impressum - Autohändler')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">Impressum</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 border border-slate-100">
        <div class="prose prose-slate max-w-none">
            <section class="mb-8">
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Angaben gemäß § 5 TMG</h2>
                <p class="text-slate-700 mb-2">
                    <strong>Autohändler GmbH</strong><br>
                    Musterstraße 123<br>
                    12345 Musterstadt<br>
                    Deutschland
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Kontakt</h2>
                <p class="text-slate-700 mb-2">
                    Telefon: +49 (0) 123 456 789<br>
                    E-Mail: info@autohaendler.de<br>
                    Website: www.autohaendler.de
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Vertreten durch</h2>
                <p class="text-slate-700 mb-2">
                    Geschäftsführer: Max Mustermann<br>
                    Handelsregister: HRB 12345<br>
                    Registergericht: Amtsgericht Musterstadt
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Umsatzsteuer-ID</h2>
                <p class="text-slate-700 mb-2">
                    Umsatzsteuer-Identifikationsnummer gemäß § 27 a Umsatzsteuergesetz:<br>
                    DE 123456789
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV</h2>
                <p class="text-slate-700 mb-2">
                    Max Mustermann<br>
                    Musterstraße 123<br>
                    12345 Musterstadt
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-bold text-slate-900 mb-4">Haftungsausschluss</h2>
                
                <h3 class="text-xl font-semibold text-slate-900 mb-3 mt-6">Haftung für Inhalte</h3>
                <p class="text-slate-700 mb-4">
                    Die Inhalte unserer Seiten wurden mit größter Sorgfalt erstellt. Für die Richtigkeit, 
                    Vollständigkeit und Aktualität der Inhalte können wir jedoch keine Gewähr übernehmen. 
                    Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten 
                    nach den allgemeinen Gesetzen verantwortlich.
                </p>

                <h3 class="text-xl font-semibold text-slate-900 mb-3 mt-6">Haftung für Links</h3>
                <p class="text-slate-700 mb-4">
                    Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen 
                    Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. 
                    Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber 
                    der Seiten verantwortlich.
                </p>

                <h3 class="text-xl font-semibold text-slate-900 mb-3 mt-6">Urheberrecht</h3>
                <p class="text-slate-700 mb-4">
                    Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen 
                    dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art 
                    der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen 
                    Zustimmung des jeweiligen Autors bzw. Erstellers.
                </p>
            </section>
        </div>
    </div>
</div>
@endsection

