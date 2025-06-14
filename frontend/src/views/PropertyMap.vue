<template>
  <div class="map-container">
    <div class="map-overlay-box">
      <span>{{ properties.length }}件</span>
    </div>
    <Map :properties="properties" />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import '../assets/property_map.scss'
import axios from 'axios'
import Map from './Map.vue'

const properties = ref([])

onMounted(async () => {
  const res = await axios.get('http://localhost:8080/api/properties')
  properties.value = res.data
})
</script>
