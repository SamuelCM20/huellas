<template>
    <div class="container mt-4">
      <!-- Mapa -->
      <div class="row mb-3">
        <div class="col-12">
          <div id="map" style="height: 400px;"></div>
        </div>
      </div>
  
      <!-- Botón para volver -->
      <div class="row">
        <div class="col-12">
          <button @click="goBack" class="btn btn-primary">Volver a la página de publicaciones</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: ['coordinates'],
    mounted() {
      this.initMap();
    },
    methods: {
      initMap() {
        // Inicializar el mapa con Leaflet
        const map = L.map('map').setView([this.coordinates.latitude || 51.505, this.coordinates.longitude || -0.09], 13);
  
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19
        }).addTo(map);
  
        if (this.coordinates.latitude && this.coordinates.longitude) {
          L.marker([this.coordinates.latitude, this.coordinates.longitude]).addTo(map)
            .bindPopup('Coordenadas de la publicación')
            .openPopup();
        }
      },
      goBack() {
        // Navegar de vuelta a la página de publicaciones
        window.history.back();
      }
    }
  };
  </script>
  
  <style scoped>
  /* Estilos opcionales para hacer el mapa más responsivo */
  #map {
    width: 100%;
    height: 100%;
  }
  </style>
  