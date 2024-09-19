<template>
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <!-- Search bar -->
      <form class="d-flex position-relative w-50" @submit.prevent="search">
      <input
        v-model="query"
        class="form-control search-input"
        type="search"
        placeholder="Buscar productos"
        aria-label="Search"
        @input="fetchSuggestions"
        autocomplete="off"
      />
      <button class="btn btn-outline-secondary" type="submit">
        <i class="fa-solid fa-search"></i>
      </button>
      <!-- Dropdown Suggestions -->
      <div
        v-if="suggestions.length > 0"
        class="suggestions-container position-absolute bg-white shadow rounded w-100"
        style="top: 100%; z-index: 1000;"
      >
        <!-- First Section: Suggestions with Icons -->
        <div class="list-group">
          <a
            v-for="suggestion in suggestions"
            :key="suggestion.id"
            class="list-group-item list-group-item-action d-flex align-items-center"
            href="#"
            @click.prevent="selectSuggestion(suggestion)"
          >
            <i class="fa-solid fa-search me-2"></i>
            <span class="flex-grow-1">{{ suggestion.name }}</span>
          </a>
        </div>
        </div>
      </form>

      <!-- Cart Icon -->
      <div class="navbar-nav">
        <a class="nav-link" @click.prevent="goToCart" title="Ir al carrito">
          <i class="fa-solid fa-cart-shopping fs-2"> </i>
        </a>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const query = ref("");
const suggestions = ref([]);

const index = () => {

};

const fetchSuggestions = async () => {
  if (query.value.length > 1) { // Fetch suggestions if the query length is more than 1
    try {
      const response = await axios.get(`/products/search?buscador=${query.value}`);
      suggestions.value = response.data;
    } catch (error) {
      console.error("Error fetching suggestions:", error);
    }
  } else {
    suggestions.value = [];
  }
};

const selectSuggestion = (suggestion) => {
  query.value = suggestion.name;
  suggestions.value = [];
};

const search = () => {
  // Handle search logic, e.g., redirect to search results page
  if (!query.value) return;
  window.location.href = `/products/search?buscador=${encodeURIComponent(query.value)}`;
};

const goToCart = () => {
      window.location.href = "/products/cart";
    };


onMounted(() => index());
</script>
<style scoped>
.dropdown-menu {
  position: absolute;
  top: 100%;
  z-index: 1000;
  display: block;
}
</style>