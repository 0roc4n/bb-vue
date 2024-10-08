import './bootstrap';
import '../css/app.css';
import AOS from 'aos';
import 'aos/dist/aos.css';
import { createApp, h } from 'vue'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'

AOS.init();
createInertiaApp({
    title:(title) => `Build Bright ${title}`,
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .component('Head', Head)
      .component('Link', Link)
      .mount(el)
  },
  progress: {
    delay: 250,
    color: 'red',
    includeCSS: true,
    showSpinner: false,
  },
})