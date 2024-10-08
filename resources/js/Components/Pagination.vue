<template>
    <div class="pagination">
      <nav aria-label="Pagination" v-if="links.length > 1">
        <ul class="flex justify-center mt-5">
          <li v-for="(link, index) in links" :key="index" :class="['mx-1', { 'text-red-700': link.active }]">
            <a
              v-if="link.url"
              href="#"
              @click.prevent="paginate(link.url)"
              v-html="link.label"
              class="p-2 border rounded-lg hover:bg-red-500 hover:text-white transition"
            ></a>
            <span v-else v-html="link.label" class="p-2 text-gray-500"></span>
          </li>
        </ul>
      </nav>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { router } from '@inertiajs/vue3';
  
  // Define props for pagination links
  const props = defineProps({
    links: {
      type: Array,
      default: () => [], // Default to an empty array
    },
  });
  
  const paginate = (url) => {
    if (url) {
      router.get(url);
    }
  };
  </script>
  
  <style scoped>
  .pagination a {
    cursor: pointer;
  }
  </style>
  