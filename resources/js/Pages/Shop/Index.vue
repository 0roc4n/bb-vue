<template>
    <GuestLayout>
        <div class="relative w-full h-full p-10">
      <!-- Blurred Background -->
      <div class="blur-background absolute inset-0" style="background-image: url('images/shop-images/bg-shop.png'); background-size: cover; background-position: center;">
      </div>
  
      <!-- Non-blurred Content -->
      <div class="flex justify-center relative z-10">
        <div class="w-1/2">
          <img src="images/shop-images/ads.png" alt="" class="overlay rounded-lg shadow-lg">
        </div>
      </div>
    </div>
  
    <div class="bg-gray-400 p-2">
      <p class="ml-10 font-semibold text-white">
        <router-link to="/">Home</router-link> / 
        <router-link to="/shop">Shop</router-link>
      </p>
    </div>
  
    <div class="flex flex-col md:flex-row justify-center gap-5 mt-10">
      <!-- Category Section -->
      <div class="category w-full md:w-1/5 ml-0 md:ml-10">
        <!-- Shop by Category -->
        <div class="border-l-8 border-red-700">
          <span class="font-extrabold text-2xl ml-5 md:ml-10 text-red-700">
            Shop by Category
          </span>
        </div>
        <CategorySelect :categories="categories" />
  
        <!-- Bright Promos (Hidden on small screens) -->
        <div class="border-l-8 border-red-700 mt-10 hidden md:block">
          <span class="font-extrabold text-2xl ml-10 text-red-700">
            Bright Promos
          </span>
        </div>
        <Promos />
  
        <!-- New Products (Hidden on small screens) -->
        <div class="border-l-8 border-red-700 mt-10 hidden md:block">
          <span class="font-extrabold text-2xl ml-10 text-red-700">
            New Products
          </span>
        </div>
        <NewProducts />
      </div>
  
      <!-- Product Section -->
      <div class="product w-full md:w-5/6">
        <div class="bg-gray-300 px-5 py-2 rounded-lg">
          <div class="flex justify-between">
            <p class="text-white font-bold mt-1">{{ product_count }} <span class="font-normal"> Products found</span></p>
            <div class="flex gap-5">
              <select class="rounded-3xl px-5 py-1 border-0">
                <option default>Sort by</option>
                <option value="price">Price</option>
              </select>
              <input type="text" placeholder="Search items..." class="form-control rounded-3xl px-3 py-1" v-model="searchQuery" @input="searchItems" />
            </div>
          </div>
        </div>
        <ProductList :products="products" />
      </div>
    </div>
    </GuestLayout>
  </template>
  
  <script setup>
  import GuestLayout from '@/Layouts/GuestLayout.vue';
  import { ref, computed } from 'vue';
  import CategorySelect from '@/Pages/Shop/Components/CategorySelect.vue';
//   import Promos from '@/Pages/Shop/Components/Promos.vue';
  import NewProducts from '@/Pages/Shop/Components/NewProducts.vue';
  import ProductList from '@/Pages/Shop/Components/ProductList.vue';
  import { defineProps } from 'vue';
  
  // Accept props passed from the Inertia controller
  const props = defineProps({
    categories: Array,
    product_count: Number,
    products: Object  // Since paginated data is an object
  });
  
  const searchQuery = ref('');
  const filteredProducts = computed(() => {
    if (searchQuery.value) {
      return props.products.data.filter(product =>
        product.product_name.toLowerCase().includes(searchQuery.value.toLowerCase())
      );
    }
    return props.products.data;
  });
  
  const searchItems = () => {
    // This function can be used to trigger search logic
  };
  </script>
  
  <style scoped>
  /* Add styles here */
  </style>
  