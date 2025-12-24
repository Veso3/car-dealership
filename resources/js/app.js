import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Handle responsive sidebar behavior
document.addEventListener('alpine:init', () => {
    // This ensures Alpine components work correctly
});

Alpine.start();
