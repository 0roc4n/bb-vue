<template>
  <div class="">
    <main>
      <slot />
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import Footer from '@/Layouts/FooterGuest.vue'; // Importing the Footer component

const mobileMenuOpen = ref(false);

const links = [
  { name: 'Home', path: '/' },
  { name: 'Shop', path: '/shop' },
  { name: 'Services', path: '/services' },
  { name: 'Bright Stories', path: '/blog' },
  { name: 'About Us', path: '/about' },
];

const toggleMobileMenu = () => {
  mobileMenuOpen.value = !mobileMenuOpen.value;
};
</script>

<style scoped>
/* Add any additional styles here */
</style>
