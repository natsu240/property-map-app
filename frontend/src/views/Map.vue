<template>
  <div>
    <div ref="map" class="google-map"></div>
  </div>
</template>

<script setup>
import { onMounted, ref, watch } from 'vue'
import '../assets/map.scss'

const props = defineProps({
  properties: {
    type: Array,
    required: true,
  },
})

const map = ref(null)

// GoogleMap用のscriptを一度だけ読み込み
function loadGoogleMapsApi() {
  return new Promise((resolve, reject) => {
    if (window.google && window.google.maps) {
      resolve()
      return
    }
    const script = document.createElement('script')
    const apiKey = import.meta.env.VITE_GOOGLE_MAPS_API_KEY
    script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}`
    script.async = true
    script.defer = true
    script.onload = resolve
    script.onerror = reject
    document.head.appendChild(script)
  })
}

// 初期化
function initMap() {
  if (!props.properties || props.properties.length === 0) return
  const gmap = new window.google.maps.Map(map.value, {
    center: {
      lat: props.properties[0].latitude,
      lng: props.properties[0].longitude,
    },
    zoom: 12,
  })
  props.properties.forEach((p) => {
    new window.google.maps.Marker({
      position: { lat: p.latitude, lng: p.longitude },
      map: gmap,
      title: p.name,
    })
  })
}

// 最初にAPI読んでから地図描画
onMounted(async () => {
  await loadGoogleMapsApi()
  initMap()
})

// 物件リストが変わったときも再描画したければwatchつけてもOK
watch(
  () => props.properties,
  () => {
    if (window.google && window.google.maps) initMap()
  },
)
</script>
