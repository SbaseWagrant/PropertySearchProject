<template>
  <el-card class="box-card">
    <el-form :inline="true" @submit.prevent>
      <el-form-item label="Name">
        <el-input
          v-model="filters.name"
          placeholder="Search name"
          @input="debouncedSearch"
        />
      </el-form-item>

      <el-form-item label="Bedrooms">
        <el-input-number v-model="filters.bedrooms" :min="0" />
      </el-form-item>

      <el-form-item label="Bathrooms">
        <el-input-number v-model="filters.bathrooms" :min="0" />
      </el-form-item>

      <el-form-item label="Storeys">
        <el-input-number v-model="filters.storeys" :min="0" />
      </el-form-item>

      <el-form-item label="Garages">
        <el-input-number v-model="filters.garages" :min="0" />
      </el-form-item>

      <el-form-item label="Price Min">
        <el-input-number v-model="filters.price_min" :min="0" />
      </el-form-item>

      <el-form-item label="Price Max">
        <el-input-number v-model="filters.price_max" :min="0" />
      </el-form-item>

      <el-form-item>
        <el-button type="primary" @click="search">
          Search
        </el-button>
      </el-form-item>
    </el-form>

    <el-divider />

    <el-table
      v-if="properties.length"
      v-loading="loading"
      :data="properties"
      style="width: 100%"
    >
      <el-table-column prop="name" label="Name" />
      <el-table-column prop="bedrooms" label="Bedrooms" />
      <el-table-column prop="bathrooms" label="Bathrooms" />
      <el-table-column prop="storeys" label="Storeys" />
      <el-table-column prop="garages" label="Garages" />
      <el-table-column label="Price">
        <template #default="{ row }">
          {{ formatPrice(row.price) }}
        </template>
      </el-table-column>
    </el-table>

    <el-empty
      v-if="!loading && searched && !properties.length"
      description="No results found"
    />
  </el-card>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const loading = ref(false)
const searched = ref(false)
const properties = ref([])

const filters = ref({
  name: '',
  bedrooms: null,
  bathrooms: null,
  storeys: null,
  garages: null,
  price_min: null,
  price_max: null,
})

const cleanParams = (obj) =>
  Object.fromEntries(
    Object.entries(obj).filter(
      ([, v]) => v !== null && v !== '' && v !== undefined
    )
  )

const search = async () => {
  loading.value = true
  searched.value = true

  try {
    const response = await axios.get('/api/properties', {
      params: cleanParams(filters.value),
    })
    properties.value = response.data.data
  } finally {
    loading.value = false
  }
}

let timer = null
const debouncedSearch = () => {
  clearTimeout(timer)
  timer = setTimeout(search, 400)
}

const formatPrice = (value) =>
  new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
    maximumFractionDigits: 0,
  }).format(value)

onMounted(() => {
  search()
})
</script>

<style scoped>
.box-card {
  max-width: 1200px;
  margin: 40px auto;
}
</style>
