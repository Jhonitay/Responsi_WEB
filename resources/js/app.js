// Import library dan file yang diperlukan
import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

// Mendapatkan judul aplikasi dari elemen <title> pada dokumen HTML
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

// Membuat aplikasi Inertia
createInertiaApp({
  // Konfigurasi judul halaman dengan menggunakan judul yang diterima dan judul aplikasi
  title: (title) => `${title} - ${appName}`,
  
  // Resolusi komponen halaman berdasarkan nama komponen yang diterima
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  
  // Setup aplikasi dengan mengatur elemen, komponen App, properti, dan plugin
  setup({ el, App, props, plugin }) {
    return createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue, Ziggy)
      .mount(el);
  },
  
  // Konfigurasi tampilan progress dengan warna tertentu
  progress: {
    color: '#4B5563',
  },
});
