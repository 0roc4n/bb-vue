<template>
  <div>
    <!-- Navigation bar -->
    <nav
      :class="[
        'sticky top-0 border-b-2 2 z-50 transition-colors duration-300',
        scrollY > 0 ? 'bg-white shadow-md p-4' : 'bg-transparent p-4 '
      ]"
    >
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
          <!-- Logo -->
          <div class="flex items-center lg:ml-20">
            <Link href="/dashboard">
              <ApplicationLogo class="h-20 w-20 fill-current text-gray-500" />
            </Link>
          </div>

          <!-- Regular Menu (Hidden on small screens) -->
          <div class="hidden lg:flex space-x-10">
            <Link
              v-for="link in links"
              :key="link.name"
              :href="link.path"
              class="flex items-center font-bold text-md text-red-500 hover:border-b-4 border-red-500"
            >
              {{ link.name }}
            </Link>
            <Link
              href="/contact"
              class="flex items-center font-bold text-md text-red-500 hover:border-b-4 border-red-500"
            >
              Contact us
            </Link>
            <div class="flex space-x-5 items-center">
              <input type="text" placeholder="search..." class="rounded-2xl text-red-500" />
              <i class="fa-solid fa-cart-shopping text-lg text-red-500"></i>
              <i class="fa-solid fa-user text-lg text-red-500"></i>
            </div>
          </div>

          <!-- Hamburger Menu Button (Visible on small screens) -->
          <div class="lg:hidden flex items-center">
            <button @click="toggleMobileMenu" class="text-red-500 focus:outline-none text-2xl">
              <i :class="mobileMenuOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Dropdown Menu (Hidden by default, shown on click) -->
      <div
        v-if="mobileMenuOpen"
        class="lg:hidden absolute right-0 top-16 bg-white w-1/2 border-t-2 border-red-500 shadow-lg rounded-b-lg"
      >
        <ul class="flex flex-col p-4">
          <li v-for="link in links" :key="link.name">
            <Link :href="link.path" class="block py-2 font-bold text-md text-red-500 hover:bg-red-100">
              {{ link.name }}
            </Link>
          </li>
          <li>
            <Link href="/contact" class="block py-2 font-bold text-md text-red-500 hover:bg-red-100">
              Contact us
            </Link>
          </li>
          <li class="mt-4">
            <input type="text" placeholder="search..." class="w-full rounded-2xl text-red-500 p-2" />
          </li>
          <li class="flex justify-between mt-4">
            <i class="fa-solid fa-cart-shopping text-lg text-red-500"></i>
            <i class="fa-solid fa-user text-lg text-red-500"></i>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Content -->
    <main>
      <slot />
    </main>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';

const mobileMenuOpen = ref(false);
const scrollY = ref(0);

const links = [
  { name: 'Home', path: '/' },
  { name: 'About', path: '/shop' },
  { name: 'Features', path: '/services' },
  { name: 'Bright Stories', path: '/blog' },
  { name: 'About Us', path: '/about' },
];

const toggleMobileMenu = () => {
  mobileMenuOpen.value = !mobileMenuOpen.value;
};

const handleScroll = () => {
  scrollY.value = window.scrollY;
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});
</script>

<style scoped>
/* Additional styles if needed */
</style>
