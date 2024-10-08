<template>
    <div class="ml-3 mt-4">
      <select class="form-control rounded-lg bg-red-700 text-white">
        <option value="all" class="text-white">All Categories</option>
        <option v-for="category in categories" :key="category.id" :value="category.id" class="text-white">
          {{ category.category_name }}
        </option>
      </select>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  
  const props = defineProps({
    categories: Array
  });
  </script>
  
  <style scoped>
  /* Add styles here */
  </style>
  