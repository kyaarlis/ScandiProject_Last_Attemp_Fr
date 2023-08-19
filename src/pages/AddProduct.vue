<template>
  <section>
    <h2>Add products</h2>
    <form action="http://karlis-veckagans.atwebpages.com/backend/form.php" method="post" id="product_form">
      <div>
        <label for="sku">SKU</label>
        <input type="text" id="sku" name="sku" required/>
        <p class="message">{{ message }}</p>
      </div>
      <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="productName" required/>
      </div>
      <div>
        <label for="price">Price ($)</label>
        <input type="number" id="price" name="price" required/>
      </div>
      <div>
        <label for="productType" class="mb-2">Type Switcher</label>
        <select 
        class="form-select" 
        id="productType" 
        name="productType" 
        v-model="selectedOption" 
        @change="onSelectionChange"
        required>
            <option value="DVD">DVD</option>
            <option value="Furniture">Furniture</option>
            <option value="Book">Book</option>
        </select>
      </div>

      <div class="p-3">
        <div v-if="dvdVisibility">
            <label for="size">Size (MB)</label>
            <input type="number" class="form-control" id="size" name="size" :required=dvdVisibility>
        </div>

        <div v-if="furnitureVisibility">
            <label for="height">Height (CM)</label>
            <input type="number" class="form-control" id="height" name="height" :required=furnitureVisibility>

            <label for="width">Width (CM)</label>
            <input type="number" class="form-control" id="width" name="width" :required=furnitureVisibility>
        
            <label for="length">Length (CM)</label>
            <input type="number" class="form-control" id="length" name="length" :required=furnitureVisibility>
        </div>

        <div id="Book" v-if="bookVisibility">
            <label for="weight">Weight (KG)</label>
            <input type="number" class="form-control" id="weight" name="weight" :required=bookVisibility>
        </div>
      </div>
      <button type="submit" name="submitForm">Save</button>
    </form>
  </section>
</template>

<script>
export default {
    data() {
        return {
            dvdVisibility: false,
            furnitureVisibility: false,
            bookVisibility: false,
            selectedOption: '',
            message: '',
        }
    },
    methods: {
        resetValues() {
            this.dvdVisibility = false
            this.furnitureVisibility = false
            this.bookVisibility = false
        },
        onSelectionChange() {
            this.resetValues()

            if (this.selectedOption === 'DVD') {
                this.dvdVisibility = true
            } else if (this.selectedOption === 'Furniture') {
                this.furnitureVisibility = true
            } else if (this.selectedOption === 'Book') {
                this.bookVisibility = true
            }
        }
    },
    created() {
      document.title = 'Add Product'

      const urlParams = new URLSearchParams(window.location.search)
      this.message = urlParams.get('message' || '')
    }
}
</script>

<style scoped>
section {
  margin: 3rem auto;
  max-width: 40rem;
  padding: 1rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
}

input,
label,
textarea {
  display: block;
  width: 100%;
}

label {
  font-weight: bold;
}

input,
textarea {
  font: inherit;
  margin-bottom: 0.5rem;
}

button {
  font: inherit;
  background-color: #570080;
  border: 1px solid #570080;
  color: white;
  padding: 0.5rem 1.5rem;
  cursor: pointer;
}

button:hover,
button:active {
  background-color: #220031;
  border-color: #220031;
}

.message {
  color: red;
}
</style>