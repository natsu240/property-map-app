<template>
  <div>
    <h2>物件一覧</h2>
    <ul>
      <li v-for="property in properties" :key="property.id">
        {{ property.name }} - {{ property.address }}
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const properties = ref([])

onMounted(async () => {
  const res = await axios.get('http://localhost:8080/api/properties')
  properties.value = res.data
})
</script>
