<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Neues Auto hinzufügen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('employee.cars.store') }}" enctype="multipart/form-data" class="bg-white shadow-sm sm:rounded-lg p-6">
                @csrf

                <!-- Basic Information -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4 border-b pb-2 text-gray-900">Grundinformationen</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="make" :value="__('Marke')" />
                            <x-text-input id="make" class="block mt-1 w-full" type="text" name="make" :value="old('make')" required autofocus />
                            <x-input-error :messages="$errors->get('make')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="model" :value="__('Modell')" />
                            <x-text-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model')" required />
                            <x-input-error :messages="$errors->get('model')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="year" :value="__('Jahr')" />
                            <x-text-input id="year" class="block mt-1 w-full" type="number" name="year" :value="old('year')" required min="1900" :max="date('Y') + 1" />
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="price" :value="__('Preis (€)')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required step="0.01" min="0" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="mileage" :value="__('Kilometerstand (km)')" />
                            <x-text-input id="mileage" class="block mt-1 w-full" type="number" name="mileage" :value="old('mileage')" required min="0" />
                            <x-input-error :messages="$errors->get('mileage')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="condition" :value="__('Zustand')" />
                            <select id="condition" name="condition" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 bg-white" style="color: #111827;" required>
                                <option value="used" {{ old('condition') == 'used' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Gebraucht</option>
                                <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Neu</option>
                                <option value="demo" {{ old('condition') == 'demo' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Vorführwagen</option>
                            </select>
                            <x-input-error :messages="$errors->get('condition')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <!-- Vehicle Details -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4 border-b pb-2 text-gray-900">Fahrzeugdetails</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="fuel_type" :value="__('Kraftstoffart')" />
                            <select id="fuel_type" name="fuel_type" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 bg-white" style="color: #111827;" required>
                                <option value="petrol" {{ old('fuel_type') == 'petrol' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Benzin</option>
                                <option value="diesel" {{ old('fuel_type') == 'diesel' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Diesel</option>
                                <option value="electric" {{ old('fuel_type') == 'electric' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Elektrisch</option>
                                <option value="hybrid" {{ old('fuel_type') == 'hybrid' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Hybrid</option>
                                <option value="plug-in_hybrid" {{ old('fuel_type') == 'plug-in_hybrid' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Plug-in Hybrid</option>
                                <option value="lpg" {{ old('fuel_type') == 'lpg' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">LPG</option>
                                <option value="cng" {{ old('fuel_type') == 'cng' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">CNG</option>
                            </select>
                            <x-input-error :messages="$errors->get('fuel_type')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="transmission" :value="__('Getriebe')" />
                            <select id="transmission" name="transmission" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 bg-white" style="color: #111827;" required>
                                <option value="manual" {{ old('transmission') == 'manual' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Manuell</option>
                                <option value="automatic" {{ old('transmission') == 'automatic' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Automatik</option>
                                <option value="semi_automatic" {{ old('transmission') == 'semi_automatic' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Halbautomatik</option>
                            </select>
                            <x-input-error :messages="$errors->get('transmission')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="body_type" :value="__('Fahrzeugtyp')" />
                            <select id="body_type" name="body_type" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 bg-white" style="color: #111827;" required>
                                <option value="sedan" {{ old('body_type') == 'sedan' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Limousine</option>
                                <option value="suv" {{ old('body_type') == 'suv' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">SUV</option>
                                <option value="coupe" {{ old('body_type') == 'coupe' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Coupé</option>
                                <option value="convertible" {{ old('body_type') == 'convertible' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Cabrio</option>
                                <option value="wagon" {{ old('body_type') == 'wagon' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Kombi</option>
                                <option value="hatchback" {{ old('body_type') == 'hatchback' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Kombi</option>
                                <option value="van" {{ old('body_type') == 'van' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Van</option>
                                <option value="pickup" {{ old('body_type') == 'pickup' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Pickup</option>
                                <option value="other" {{ old('body_type') == 'other' ? 'selected' : '' }} style="color: #111827; background-color: #ffffff;">Sonstiges</option>
                            </select>
                            <x-input-error :messages="$errors->get('body_type')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="engine_size" :value="__('Hubraum (L)')" />
                            <x-text-input id="engine_size" class="block mt-1 w-full" type="number" name="engine_size" :value="old('engine_size')" step="0.1" min="0" max="20" />
                            <x-input-error :messages="$errors->get('engine_size')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="power_hp" :value="__('Leistung (PS)')" />
                            <x-text-input id="power_hp" class="block mt-1 w-full" type="number" name="power_hp" :value="old('power_hp')" min="0" />
                            <x-input-error :messages="$errors->get('power_hp')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="color" :value="__('Farbe')" />
                            <x-text-input id="color" class="block mt-1 w-full" type="text" name="color" :value="old('color')" />
                            <x-input-error :messages="$errors->get('color')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="doors" :value="__('Türen')" />
                            <x-text-input id="doors" class="block mt-1 w-full" type="number" name="doors" :value="old('doors')" min="2" max="6" />
                            <x-input-error :messages="$errors->get('doors')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="seats" :value="__('Sitze')" />
                            <x-text-input id="seats" class="block mt-1 w-full" type="number" name="seats" :value="old('seats')" min="2" max="9" />
                            <x-input-error :messages="$errors->get('seats')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="first_registration" :value="__('Erstzulassung')" />
                            <x-text-input id="first_registration" class="block mt-1 w-full" type="date" name="first_registration" :value="old('first_registration')" />
                            <x-input-error :messages="$errors->get('first_registration')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="vin" :value="__('VIN')" />
                            <x-text-input id="vin" class="block mt-1 w-full" type="text" name="vin" :value="old('vin')" />
                            <x-input-error :messages="$errors->get('vin')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <!-- Features/Equipment -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4 border-b pb-2 text-gray-900">Ausstattung & Ausrüstung</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                        @foreach($features as $feature)
                            <label class="flex items-center">
                                <input type="checkbox" name="features[]" value="{{ $feature->id }}" 
                                       {{ in_array($feature->id, old('features', [])) ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <span class="ml-2 text-sm text-gray-700">{{ $feature->german_name }}</span>
                            </label>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->get('features.*')" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4 border-b pb-2 text-gray-900">Beschreibung</h3>
                    <textarea id="description" name="description" rows="6" 
                              class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 bg-white">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- Contact & Location -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4 border-b pb-2 text-gray-900">Kontakt & Standort</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="location" :value="__('Standort')" />
                            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" />
                            <x-input-error :messages="$errors->get('location')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="contact_phone" :value="__('Kontakttelefon')" />
                            <x-text-input id="contact_phone" class="block mt-1 w-full" type="text" name="contact_phone" :value="old('contact_phone')" />
                            <x-input-error :messages="$errors->get('contact_phone')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="contact_email" :value="__('Kontakt-E-Mail')" />
                            <x-text-input id="contact_email" class="block mt-1 w-full" type="email" name="contact_email" :value="old('contact_email')" />
                            <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <!-- Images -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4 border-b pb-2 text-gray-900">Bilder</h3>
                    <div>
                        <x-input-label for="images" :value="__('Auto-Bilder')" />
                        <input id="images" type="file" name="images[]" multiple accept="image/*" 
                               class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        <p class="mt-1 text-sm text-gray-500">Sie können mehrere Bilder hochladen. Das erste Bild wird als Hauptbild festgelegt.</p>
                        <x-input-error :messages="$errors->get('images.*')" class="mt-2" />
                    </div>
                </div>

                <!-- Options -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4 border-b pb-2 text-gray-900">Optionen</h3>
                    <div class="space-y-3">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_featured" value="1" 
                                   {{ old('is_featured') ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <span class="ml-2 text-sm text-gray-700">Diese Anzeige hervorheben</span>
                        </label>

                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" 
                                   {{ old('is_active', true) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <span class="ml-2 text-sm text-gray-700">Sofort veröffentlichen</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('employee.cars.index') }}" 
                       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md text-sm font-medium">
                        Abbrechen
                    </a>
                    <x-primary-button>
                        Anzeige erstellen
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>


