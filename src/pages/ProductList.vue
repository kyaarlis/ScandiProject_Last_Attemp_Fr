<template>
  <section>  
    <form action="http://karlis-veckagans.atwebpages.com/backend/delete_products.php" method="post">
      <div class="heading">
        <h2>Product List</h2>
        <button type="submit" class="btn btn-danger" id="delete-product-btn" name="delete_products">MASS DELETE</button>
      </div>
        <div class="mt-3">
          <ul class="product-grid">
            <li v-for="product in products" :key="product.id">
              <div class="checkbox-conatiner">
                  <input type="checkbox" class="delete-checkbox" name="delete[]" :value="product.sku">
              </div>
              <h3>{{ product.sku }}</h3>
              <h4>{{ product.name }}</h4>
              <h4>{{ product.price }}.00$</h4>
              <h4>{{ product.size ? 'Size: ' + product.size + ' MB' : null }}</h4>
              <h4>{{ product.height ? 'Dimension: ' + product.height + 'x' + product.width + 'x' + product.length : null }}</h4>
              <h4>{{ product.weight ? 'Weight: ' + product.weight + 'KG' : null }}</h4>
            </li>
          </ul>
        </div>
    </form>
  </section>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import axios from 'axios'

document.title = 'Product List'

const products = ref([])

onMounted (() => {
  const dbUrl = 'http://karlis-veckagans.atwebpages.com/backend/get_products.php'

  axios.get(dbUrl).then((res) => {

  const response = res.data

  // console.log(response)

  products.value = response
  })
})
</script>

<style scoped>
section {
  margin: 3rem auto;
  max-width: 60rem;
  padding: 1rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

li {
  margin: 1rem 0;
  border: 1px solid #ccc;
  padding: 1rem;
  text-align: center;
}

h3, h4 {
  margin: 0.5rem 0;
}

.heading {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  grid-gap: 1rem;
}

.checkbox-conatiner {
  text-align: left;
}
</style>