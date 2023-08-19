<template>
  <header>
    <nav>
      <ul>
        <li>
          <router-link to="/">Cancel</router-link>
        </li>
        <li>
          <router-link to="/addproduct">ADD</router-link>
        </li>
      </ul>
    </nav>
  </header>
</template>
<script>
// export default {
//   data () {
//     return {
//       cancelButton: false,
//       addButton: false
//     }
//   },
//   mounted () {
//     this.cancelButton = false
//     this.addButton = false
//     const currentRoute = this.$route.path

//     if (currentRoute === '/') {
//       this.addButton = true
//     } else if (currentRoute === '/addproduct') {
//       this.cancelButton = true
//     }

//     console.log('cancel button: ' + this.cancelButton)
//     console.log('add button: ' + this.addButton)
//   }
// }
</script>

<!-- 
<script setup>
import { ref, onMounted } from 'vue';

onMounted(() => {


const cancelButton = ref(false)
const addButton = ref(false)

if (currentRoute.value === '/') {
  addButton.value = true
}

if (currentRoute.value === '/addproduct') {
  cancelButton.value = true
}
}) 

</script> -->

<style scoped>
header {
  width: 100%;
  height: 5rem;
  background-color: #570080;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.26);

}

nav {
  height: 100%;
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

li {
  margin: 0 1rem;
}

a {
  text-decoration: none;
  color: white;
  font-size: 1.25rem;
}

a:hover,
a:active,
a.router-link-active {
  color: #fca55e;
}
</style>