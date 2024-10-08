<template>
    <Head title="Home" />
    <GuestLayout>
      <div>
        <HomeSection />
      </div>
      <div>
        <OurProducts />
      </div>
      <div>
        <ProductListing :product-featured="product_featured" />
      </div>
      <div>
        <ShopRider />
      </div>
      <div>
        <AboutSection />
      </div>
      <div>
        <ContactSection />
      </div>
    </GuestLayout>
  </template>
  
  <script setup>
  import GuestLayout from '@/Layouts/GuestLayout.vue';
  import { Link, Head } from '@inertiajs/vue3';
  import HomeSection from '@/Pages/HomePage/HomeSection.vue';
  import OurProducts from '@/Pages/HomePage/OurProducts.vue';
  import ProductListing from '@/Pages/HomePage/ProductListing.vue';
  import ShopRider from '@/Pages/HomePage/ShopRider.vue';
  import AboutSection from '@/Pages/HomePage/AboutSection.vue';
  import ContactSection from '@/Pages/HomePage/ContactSection.vue';

  import { defineProps } from 'vue';
  const props = defineProps({
    product_featured: Array,
    });
  </script>
  
  <style scoped>
  /* Add any additional styles here */
  </style>
  