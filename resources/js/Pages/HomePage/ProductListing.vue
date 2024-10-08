<template>
    <div>
      <p class="text-3xl font-bold text-red-700 text-center">Product Listing</p>
      <div class="mt-5 bg-red-700 mr-5 rounded-md">
        <h3 class="text-center p-5 text-4xl text-white font-bold">Featured Products</h3>
        <div class="grid grid-cols-2 mx-2 sm:grid-cols-2 lg:flex gap-3 justify-center mt-5 lg:mx-44 pb-10">
          <div v-for="featured in product_featured" :key="featured.id" class="item">
            <div class="bg-white rounded-lg p-4 product-card">
              <img src="/images/prod.png" alt="Product" class="h-44" />
              <div class="product-details">
                <p class="text-xl font-bold text-red-700">{{ featured.product_name }}</p>
                <p class="text-sm font-normal text-red-700 mt-2">{{ truncateString(featured.category?.category_name, 10) }}</p>
                <p class="text-sm font-normal text-red-700 mt-2">{{ featured.price }}</p>
              </div>
              <Link :href="`/shop/${featured.id}`" class="bg-red-700 text-white px-2 py-1 rounded-lg text-sm">View Details</Link>
            </div>
          </div>
        </div>
      </div>
      <p class="text-3xl font-bold text-red-700 text-center mt-5">List of Our Brand</p>
      <div class="mt-5 bg-gray-200 mr-5 rounded-md p-5">
        <div class="grid grid-cols-2 mx-2 sm:grid-cols-2 lg:flex justify-center gap-3">
          <div class="lg:w-1/5 lg:h-full bg-white rounded-lg flex justify-center p-5" v-for="(brand, index) in brands" :key="index">
            <img :src="brand.imgSrc" :alt="`Brand ${index + 1}`" />
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  import { Link, Head } from '@inertiajs/vue3';
  // Define props to receive the featured products from parent
  const props = defineProps({
    product_featured: Array,
  });
  
  // Sample data for brands
  const brands = [
    { imgSrc: 'images/brand.png' },
    { imgSrc: 'images/brand.png' },
    { imgSrc: 'images/brand.png' },
    { imgSrc: 'images/brand.png' },
  ];
  
  // Helper function to truncate strings
  const truncateString = (string, maxLength) => {
    return string?.length > maxLength ? string.slice(0, maxLength) + '...' : string;
  };
  </script>
  
  <style scoped>
  /* Add any additional styles specific to this component here */
  </style>
  